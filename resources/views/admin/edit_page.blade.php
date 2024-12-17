<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white; /* Title text color */
        }
        .div_center {
            text-align: center;
            padding: 10px;
        }
        label {
            display: inline-block;
            width: 200px;
        }

        input[name="title"], textarea[name="description"], select {
            color: black; /* Set text color to black */
            padding: 10px;
            width: 50%; /* Adjust width */
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea[name="description"] {
            height: 150px; /* Adjust height for better visibility */
            resize: none; /* Disable resizing */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        select, option {
    color: black; /* Changes the text color inside the dropdown */
    background-color: white; /* Ensures the background is white */
    font-size: 16px; /* Adjust font size if needed */
}
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{ session()->get('message') }}
        </div>
        @endif

        <h1 class="post_title">Edit Post</h1>
        <form action="{{ url('update_post', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">
                <label>Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}">
            </div>

            <div class="div_center">
                <label>Post Description</label>
                <textarea name="description">{{ $post->description }}</textarea>
            </div>

            <div class="div_center">
                <label>Category</label>
                <select name="category_id">
                    <option value="">Select a Category</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" 
                                @if($category->id == $post->category_id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="div_center">
                <label>Old Image</label>
                <img style="margin:auto" height="100px" width="150px" src="/postimage/{{ $post->image }}">
            </div>

            <div class="div_center">
                <label>Update Image</label>
                <input type="file" name="image">
            </div>

            <div class="div_center">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </form>
      </div>

      @include('admin.footer')
    </div>
  </body>
</html>
