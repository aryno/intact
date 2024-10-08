<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'survey_id', 'answers'];

    protected $casts = [
        'answers' => 'array',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
