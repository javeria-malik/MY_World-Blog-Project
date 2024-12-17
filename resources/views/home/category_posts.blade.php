<!-- resources/views/home/category_posts.blade.php -->

<h1>Posts in {{ $category->name }} Category</h1>

@foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->description }}</p>
        <img src="{{ asset('post_images/'.$post->image) }}" alt="{{ $post->title }}">
    </div>
@endforeach
