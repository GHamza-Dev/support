<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title','support')</title>

        <!-- fontawesome -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- fave icon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/fav/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/fav/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/fav/favicon-16x16.png') }}">
        <link rel="manifest" href="/site.webmanifest">

        <style>
            body {
                background-image: radial-gradient(#949ebe17 20%, transparent 20%);
                background-position: 0 0, 50px 50px;
                background-size: 10px 10px;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="max-w-7xl mx-3 xl:mx-auto">

            @yield('header')

            @yield('content')

        </div>
    </body>
</html>
