<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .post_title
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white; /* This targets the title text color */
        }
        .div_center {
            text-align: center;
            padding: 10px;
        }
        label {
            display: inline-block;
            width: 200px;
        }

        /* Target the input field for title */
        input[name="title"] {
            color: black;  /* Set text color to black */
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Target the textarea for description */
        textarea[name="description"] {
            color: black;  /* Set text color to black */
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            height: 150px;  /* Optional: Adjust height for better visibility */
        }

        /* Optional: You can style the submit button */
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
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{ session()->get('message') }}
        </div>
        @endif

        <h1 class="post_title">Add Post</h1>
        <div>
            <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label>Post Title</label>
                    <input type="text" name="title">
                </div>

                <div class="div_center">
                    <label>Post Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="div_center">
              <label>Category</label>
              <select name="category_id">
                 <option value="">Select a Category</option>
                 @foreach(\App\Models\Category::all() as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
    </select>
</div>

                <div class="div_center">
                    <label>Add Image</label>
                    <input type="file" name="image">
                </div>

                <div class="div_center">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
      </div>

      @include('admin.footer')
    </div>
  </body>
</html>
