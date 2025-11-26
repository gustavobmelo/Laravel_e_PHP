<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'categoria_id',
        'imagem'
    ];

    // Um produto pertence a uma categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
