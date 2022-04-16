@extends('layouts.app')
@section('title','Support || welcome')

@section('header') 
    @include('components.nav')
@endsection

@section('content')
    <section class="mt-8">
        <div class="flex-col gap-10 lg:flex lg:flex-row-reverse items-center justify-center">
            <div class="max-w-xs md:max-w-md w-full mx-auto lg:mx-0">
                <img src="{{ asset('images/support.svg') }}" alt="">
            </div>
            <div class="text-center lg:text-left">
                <h2 class="mt-4 lg:mt-0 text-slate-700 text-3xl font-bold">We will be happy to hear from you!</h2>
                <p class="mt-4 lg:mt-7 text-lg w-full max-w-md mx-auto lg:ml-0">Please do not hesitate to contact our inredabel team, thy will be happy to answer your quastions in less than 4 hours.</p>
                <div class="mt-4 lg:mt-7">
                    <button class="border rounded-full bg-blue-500 text-white py-2 px-3 font-semibold hover:bg-blue-700 ease-linear transition-colors duration-200"><a href="#">Add a Ticket</a></button>
                    <button class="border border-blue-500 rounded-full text-blue-500 bg-white py-2 px-3 font-semibold hover:bg-blue-700 hover:border-blue-700 hover:text-white ease-linear transition-colors duration-200"><a href="{{ route('register') }}">Register</a></button>
                </div>
            </div>
        </div>
    </section>
@endsection