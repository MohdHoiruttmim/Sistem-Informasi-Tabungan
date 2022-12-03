@extends('layouts.main')
@section('title', $title)

@section('sidenav')
@include('partials.sidenav')
@endsection

@section('container')
<div class="wrapper w-[80%] p-3 flex flex justify-center items-center">
  <div class="card">
    <a href="/registerUser/guru"
      class="block w-[350px] m-2 p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-700 dark:text-white text-center">
        Daftarkan Guru</h5>
      <svg class="w-20 h-20 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
      </svg>
    </a>
  </div>
  <div class="card">
    <a href="/registerUser/siswa"
      class="block w-[350px] m-2 p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-700 dark:text-white text-center">
        Daftarkan Siswa</h5>
      <svg class="w-20 h-20 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
      </svg>
    </a>
  </div>
</div>
@endsection