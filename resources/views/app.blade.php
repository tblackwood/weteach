<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link href="/css/app.css" rel="stylesheet">
    <title>@yield('title')</title>
    <style>
        .gradient {
            background: linear-gradient(45deg, #667eea, #ed64a6);
        }
    </style>
</head>

<body class="antialiased">

@yield('content')

</body>

</html>
