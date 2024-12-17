<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use Illuminate\Support\Str;

class GenerateSlugsForCategories extends Command
{
    protected $signature = 'categories:generate-slugs';
    protected $description = 'Generate slugs for all existing categories in the database';

    public function handle()
    {
        // Fetch all categories that don't have a slug
        $categories = Category::whereNull('slug')->orWhere('slug', '')->get();

        foreach ($categories as $category) {
            // Generate slug for the category
            $category->slug = Str::slug($category->name);
            $category->save();

            $this->info("Slug for '{$category->name}' generated and saved.");
        }

        $this->info('Slugs generation completed!');
    }
}
