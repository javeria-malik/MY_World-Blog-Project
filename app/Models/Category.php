<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * Automatically generate a slug when creating or updating the category.
     */
    public static function boot()
    {
        parent::boot();

        // Automatically generate the slug when creating or updating the category
        static::saving(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    /**
     * Define the relationship with the Post model.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
