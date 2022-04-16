@extends('layouts.app')
@section('title','Support || welcome')

@section('header')
    <div class="flex justify-between border h-16 items-center mt-2 rounded-md px-2">
        <div class="text-2xl font-semibold">
            Supp<span class="inline-block animate- bounce text-blue-600">o</span>rt
        </div>
        <nav>
            <ul class="flex flex-1 justify-between items-center">
                <li class="mx-2 text-slate-600 hover:text-purple-900 hover:underline"><a href="#">Add ticket</a></li>
                <li class="mx-2 text-slate-600 hover:text-purple-900 hover:underline"><a href="#">Tickets</a></li>
                <li class="mx-2 border bg-blue-600 text-slate-50 p-2 rounded-md hover:scale-105"><a href="{{ route('login') }}">Login</a></li>
                <li class="mx-0 border bg-blue-600 text-slate-50 p-2 rounded-md hover:scale-105"><a href="{{ route('register') }}">Register</a></li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    <section>
        
        <br><br><br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque maiores possimus minima id voluptatibus, quae magnam voluptate ipsa, nostrum expedita ab doloremque! In delectus, omnis dignissimos at dicta maiores. Deleniti!
    </section>
@endsection