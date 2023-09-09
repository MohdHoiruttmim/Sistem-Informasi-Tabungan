@extends('layouts.main')
@section('title', 'Login')

@section('container')
<div class="container pt-32 w-3/12 mx-auto">
  <h1 class="text-6xl font-bold text-gray-700 font-['poppins'] mb-5">
    Sitabung
  </h1>
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-4">
      <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email</label>
      <input type="email" name="email" id="email" placeholder="Your email" value="{{ old('email') }}"
        class="block w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
      @error('email')
      <div class="text-red-500 mt-2 text-sm">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-4">
      <label for="password" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Password</label>
      <input type="password" name="password" id="password" placeholder="Your password"
        class="block w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
      @error('password')
      <div class="text-red-500 mt-2 text-sm">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-4">
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</button>
    </div>
  </form>
</div>
@endsection