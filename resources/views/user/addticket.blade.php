@extends('layouts.app')

@section('title','Add Ticket')

@section('header')
    @include('components.nav')
@endsection

@section('content')
    <div class="mt-8 w-full max-w-lg mx-auto">
        @if (Session::has('alert'))
            @include('components.alert',['status'=> session::get('alert')['status'] ,'msg'=> session::get('alert')['msg'] ])
        @endif
        <div>
            <h2 class="text-xl font-semibold text-slate-800">Add a Ticket</h2>
        </div>
        <form action="{{ route('store.ticket') }}" method="post" class="mt-5">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:flex">
                    <div class="w-full px-3 mt-2">
                        <label class="block tracking-wide text-gray-700 text-base mb-2" for="service">
                          Service Name
                        </label>
                        <div>
                          <select id="service" name="service_id" class="block appearance-none w-full bg-gray-50 border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error("service_id") border-red-600 @enderror" id="grid-state">
                            <option value="null">--Service--</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                          </select>
                          @error('service_id')
                              <small class="text-red-600 text-base">*{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="w-full mt-2 px-3">
                        <label class="block tracking-wide text-gray-700 text-base mb-2" for="title">
                          Title
                        </label>
                        <input value="{{ old('title') }}" id="title" name="title" class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error("title") border-red-600 @enderror" id="grid-first-name" type="text" placeholder="Enter ticket title">
                        @error('title')
                              <small class="text-red-600 text-base">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="w-full mt-2 px-3">
                  <label class="block tracking-wide text-gray-700 text-base mb-2" for="description">
                    Description
                  </label>
                  <textarea id="description" name="description" rows="5" class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error("description") border-red-600 @enderror"  type="text" placeholder="Please describe your issue">{{ old('description') }}</textarea>
                  @error('description')
                        <small class="text-red-600 text-base">*{{ $message }}</small>
                  @enderror
                </div>
                <div class="w-full mt-2 px-3 grid place-content-end">
                  <button class="border tracking-wider font-semibold bg-blue-700 text-slate-50 p-2 px-3 rounded-md hover:scale-105" type="submit">Submit</button>
                </div>
              </div>
        </form>
    </div>
@endsection