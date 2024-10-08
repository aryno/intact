<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['app_id', 'title', 'description', 'start_date', 'end_date'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function app()
    {
        return $this->belongsTo(App::class);
    }
}
