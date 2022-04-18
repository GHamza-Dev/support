@extends('layouts.app')

@section('title','Add Ticket')

@section('header')
    @include('components.nav')
@endsection

@section('content')
    @error('content')
        <div class="mt-8 w-full max-w-lg mx-auto">
            @include('components.alert',['status'=> 'failed' ,'msg'=> $message ])
        </div>
    @enderror
    <div class="w-full max-w-lg mx-auto relative mb-14">
        <div class="w-2 h-full bg-blue-300 left-9 absolute z-10"></div>
        <div class="mt-8 w-full mx-auto border rounded-md p-2 relative z-20 bg-white">
            <!-- ticket head -->
            <div class="flex justify-between items-centr ">
                <div class="flex items-center">
                    <p class="bg-slate-500 text-white rounded-full flex justify-center items-center" style="width: 3.5rem;height:3.5rem">
                        <span class="text-2xl font-semibold">{{ $ticket->fname[0].$ticket->lname[0] }}</span>
                    </p>
                    <div class="ml-2">
                        <h3 class="font-bold text-xl text-slate-800">{{ $ticket->fname }}</h3>
                        <p class="text-sm">{{ $ticket->created_at }}</p>
                    </div>
                </div>
                <div class="">
                    <span class="{{ $ticket->status }} last:mr-0 mr-1">
                        {{ $ticket->status }}
                    </span>
                </div>
            </div>
            <!-- End ticket head -->
            <!-- ticket body -->
            <div class="mt-3">
                <h3 class="text-2xl">{{ $ticket->title }}</h3>
                <p class="mt-3">{{ $ticket->description }}</p>
            </div>
            <!-- End ticket body -->
        </div>
        <!-- Answers -->
        <div class="relative z-20">
            @foreach ($answers as $answer)
            <!-- Answer * -->
            <div class="mt-12 w-11/12 relative bg-white">
                <div class="flex items-center absolute -top-9 left-7">
                    <div class="w-6 h-6 bg-blue-600 border-4 border-blue-300 rounded-full"></div>
                    <span class="ml-2">{{ $answer->created_at }}</span>
                </div>
                <p class="border {{ $answer->answerable_type === 'admin' ? 'border-blue-300' : 'border-blue-600'}} rounded-md p-2">
                    {{ $answer->content }}
                </p>
            </div>
            @endforeach
            <!-- Add answer * -->
            <div class="mt-12 w-11/12 relative bg-white">
                <div class="flex items-center absolute -top-9 left-7">
                    <div class="w-6 h-6 bg-green-600 border-4 border-green-300 rounded-full"></div>
                    <label for="add-answer" class="ml-2">Reply</label>
                </div>
                <div class="border border-green-600 rounded-md p-2">
                    <form action="{{ route('add.answer') }}" method="post">
                        @csrf
                        <input type="hidden" name='answerable_id' value="{{ $ticket->user_id }}">
                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                        <textarea id="add-answer" name="content" rows="5" class="h-full w-full border-none appearance-none block bg-gray-100 text-gray-700 border rounded leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="Your answer..."></textarea>
                        <div class="w-full mt-2 px-3 grid place-content-end">
                            <button class="border tracking-wider font-semibold bg-blue-600 transition text-slate-50 p-2 px-3 rounded-md hover:scale-105 hover:bg-blue-700" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection