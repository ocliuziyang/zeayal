<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('website.info.title')  }}|管理页面</title>
    <link rel="stylesheet" href="/css/app_all.css">
</head>
<body class="nav-md">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <div id="app"></div>


    <script src="{{ asset('js/app_all.js') }}"></script>
</body>
</html>