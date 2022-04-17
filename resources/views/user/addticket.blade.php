@extends('layouts.app')

@section('title','Add Ticket')

@section('header')
    @include('components.nav')
@endsection

@section('content')
    <div class="mt-8 w-full max-w-lg mx-auto">
        <div>
            <h2 class="text-xl font-semibold text-slate-800">Add a Ticket</h2>
        </div>
        <form class="mt-8">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:flex">
                    <div class="w-full px-3 mt-2">
                        <label class="block tracking-wide text-gray-700 text-base mb-2" for="service">
                          Service Name
                        </label>
                        <div>
                          <select id="service" name="service" class="block appearance-none w-full bg-gray-50 border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option value="null">--Service--</option>
                            <option value="1">Sales</option>
                            <option value="2">Latency</option>
                            <option value="3">Something 1</option>
                            <option value="4">Something 2</option>
                          </select>
                        </div>
                      </div>
                      <div class="w-full mt-2 px-3">
                        <label class="block tracking-wide text-gray-700 text-base mb-2" for="title">
                          Title
                        </label>
                        <input id="title" name="title" class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Enter ticket title">
                      </div>
                </div>
                <div class="w-full mt-2 px-3">
                  <label class="block tracking-wide text-gray-700 text-base mb-2" for="description">
                    Description
                  </label>
                  <textarea id="description" name="description" rows="5" class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Please describe your issue"></textarea>
                </div>
                <div class="w-full mt-2 px-3 grid place-content-end">
                  <button class="border tracking-wider font-semibold bg-blue-700 text-slate-50 p-2 px-3 rounded-md hover:scale-105" type="submit">Submit</button>
                </div>
              </div>
        </form>
    </div>
@endsection