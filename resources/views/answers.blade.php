@extends('layouts.app')

@section('title','Add Ticket')

@section('header')
    @include('components.nav')
@endsection

@section('content')
    <div class="w-full max-w-lg mx-auto relative">
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
                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-orange-700 bg-orange-300 last:mr-0 mr-1">
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
            <!-- ticket footer -->
            {{-- <hr class="mt-3">
            <div class="mt-3 flex items-center">
                <div class="flex items-center text-blue-500"><a href="#"><i class="fa-solid fa-comment-dots"></i><span>(3)</span></a></div>
                <div class="flex items-center ml-2"><a href="#"><span></span>Add Response</a></div>
            </div> --}}
            <!-- End ticket footer -->
        </div>
        <!-- Answers -->
        <div class="relative z-20">
            <!-- Answer * -->
            <div class="mt-12 w-11/12 relative bg-white">
                <div class="flex items-center absolute -top-9 left-7">
                    <div class="w-6 h-6 bg-blue-600 border-4 border-blue-300 rounded-full"></div>
                    <span class="ml-2">2022-04-17 02:34:41</span>
                </div>
                <p class="border border-blue-600 rounded-md p-2">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                </p>
            </div>
            <!-- Answer * -->
            <div class="mt-12 w-11/12 relative bg-white">
                <div class="flex items-center absolute -top-9 left-7">
                    <div class="w-6 h-6 bg-blue-600 border-4 border-blue-300 rounded-full"></div>
                    <span class="ml-2">2022-04-17 02:34:41</span>
                </div>
                <p class="border border-blue-300 rounded-md p-2">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel provident illo repudiandae eligendi deserunt hic ratione aperiam doloribus eum possimus veritatis dolorem saepe totam cupiditate amet blanditiis quaerat, sunt voluptatum suscipit quidem corporis?
                </p>
            </div>
        </div>
    </div>
@endsection