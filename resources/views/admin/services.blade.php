@extends('admin.sub.app')

@section('main')
    <div class="container px-6 mx-auto grid">
        <div class="flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Services
            </h2>
            <button onClick="showModal()" class="text-xl bg-purple-700 py-1 px-2 rounded-md  text-white">Create+</button>
        </div>
        @if (Session::has('alert'))
            <div class="mb-6">
               @include('components.alert',['status'=> session::get('alert')['status'] ,'msg'=> session::get('alert')['msg'] ])
            </div>
        @endif
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-200 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Service ID</th>
                            <th class="px-4 py-3">Service Name</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($services as $service)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td>
                                    <p class="font-semibold">#{{ $service->id }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ $service->created_at }}
                                    </p>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $service->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a class="text-red-600" href="{{ route('services.remove',['id'=>$service->id]) }}">Remove</a>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal hidden">
                <div
                    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                    <!-- Modal -->
                    <form action="{{ route('services.add') }}" method="POST"
                        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                        role="dialog" id="modal">
                        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                        <header class="flex justify-end">
                            <button
                                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                aria-label="close" @click="closeModal">
                                X
                            </button>
                        </header>
                        <!-- Modal body -->
                        <div class="mt-4 mb-6">
                            <!-- Modal title -->
                            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                                Enter service name
                            </p>
                            <!-- Modal description -->
                            <div>
                                @csrf
                                <input class="border border-purple-600 rounded-md w-full" name="name" type="text" placeholder="Enter service name">
                            </div>
                        </div>
                        <footer
                            class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                            <button type="button"
                                class="cancel w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                Cancel
                            </button>
                            <button
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Accept
                            </button>
                        </footer>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script defer>
  function showModal(){
    document.querySelector('.modal').classList.remove('hidden');
  }
  function hideModal(){
    document.querySelector('.modal').classList.add('hidden');
  }
  document.querySelector('.cancel').addEventListener('click',(e)=>{
    e.preventDefault();
    hideModal();
  });
</script>
