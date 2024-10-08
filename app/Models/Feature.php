<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Feature extends Model
{
    use HasFactory;
    protected $table = 'features';

    // Required Fields
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'app_id',
        'vote_type'
    ];
    // Validation method
    public static function validate($data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vote_type' => 'required',
        ]);
    }
    /**
     * Get App's related features
     */
    public function features()
    {
        return $this->hasMany(Feature::class, 'app_id');
    }
    public function app()
    {
        return $this->belongsTo(App::class);
    }
    public function votes()
    {
        return $this->hasMany(Votes::class);
    }
}
