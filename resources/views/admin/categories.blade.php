<!-- resources/views/admin/categories.blade.php -->
<h1 class="text-center"><center>Manage Your Categories</center></h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Number of Posts</th>
            <th>Related Projects</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->posts_count }}</td> <!-- Display the number of related posts -->
                <td>
                    <ul>
                        @foreach($category->posts as $post)
                            <li>{{ $post->title }}</li> <!-- Display each post title under the category -->
                        @endforeach
                    </ul>
                </td>
                <td>
                <form action="{{ route('admin.deleteCategory', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
               @csrf
               @method('DELETE') <!-- Correctly spoof DELETE method -->
               <button type="submit" class="btn btn-danger">Delete</button>
              </form>


                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Create Category Section -->
<div class="create-category-section mt-5">
    <h2>Create a New Category</h2>

    <!-- Create Category Form -->
    <form action="{{ route('admin.createCategory') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
        </div>
        <button type="submit" class="btn btn-create-category">Create Category</button>
    </form>
</div>

<!-- Add some custom CSS for better table styling -->
<style>
    table.table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    
    table.table th, table.table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    
    table.table-striped tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }
    
    table.table-bordered {
        border: 1px solid #ddd;
    }
    
    .btn {
        margin-top: 5px;
    }

    /* Style for the list of projects */
    ul {
        list-style-type: disc;
        margin-left: 20px;
    }

    /* Style for the create category section */
    .create-category-section {
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 5px;
        margin-top: 30px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .create-category-section h2 {
        font-size: 1.5em;
        color: #333;
        margin-bottom: 20px;
    }

    .btn-create-category {
        background-color: #007bff;  /* Blue button */
        color: #000;  /* Black text */
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-create-category:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }

    .btn-danger {
        margin-top: 5px;
    }

    /* Increase size of the category input field */
    .form-control {
        height: 45px; /* Increase the height of the input field */
        font-size: 16px; /* Increase the font size for better readability */
        width: 100%; /* Ensure it takes up full width of its container */
    }

</style>

<script>
    // Function to confirm deletion before submitting the form
    function confirmDelete() {
        return confirm('Are you sure you want to delete this category?');
    }
</script>
