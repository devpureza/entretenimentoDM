<?php

use App\Models\News;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $news = News::orderBy('published_at', 'desc')->paginate(10); // Paginação de 10 notícias
    return view('news.index', compact('news'));
})->name('news.index');

Route::get('/noticia/{slug}', function ($slug) {
    $news = News::where('slug', $slug)->firstOrFail();
    return view('news.show', compact('news'));
})->name('news.show');
