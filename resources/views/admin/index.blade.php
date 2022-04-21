@extends('admin.sub.app')

@section('main')
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
                                {{ $tkt->lname . ' ' . $tkt->fname }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $tkt->title }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="float-right">@include('components.status', [
                                    'status' => $tkt->status,
                                ])</span>
                            </td>
                            <td class="px-4 py-3 text-sm min-h-full flex justify-evenly items-center">
                                <a href="{{ route('show.ticket', ['id' => $tkt->id]) }}"><span><i
                                            class="fa-solid fa-eye"></i> View</span></a>
                                <span><i class="fa-solid fa-circle-xmark"></i><a href="{{ route('close.ticket',['id'=>$tkt->id]) }}">Close</a></span>
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
@endsection
