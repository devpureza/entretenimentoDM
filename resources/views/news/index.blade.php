@extends('layouts.app')

@section('title', 'EntreDM - Últimas Notícias')

@section('content')

<x-ad-block position="Superior" />


    <!-- Sessão Destaque: Última Notícia Publicada -->
    @if (isset($news[0]) && $news[0]->slug)
        <a href="{{ route('news.show', $news[0]->slug) }}">
            <div class="relative bg-cover bg-center h-96 rounded-lg mb-8"
                style="background-image: url('{{ asset('storage/' . $news[0]->image) }}');">
                <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg flex items-center">
                    <div class="text-white p-8">
                        <h1 class="text-5xl font-bold mb-4">{{ $news[0]->title }}</h1>
                        <p class="text-lg mb-4">{{ $news[0]->subtitle }}</p>
                        <a href="{{ route('news.show', $news[0]->slug) }}"
                            class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Leia mais
                        </a>
                    </div>
                </div>
            </div>
        </a>
    @endif

    <!-- Linha acima e abaixo do título -->
    <div class="border-t border-gray-300 my-6"></div>
    <h2 class="text-5xl font-bold mb-6">Últimas Notícias</h2>
    <div class="border-t border-gray-300 mb-6"></div>

    <x-ad-block position="Ultimas" />
    
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-3">
        @foreach ($news->skip(1)->take(5) as $item)
            @if ($item && $item->slug)
                <!-- Torna o card clicável -->
                <a href="{{ route('news.show', $item->slug) }}"
                    class="bg-white rounded-lg shadow p-4 block hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                        class="rounded-md mb-4 w-full h-48 object-cover">
                    <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                    <!-- Leia mais ao final do texto -->
                    <p class="text-gray-600 mb-4">
                        {!! Str::limit($item->content, 50) !!}
                        <span class="text-blue-500 hover:underline">Leia mais</span>
                    </p>
                </a>
            @endif
        @endforeach
    </div>

    <div class="flex gap-6 mt-8">
        <!-- Card grande à esquerda -->
        @if ($news->skip(6)->first() && $news->skip(6)->first()->slug)
            <div class="w-4/5">
                <a href="{{ route('news.show', $news->skip(6)->first()->slug) }}"
                    class="bg-white rounded-lg shadow block hover:shadow-lg transition-shadow duration-300 h-full relative">
                    <img src="{{ asset('storage/' . $news->skip(6)->first()->image) }}"
                        alt="{{ $news->skip(6)->first()->title }}"
                        class="rounded-lg w-full h-full object-cover absolute inset-0">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 p-6 rounded-b-lg">
                        <h3 class="text-3xl font-semibold text-white">{{ $news->skip(6)->first()->title }}</h3>
                    </div>
                </a>
            </div>
        @endif

        <!-- Cards menores à direita -->
        <div class="w-1/5 flex flex-col gap-6">
            <!-- Card superior -->
            @if ($news->skip(7)->first() && $news->skip(7)->first()->slug)
                <a href="{{ route('news.show', $news->skip(7)->first()->slug) }}" class="hover:text-blue-600">
                    <span class="flex items-center gap-2">
                        <span class="text-purple-600 text-lg">|</span>
                        <span
                            class="text-gray-900 font-bold uppercase text-sm">{{ $news->skip(8)->first()->category->name }}</span>
                    </span>
                    <h3 class="text-2xl font-semibold mb-3">{{ $news->skip(7)->first()->title }}</h3>
                    <p class="text-gray-600">
                        {!! Str::limit($news->skip(7)->first()->content, 150) !!}
                        <span class="text-blue-500 hover:underline">Leia mais</span>
                    </p>
                </a>
            @endif
            <div class="border-t border-gray-300 my-6"></div>
            <!-- Card inferior -->
            @if ($news->skip(8)->first() && $news->skip(8)->first()->slug)
                <a href="{{ route('news.show', $news->skip(8)->first()->slug) }}" class="hover:text-blue-600">
                    <span class="flex items-center gap-2">
                        <span class="text-purple-600 text-lg">|</span>
                        <span
                            class="text-gray-900 font-bold uppercase text-sm">{{ $news->skip(8)->first()->category->name }}</span>
                    </span>
                    <h3 class="text-2xl font-semibold mb-3">{{ $news->skip(8)->first()->title }}</h3>
                    <p class="text-gray-600">
                        {!! Str::limit($news->skip(8)->first()->content, 150) !!}
                        <span class="text-blue-500 hover:underline">Leia mais</span>
                    </p>
                </a>
            @endif
        </div>
    </div>

    <!-- Lista de notícias em ordem de publicação -->
    <div class="mb-8">
        <div class="border-t border-gray-300 my-6"></div>
        <h2 class="text-3xl font-bold mb-6">Todas as Notícias</h2>
        <div class="border-t border-gray-300 mb-6"></div>

    <x-ad-block position="Todas noticias" />

        <div class="space-y-6">
            @foreach ($news->sortByDesc('published_at') as $item)
                @if ($item && $item->slug)
                    <div class="bg-white rounded-lg shadow p-4 flex gap-6 hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                            class="w-48 h-32 object-cover rounded-md">
                        <div class="flex-1">
                            <div class="flex items-center gap-4 text-sm text-gray-600 mb-2">
                                <span>{{ $item->published_at->format('d/m/Y H:i') }}</span>
                                <span>{{ $item->category->name }}</span>
                                <span>Por {{ $item->author->name }}</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $item->subtitle }}</p>
                            <a href="{{ route('news.show', $item->slug) }}" class="text-blue-500 hover:underline">
                                Leia mais
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Paginação -->
    <div class="mt-6">
        {{ $news->links() }}
    </div>
@endsection
