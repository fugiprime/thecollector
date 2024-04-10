<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'host',
        'file_code',
        'poster_url',
        'description',
        'duration',
        'quality', // New field
        'company_id',
        'content_star_id',
        // Add more fields as needed
    ];

    // Define the relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with content star
    public function contentStar()
    {
        return $this->belongsTo(ContentStar::class);
    }

    // Define the relationship with company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Define the relationship with categories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function postViews()
    {
        return $this->hasMany(PostView::class);
    }
}
