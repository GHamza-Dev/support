<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 border-r">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            Support
        </a>
        <ul class="mt-7">
            <li class="relative px-6 py-3 hover:bg-purple-600 hover:text-white transition-all duration-500 rounded-l-full">
                <i class="fa-solid fa-house-chimney"></i>
                <a href="{{ route('admin.tickets') }}">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="relative px-6 py-3 hover:bg-purple-600 hover:text-white transition-all duration-500 rounded-l-full">
                <a href="{{ route('services.all') }}">
                    <span class="ml-4">Services</span>
                </a>
            </li>
            <li class="relative px-6 py-3 hover:bg-purple-600 hover:text-white transition-all duration-500 rounded-l-full">
                <a href="#">
                    <span class="ml-4">Status</span>
                </a>
            </li>
            <li class="relative px-6 py-3 hover:bg-purple-600 hover:text-white transition-all duration-500 rounded-l-full">
                <a href="{{ route('users.all') }}">
                    <span class="ml-4">Users</span>
                </a>
            </li>
            <li class="relative px-6 py-3 hover:bg-purple-600 hover:text-white transition-all duration-500 rounded-l-full">
                <a href="{{ route('ticket.all') }}">
                    <span class="ml-4">User view</span>
                </a>
            </li>
        </ul>
    </div>
</aside>