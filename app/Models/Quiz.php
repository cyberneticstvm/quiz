<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
        'q8',
        'q9',
        'q10',
        'q11',
        'q12',
        'q13',
        'q14',
        'q15',
        'q16',
        'q17',
        'q18',
        'category',
        'outcome',
        'first_name',
        'email',
    ];

    protected $casts = [
        'q1' => 'array',
        'q2' => 'array',
        'q3' => 'array',
        'q4' => 'array',
        'q5' => 'array',
        'q6' => 'array',
        'q7' => 'array',
        'q8' => 'array',
        'q9' => 'array',
        'q10' => 'array',
        'q11' => 'array',
        'q12' => 'array',
        'q13' => 'array',
        'q14' => 'array',
        'q15' => 'array',
        'q16' => 'array',
        'q17' => 'array',
        'q18' => 'array',
    ];
}
