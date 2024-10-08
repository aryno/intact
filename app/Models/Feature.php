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
        'app_id'
    ];
    // Validation method
    public static function validate($data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
    /**
     * Get App's related features
     */
    public function features()
    {
        return $this->hasMany(Feature::class, 'app_id');
    }
}
