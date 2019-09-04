<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'esl',
        'care',
        'contact',
        'compose',
        'computer',
        'compliment',
        'communication',
        'notes',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}
