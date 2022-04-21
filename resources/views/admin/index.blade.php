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

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">

        @include('admin.aside')

        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-sm dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        aria-label="Menu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                            <div class="absolute inset-y-0 flex items-center pl-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <input
                                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                                type="text" placeholder="Search for projects" aria-label="Search" />
                        </div>
                    </div>
                    <div class="flex items-center flex-shrink-0 space-x-6">
                        <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </button>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Dashboard
                    </h2>
                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-200 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Ticket ID</th>
                                        <th class="px-4 py-3">User</th>
                                        <th class="px-4 py-3">Title</th>
                                        <th class="px-4 py-3">Satus</th>
                                        <th class="px-4 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($tickets as $tkt)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td>
                                            <p class="font-semibold">#{{ $tkt->id }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $tkt->created_at }}
                                            </p>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $tkt->lname.' '.$tkt->fname }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $tkt->title }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            <span class="float-right">@include('components.status',['status'=> $tkt->status])</span>
                                        </td>
                                        <td class="px-4 py-3 text-sm min-h-full flex justify-evenly items-center">
                                            <a href="{{ route('show.ticket',['id'=>$tkt->id]) }}"><span><i class="fa-solid fa-eye"></i> View</span></a>
                                            <span><i class="fa-solid fa-circle-xmark"></i> Close</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $tickets->links() }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
