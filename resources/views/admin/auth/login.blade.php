<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login|Dashboard</title>

    <!-- Bootstrap -->
    <link href="/assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/assets/gentelella/build/css/custom.min.css" rel="stylesheet">
    <style>
        .login_content {
            text-shadow: none;
        }
    </style>
</head>

<body class="login">
<div>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="{{ route('admin.login') }}">
                    {{ csrf_field() }}
                    <h1>Blog Login Form</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                    </div>
                    <div style="text-align: left">
                        <input type="checkbox" name="remember_token" value="true"> 记住我
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">Log in</button>
                    </div>

                    <div class="clearfix"></div>

                    {{--导入—./_parital/errors.blade.php--}}
                    @include('admin._parital.errors')
                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-paw"></i> 感谢开源!</h1>
                            <p>©2017 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <script>
        setTimeout('hideErrors()', 2000);
        function hideErrors() {

            if(document.getElementsByClassName('alert-danger')[0]) {
                document.getElementsByClassName('alert-danger')[0].style.visibility = "hidden";
            }
        }
    </script>
</div>
</body>
</html>