<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category; // Make sure to import Category model

class HomeController extends Controller
{
    public function index()
    {
        // Check if the user is logged in
        if (Auth::id()) {
            $post = Post::all(); // Get all posts
            $usertype = Auth::user()->usertype; // Check the user type
            if ($usertype == 'user') {
                return view('home.homepage', compact('post')); // Return homepage for user
            } else if ($usertype == 'admin') {
                return view('admin.index'); // Return admin dashboard
            } else {
                return redirect()->back(); // Redirect to previous page if user type is invalid
            }
        }
    }

    public function homepage()
    {
        // Fetch all posts and categories from the database
        $post = Post::all();  // Get all posts
        $categories = Category::all(); // Get all categories for the dropdown

        // Return the view with posts and categories
        return view('home.homepage', compact('post', 'categories'));
    }

    public function post_details($id)
    {
        // Find post by id
        $post = Post::find($id);
        return view('home.post_details', compact('post')); // Return the post details view
    }

    // Public method to handle post creation by a user
    public function user_post(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;

        // Check if the request has a file named 'image'
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("postimage"), $imagename); // Move image to 'postimage' folder
            $post->image = $imagename; // Set the image name in the database
        }

        $post->save(); // Save the post
        return redirect()->back(); // Redirect back to the previous page
    }

    public function services()
    {
        // Fetch all posts from the database
        $post = Post::all();

        // Return the services view with posts
        return view('home.services', compact('post'));
    }

    public function about()
    {
        // Return the about page
        return view('home.about'); // This points to resources/views/home/about.blade.php
    }

    // Method to fetch posts for a specific category by its slug
    public function category_posts($slug)
    {
        // Find the category by slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get all posts related to this category
        $posts = $category->posts; // Assuming a category has many posts (One to Many relationship)

        // Return the view with category and posts data
        return view('home.category_posts', compact('category', 'posts'));
    }
}
