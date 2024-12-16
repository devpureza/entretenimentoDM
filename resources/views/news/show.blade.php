@extends('layouts.app')

@section('title', $news->title . ' - EntreDM')

@section('content')
    <div class="max-w-6xl mx-auto">
        <a href="{{ route('news.index') }}" class="bg-blue-500 text-white hover:bg-blue-600 font-bold py-2 px-4 rounded inline-block mb-4">← Voltar</a>


        <!-- Âncora acima do título -->
        <p class="text-sm text-gray-500 uppercase font-bold mb-2">{{ $news->anchor }}</p>

        <!-- Título principal -->
        <h2 class="text-6xl font-bold mb-2">{{ $news->title }}</h2>

        <!-- Subtítulo -->
        <p class="text-lg text-gray-700 italic mb-4">{{ $news->subtitle }}</p>

        <!-- Informações sobre autor e data -->
        <div class="text-sm text-gray-500 flex items-center gap-2 mb-6">
            <span>Por {{ $news->author->name ?? 'Redação' }}</span>
            <span>&#x2022;</span>
            <span class="font-bold">{{ $news->location ?? 'Goiânia - Goiás' }}</span>
            <span>&#x2022;</span>
            <span>{{ $news->published_at->format('d/m/Y') }}</span>
        </div>
        <!-- Linha fina separadora -->
        <hr class="border-t border-gray-300 mb-6">
        
        <!-- Imagem principal -->
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="rounded-md mb-7 w-[1920px] h-[400px] object-cover">

        <!-- Conteúdo da notícia -->
        <div class="max-w-4xl mx-auto text-lg leading-relaxed space-y-6">
            {!! $news->content !!}
        </div>
    </div>
@endsection
