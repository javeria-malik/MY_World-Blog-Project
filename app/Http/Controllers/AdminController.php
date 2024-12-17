<?php

namespace App\Http\Controllers;
use App\Models\Category;




use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }
    // app/Http/Controllers/AdminController.php

public function add_post(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id', // Ensure category exists
        'image' => 'image|nullable',
    ]);

    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->category_id = $request->category_id;
    $user = auth()->user();
    $post->user_id = $user->id;
    $post->user_type = $user->usertype; 
    if ($request->hasFile('image')) {
        // Move the uploaded image to the postimage directory
        $imagePath = $request->image->move(public_path('postimage'), $request->image->getClientOriginalName());
        // Save the image path (relative to the public directory) in the database
        $post->image = 'postimage/' . $request->image->getClientOriginalName();
    }
    $post->save();

    return redirect()->back()->with('message', 'Post added successfully!');
}

    public function show_post()
    {
        $posts= Post::all();
        return view('admin.show_post',compact('posts'));
    }

    public function delete_post($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted succesfully()');

    }
    public function edit_page($id)
    {
        $post=Post::find($id);
        return view('admin.edit_page',compact('post'));
    }
    public function update_post(Request $request, $id)
{
    // Validate the request
    $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id', // Ensure the category exists
        'image' => 'image|nullable',
    ]);

    // Find the post to update
    $post = Post::find($id);

    if (!$post) {
        return redirect()->back()->with('message', 'Post not found!');
    }

    // Update the post details
    $post->title = $request->title;
    $post->description = $request->description;
    $post->category_id = $request->category_id; // Update the category

    // Handle the image update
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('postimage'), $imageName);
        $post->image = $imageName;
    }

    $post->save();

    return redirect()->back()->with('message', 'Post updated successfully!');
}

    public function dashboard()
    {
        return view('admin.index'); // Make sure this view exists
    }
    public function createCategory(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        // Create the category in the database
        Category::create([
            'name' => $request->name,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('message', 'Category Created Successfully!');
    }
// In AdminController.php
public function categories()
{
    // Get categories with post count (eager load posts count)
    $categories = Category::withCount('posts')->get();
    
    return view('admin.categories', compact('categories'));
}

// Delete a category
public function deleteCategory($id)
{
    // Find the category by its ID
    $category = Category::find($id);

    if ($category) {
        // Delete the category
        $category->delete();

        // Redirect to the admin categories page
        return redirect()->route('admin.categories')->with('message', 'Category deleted successfully!');
    }

    // If category not found, redirect with an error message
    return redirect()->route('admin.categories')->with('error', 'Category not found!');
}




// Edit category form
public function editCategory($id)
{
    $category = Category::find($id);
    if (!$category) {
        return redirect()->route('categories')->with('message', 'Category not found!');
    }
    return view('admin.edit_category', compact('category'));
}

// Update category
// AdminController.php

public function updateCategory(Request $request, $id)
{
    // Validate the input
    $validated = $request->validate([
        'name' => 'required|unique:categories,name,' . $id, // Ensure the category name is unique except for the current category
    ]);

    // Find the category to update
    $category = Category::find($id);

    if ($category) {
        $category->name = $request->name;  // Update the name
        $category->save(); // Save the updated category

        return redirect()->route('categories')->with('message', 'Category updated successfully!');
    }

    return redirect()->route('categories')->with('message', 'Category not found!');
}
}