<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('blog.website.meta.description') }}">
    <meta name="author" content="{{ config('blog.website.author') }}">

    <title>{{ config('blog.website.title') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/clean-blog/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional fonts for this theme -->
    <link href="/assets/clean-blog/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this theme -->
    <link href="/assets/clean-blog/css/clean-blog.min.css" rel="stylesheet">
    @yield('css')
    <!-- Temporary navbar container fix until Bootstrap 4 is patched -->
    <style>
        .navbar-toggler {
            z-index: 1;
        }

        @media (max-width: 576px) {
            nav > .container {
                width: 100%;
            }
        }
    </style>

</head>

<body>

<!-- Navigation -->
@include('blog.theme.cleanBlog.layouts.navbar')

<!-- Page Header -->
@include('blog.theme.cleanBlog.layouts.header')

<!-- Main Content -->
@yield('content')


<!-- Footer -->
@include('blog.theme.cleanBlog.layouts.footer')

<!-- jQuery Version 3.1.1 -->
<script src="/assets/clean-blog/lib/jquery/jquery.js"></script>

<!-- Tether -->
<script src="/assets/clean-blog/lib/tether/tether.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/assets/clean-blog/lib/bootstrap/js/bootstrap.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="/assets/clean-blog/js/jqBootstrapValidation.js"></script>
<script src="/assets/clean-blog/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="/assets/clean-blog/js/clean-blog.min.js"></script>
@yield('js')

</body>

</html>