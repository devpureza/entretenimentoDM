<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    // Permitir preenchimento em massa para estas colunas
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'anchor', 
        'content',
        'tags', 
        'image',
        'category_id',
        'author_id',
        'published_at',
    ];
    

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });

        static::updating(function ($news) {
            $news->slug = Str::slug($news->title);
        });

    }

    protected $casts = [
        'published_at' => 'datetime',
        'tags' => 'array',
    ];

    // Relacionamentos
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}

