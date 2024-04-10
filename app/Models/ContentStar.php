<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentStar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'description',
        'date_of_birth',
        'poster_url',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
