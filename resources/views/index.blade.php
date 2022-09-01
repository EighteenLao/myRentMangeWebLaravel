<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">

    <style>
        #dataDisplay{
            display:flex;
            justify-content:center;
            align-items:center;
            font-size : 30px;
            margin: 2%;
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

    <h1>您好，{{$userName}}</h1>

    <div id = "dataDisplay">
        <table border="1">
            <thead>
                <tr>
                    <th>房號</th>
                    <th>姓名</th>
                    <th>身分證字號</th>
                    <th>電話</th>
                    <th>入住時間</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($userData as $index)
            <tr>
            <td>{{$index->roomId}}</td>
            <td>{{$index->name}}</td>
            <td>{{$index->id}}</td>
            <td>{{$index->phoneNumber}}</td>
            <td>{{$index->date}}</td>
            </tr><br>
            @endforeach

            </tbody>
        </table>
    </div>


</body>
</html>
