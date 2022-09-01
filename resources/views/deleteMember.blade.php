<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>deleteMember</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">

    <style>
        .deleteMemberContainer{
            display:flex;
            justify-content:center;
            align-items:center;
            font-size : 20px;
            margin:2%;
        }
    </style>

</head>
<body>

    <header>
        @include('headerAndNav/header')
    </header>
    <nav>
        @include('headerAndNav/nav')
    </nav>

    <div class = "deleteMemberContainer">
        <form action="deleteMember" method="post">
            <br><h1>移除房客資訊</h1><br>
            <br>欲刪除房客之房號: <select name="roomId">
                                        <option value="">--請選擇--</option>
                                        <option value="3B">3B</option>
                                        <option value="3C">3C</option>
                                        <option value="4A">4A</option>
                                        <option value="4B">4B</option>
                                        <option value="4C">4C</option>
                                        <option value="4D">4D</option>
                                        <option value="5A">5A</option>
                                        <option value="5B">5B</option>
                                </select>
            <br><br><input type="submit" value="送出">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button><a href="exit">返回</a></button>
        </form>


        @if(isset($msg))
            <h2>{{$msg}}</h2>
        @endif

    </div>

</body>
</html>
