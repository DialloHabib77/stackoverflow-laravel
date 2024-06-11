<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Theme extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'question_theme');
    }
}
