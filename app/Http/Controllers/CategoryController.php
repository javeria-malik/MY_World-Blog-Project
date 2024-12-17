<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        // Create the category (slug is generated automatically in the model)
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')->with('message', 'Category created successfully!');
    }

    /**
     * Update an existing category.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|unique:categories,name,' . $id . '|max:255',
        ]);

        // Find the category and update (slug will be regenerated automatically)
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name, // Slug will be updated automatically
        ]);

        return redirect()->route('admin.categories.index')->with('message', 'Category updated successfully!');
    }
}
