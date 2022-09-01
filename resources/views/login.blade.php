<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/loginLayout.css') }}">

    <style>
        .loading{
            position: fixed;
            left:45%;
            top:40%;
        }
    </style>

</head>
<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
            <img src="iconImg/P_20180413_145455.jpg" id="icon" alt="User Icon"  />
            <h1>套房管理系統</h1>
            </div>

            @if(isset($err))
                {{$err}}
            @endif
                <form action="login" method="post">
                    <input type="text" id="userName" class="fadeIn second" name="userName" placeholder="user" autocomplete="off">
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                    <input type="submit" class="fadeIn fourth" value="Log In">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>

            <!-- Remind Passowrd -->
            <div id="formFooter" style="display: none">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>

</body>
</html>
