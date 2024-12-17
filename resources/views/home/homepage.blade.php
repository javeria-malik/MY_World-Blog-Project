<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Include the necessary CSS files for the homepage -->
      @include('home.homecss')
   </head>
   <body>
      <!-- Header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- Banner section start -->
         @include('home.banner')
         <!-- Banner section end -->
      </div>

      <!-- Main content start -->
      
         
         <!-- Posts section -->
         
      </div>
      <!-- Main content end -->

      <!-- Footer section start -->
      @include('home.footer')
      <!-- Footer section end -->

      <!-- Copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by Javeria Malik</p>
         </div>
      </div>
      <!-- Copyright section end -->

      <!-- Javascript files -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- Sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- JavaScript for Owl Carousel -->
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>
