<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
       <base href="/public">
       @include('home.homecss')
         </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
    </div>
    <!-- services.blade.php -->

<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blogs Post</h1>
        <p class="services_text">Here are some of our latest posts You like to read:</p>
        <div class="services_section_2">
            <div class="post-row">
                @foreach($post as $post)
                <div class="post-card">
                    <img src="/postimage/{{$post->image}}" class="post-img" alt="Post Image">
                    <h4 class="post-title"><b>{{$post->title}}</b></h4>
                    <p class="post-author">Post by <b>{{$post->name}}</b></p>
                    <div class="btn_main">
                        <a href="{{ url('post_details', $post->id) }}" class="read-more">Read More</a>
                    </div>           
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    /* Main Section Styling */
    .services_section {
        text-align: center;
        margin: 10px 0;
        padding-top: 10px;
    }

    .services_taital {
        font-size: 4em;
        margin-bottom: 10px;
        margin-bottom: 5px;
    }

    .services_text {
        font-size: 1.5em;
        margin-bottom: 10px;
        color: #666;
    }

    /* Horizontal Row for Posts */
    .post-row {
        display: flex;
        gap: 10px;
        overflow-x: auto; /* Adds horizontal scrolling if needed */
        padding: 10px 0;
        scroll-behavior: smooth;
    }

    /* Post Card Styling */
    .post-card {
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: left;
        min-width: 200px; /* Ensures each card is 300px wide */
        flex-shrink: 0; /* Prevents cards from shrinking in a row */
    }

    .post-img {
        width: 400px;
        height: 400px;
        border-radius: 8px;
        object-fit: cover; /* Ensures the image maintains aspect ratio without distortion */
    }

    .post-title {
        font-size: 1.2em;
        margin-top: 10px;
        color: #333;
    }

    .post-author {
        font-size: 0.9em;
        color: #777;
    }

    /* Read More Button Styling */
    .read-more {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 15px;
        color: #fff;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .read-more:hover {
        background-color: #0056b3;
    }
</style>

      <!-- footer section start -->
      @include('home.footer')
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by Javeria Malik</p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
   </body>
</html>