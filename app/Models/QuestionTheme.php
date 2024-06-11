<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTheme extends Model
{
    use HasFactory;
    protected $table = 'question_theme';

    protected $fillable = [
        'question_id', 'theme_id'
    ];
}
