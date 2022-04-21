<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @if (Session::has('error'))
        <div class="mt-2 max-w-lg w-screen mx-auto p-3 border border-red-700 bg-red-300 text-red-700 rounded-sm">
            {{ session::get('error') }}
        </div>
    @endif
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
          <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8">Login</h2>
      
          <form action="{{ route('login') }}" method="POST" class="max-w-lg border rounded-lg mx-auto">
            <div class="flex flex-col gap-4 p-4 md:p-8">
                @csrf
              <div>
                <label for="email" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Email</label>
                <input name="email" value="{{ @old('email') }}" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                @error('email')
                    <span class="text-red-600">*{{ $message }}</span>
                @enderror
              </div>
      
              <div>
                <label for="password" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Password</label>
                <input name="password" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                @error('password')
                    <span class="text-red-600">*{{ $message }}</span>
                @enderror
              </div>
      
              <button class="block bg-gray-800 hover:bg-gray-700 active:bg-gray-600 focus-visible:ring ring-gray-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Log in</button>
      
            </div>
      
            <div class="flex justify-center items-center bg-gray-100 p-4">
              <p class="text-gray-500 text-sm text-center">Don't have an account? <a href="#" class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 transition duration-100">Register</a></p>
            </div>
          </form>
        </div>
      </div>
</body>
</html>