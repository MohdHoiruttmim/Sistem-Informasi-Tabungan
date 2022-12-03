@extends('layouts.main')
@section('title', $title)

@section('sidenav')
@include('partials.sidenav')
@endsection

@section('container')
<div class="wrapper w-[50%] p-3">
  <h1 class="mb-6 text-4xl font-extrabold dark:text-white text-gray-700 font-[Montserrat]">Tambah Data Siswa</h1>

  <form action="/siswa" method="POST">
    @csrf
    <div class="grid grid-cols-6 gap-6 mb-6 ">
      <div class="col-span-12 sm:col-span-6">
        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
          Lengkap</label>
        <input type="text" name="fullName" id="first-name"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="John Doe" required="" value="">
      </div>
      <div class="col-span-12 sm:col-span-6">
        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <input type="text" name="name" id="first-name"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="John Doe" required="" value="">
      </div>
      <div class="col-span-6 sm:col-span-3">
        <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk
          Siswa (NIS)</label>
        <input type="text" name="nis" id="nis"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="21xxxxxx" required="" value="">
      </div>
      <div class="col-span-6 sm:col-span-3">
        <label for="telp_orngtua" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
          Telepon Orang Tua</label>
        <input type="text" name="telp_orngtua" id="telp_orngtua"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="e.g. +(12)3456 789" required="" value="">
      </div>
      <div class="col-span-6 sm:col-span-3">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" name="email" id="email"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="jondoe@paw.com" required="" value="">
      </div>
      <div class="col-span-6 sm:col-span-3">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
        <input type="text" name="address" id="address"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Telang, Sampang, Jawa Timur" required="" value="">
      </div>
      <div class="col-span-4 sm:col-span-2 mb-3">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
          Role</label>
        <select id="countries"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          name="role">
          <option value="" disabled selected>Pilih role</option>
          <option value="guru">Guru</option>
          <option value="siswa">Siswa</option>
        </select>
      </div>
      <div class=" col-span-2 sm:col-span-1 mb-3">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
        <select name="grade" id="">
          <option value="1">I</option>
          <option value="2">II</option>
          <option value="3">III</option>
          <option value="4">IV</option>
          <option value="5">V</option>
          <option value="6">VI</option>
        </select>
      </div>
      <div class="col-span-6 sm:col-span-3 mb-3">
        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
        <input type="password" name="password" id="first-name"
          class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="John Doe" required="" value="">
      </div>
    </div>
    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
      new account</button>
  </form>
</div>
@endsection