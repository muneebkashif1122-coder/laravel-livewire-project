<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'description', 
        'category_id', 
        'image', 
        'author_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // 🔑 BONUS FIX: Defines the 'author' relationship link for your table row layout
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}

