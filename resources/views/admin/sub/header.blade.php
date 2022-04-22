<header class="z-10 py-2 bg-white shadow-sm dark:bg-gray-800">
    <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
        <!-- Mobile hamburger -->
        <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
            aria-label="Menu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <!-- Search input -->
        <div class="flex justify-center flex-1 lg:mr-32 text-black">
            <div class="w-full max-w-lg mx-auto">
                <form action="{{ route('admin.search') }}" method="POST">
                    @csrf
                    <div class="flex flex-row">
                        <div>
                            <select class="border border-gray-400 rounded-l-md" name="term" id="serlect-term">
                                <option selected value="1">Keywords</option>
                                <option value="2">Service</option>
                                <option value="3">Status</option>
                            </select>
                        </div>
                        <div class="grow">
                            <input id="search-input" name="search" class="w-full border border-gray-400" type="search" placeholder="Serach for a ticket...">
                            <select class="w-full border border-gray-400 hidden" name="service_id" id="select-service">
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="bg-blue-600 font-semibold text-white border border-blue-600 rounded-r-md px-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex items-center flex-shrink-0 space-x-6">
            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </div>
    </div>
</header>
