<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;
    protected $table = 'votes';
    protected $fillable = [
        'feature_id',
        'comment',
        'user_id',
        'vote_status'

    ];
}
