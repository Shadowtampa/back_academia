<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function treinos()
    {
        return $this->belongsToMany(Treino::class);
    }
}
