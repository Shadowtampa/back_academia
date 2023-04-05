<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseMetaData extends Model
{
    use HasFactory;

    public function treinos(): MorphToMany
    {
        return $this->morphedByMany(Treino::class, 'taggable');
    }
    public function exercicios(): MorphToMany
    {
        return $this->morphedByMany(Exercicio::class, 'taggable');
    }
}
