<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    protected $fillable = [
        'dayOfTheWeek',
        'title'
    ];

    // public function exercicios()
    // {
    //     return $this->hasMany(Exercicio::class);
    // }

        /**
     * Get all of the tags for the post.
     */
    public function exercicios()
    {
        return $this->belongsToMany(Exercicio::class);
    }

}
