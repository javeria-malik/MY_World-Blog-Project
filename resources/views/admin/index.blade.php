<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
    /* Set all text in the body to white */
body, body * {
    color: white !important;
}

/* Override text color to black for .brand-text */
.brand-text, .brand-text * {
    color: black !important;
}

/* Target buttons with .text-gray-500 and restore their default text color */
button.text-gray-500 {
    color: #4B5563 !important; /* Adjust this if needed to match the button's intended color */
}

</style>

  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
       @include('admin.body')
       <!-- Add this form to your admin dashboard (index.blade.php) -->



        @include('admin.footer')
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>