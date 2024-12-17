<!DOCTYPE html>
<html>
<head> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('admin.css')
  <style type="text/css">
      .title_deg {
          font-size: 30px;
          font-weight: bold;
          color: white;
          padding: 30px;
          text-align: center;
      }
      .table_deg {
          border: 5px solid white;
          width: 80%;
          text-align: center;
          margin: 0 auto;
      }
      .th_deg {
          background-color: skyblue;
      }
      .img_deg {
          height: 100px;
          width: 150px;
          padding: 10px;
      }
      td:last-child, th:last-child {
          padding-right: 30px;
      }
      /* Add margin for spacing */
      .table_deg td, .table_deg th {
          padding: 10px;
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
      
      <h1 class="title_deg">All Posts</h1>
      
      <table class="table_deg">
        <tr class="th_deg">
          <th>Post Title</th>
          <th>Description</th>
          <th>Posted by</th>
          <th>Post Status</th>
          <th>Category</th>
          <th>Image</th>
          <th>Delete</th>
          <th>Edit</th>
        </tr>
        
        @foreach($posts as $post)
        <tr>
          <td>{{ $post->title }}</td>
          <td>
            <a href="{{ url('post_details/'.$post->id) }}" class="btn btn-info">Show Description</a>
          </td>
          <td>{{ $post->name }}</td>
          <td>{{ $post->post_status }}</td>
          <td>{{ $post->category->name ?? 'No Category' }}</td> <!-- Display the category name -->
          <td>
            @if($post->image)
              <img class="img_deg" src="{{ asset('postimage/' . $post->image) }}" alt="Post Image">
            @else
              No Image
            @endif
          </td>
          <td>
            <a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
          </td>
          <td>
            <a href="{{ url('edit_page', $post->id) }}" class="btn btn-success">Edit</a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    
    @include('admin.footer')

    <script type="text/javascript">
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        swal({
          title: 'Are you sure to delete this?',
          text: "You won't be able to revert this delete",
          icon: "warning",
          buttons: true,
          dangerMode: true
        }).then((willDelete) => {
          if (willDelete) {
            window.location.href = urlToRedirect;
          }
        });
      }
    </script>

    <!-- JavaScript files-->
    <script src="admincss/vendor/jquery/jquery.min.js"></script>
    <script src="admincss/vendor/popper.js/umd/popper.min.js"></script>
    <script src="admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admincss/vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admincss/js/charts-home.js"></script>
    <script src="admincss/js/front.js"></script>
  </div>
</body>
</html>
