<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1 class="text-2xl">Admin - Dashboard</h1>
    <p class="text-lg text-red-600">First Name: {{ Auth::guard('admin')->user()->fname }}</p>
    <p class="text-lg text-green-600">Email: {{ Auth::guard('admin')->user()->email }}</p>
    <a class="p-3 mt-3 bg-blue-600 text-white font-semibold rounded-sm inline-block" href="{{ route('admin.logout') }}">Admin - Logout</a>
</body>
</html>