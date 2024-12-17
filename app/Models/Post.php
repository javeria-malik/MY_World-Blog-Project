<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define the relationship with Category (Post belongs to Category)
    public function category()
    {
        return $this->belongsTo(Category::class); // A post belongs to one category
    }
}
