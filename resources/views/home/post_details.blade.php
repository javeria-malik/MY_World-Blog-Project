<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.homecss')
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
        }

        .post-container {
            margin: 40px auto;
            max-width: 900px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .post-container img {
            width: 50%; /* Adjust width */
            height: auto; /* Maintain aspect ratio */
            max-height: 400px; /* Set max height */
            margin-top: 40px; /* Add margin above the image (space between header and image) */
            margin-bottom: 20px; /* Optional: space below the image */
            display: block; /* Block level element */
            margin-left: auto; /* Center horizontally */
            margin-right: auto; /* Center horizontally */
            border-radius: 4px;
        }

        .post-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #000;
            text-align: center;
        }

        .post-description {
            font-size: 18px;
            margin-bottom: 20px;
            text-align: justify;
        }

        .post-author {
            font-size: 16px;
            color: #555;
            text-align: right;
            margin-top: 20px;
        }

        .post-author b {
            color: #000;
        }
    </style>
</head>
<body>
    <!-- Header Section Start -->
    <div class="header_section">
        @include('home.header')
    </div>

    <!-- Post Content Section -->
    <div class="post-container">
        <img src="/postimage/{{$post->image}}" alt="Post Image">
        <h3 class="post-title">{{$post->title}}</h3>
        <p class="post-description">{{$post->description}}</p>
        <p class="post-author">Posted by <b>{{$post->name}}</b></p>
    </div>

    <!-- Footer Section Start -->
    @include('home.footer')
    <!-- Footer Section End -->

    <!-- Copyright Section -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free HTML Templates</a></p>
        </div>
    </div>

    <!-- Javascript files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- Sidebar -->
    <script src="js/jquery.mCustomScroll
