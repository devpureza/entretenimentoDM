<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Permitir preenchimento em massa para estas colunas
    protected $fillable = ['name', 'slug'];

    // Relacionamento com notícias
    public function news()
    {
        return $this->hasMany(News::class);
    }
}

