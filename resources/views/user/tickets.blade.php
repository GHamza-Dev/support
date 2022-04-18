@extends('layouts.app')

@section('title','Add Ticket')

@section('header')
    @include('components.nav')
@endsection

@section('content')
    @foreach ($tickets as $tkt)
        <div class="mt-8 w-full max-w-lg mx-auto border rounded-md p-2">
            <!-- ticket head -->
            <div class="flex justify-between items-centr ">
                    <div class="flex items-center">
                        <p class="bg-slate-500 text-white rounded-full flex justify-center items-center" style="width: 3.5rem;height:3.5rem">
                            <span class="text-2xl font-semibold">{{ auth::user()->fname[0] }}</span>
                        </p>
                        <div class="ml-2">
                            <h3 class="font-bold text-xl text-slate-800">{{ auth::user()->fname }}</h3>
                            <p class="text-sm">{{ $tkt->created_at }}</p>
                        </div>
                    </div>
                    <div class="">
                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-700 bg-red-300 last:mr-0 mr-1">
                            {{ $tkt->status }}
                        </span>
                    </div>
            </div>
            <!-- End ticket head -->
            <!-- ticket body -->
            <div class="mt-3">
                <h3 class="text-2xl">{{ $tkt->title }}</h3>
                <p class="mt-3">{{ $tkt->description }}</p>
            </div>
            <!-- End ticket body -->
            <!-- ticket footer -->
            <hr class="mt-3">
            <div class="mt-3 flex items-center">
                <div class="flex items-center text-blue-500"><a href="{{ route('show.ticket',['id'=>$tkt->id]) }}"><i class="fa-solid fa-comment-dots"></i><span>(3)</span></a></div>
                <div class="flex items-center ml-2"><a href="{{ route('show.ticket',['id'=>$tkt->id]) }}"><span></span>Add Response</a></div>
            </div>
            <!-- End ticket footer -->
        </div>
    @endforeach
@endsection