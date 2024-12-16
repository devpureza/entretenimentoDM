@if ($ads->isNotEmpty())
    <div class="space-y-6 my-6 flex flex-col items-center justify-center">
        @foreach ($ads as $ad)
            <a href="{{ $ad->link }}" target="_blank" class="block hover:opacity-90 transition-opacity duration-300" 
               style="width: {{ explode('x', $ad->size)[0] }}px; height: {{ explode('x', $ad->size)[1] }}px;">
                <img src="{{ asset('storage/' . $ad->image) }}" alt="Ad" class="w-full h-full object-contain">
            </a>
        @endforeach
    </div>
@endif
