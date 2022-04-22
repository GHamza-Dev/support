<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Support - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css"
        integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- fave icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/fav/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    @yield('style')

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">

        @include('admin.sub.aside')
        
        <div class="flex flex-col flex-1 w-full">
            
            @include('admin.sub.header')
            
            <!-- Main -->
            <main class="h-full overflow-y-auto">
                @yield('main')
            </main>
        </div>
    </div>
</body>

</html>
