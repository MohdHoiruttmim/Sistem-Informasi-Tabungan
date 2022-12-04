@extends('layouts.main')
@section('title', $title)

@section('sidenav')
@include('partials.sidenav')
@endsection

@section('container')
<div class="wrapper p-3 w-[80vw]">

  <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
        Setor/Tarik Tabungan
        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed
          to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
      </caption>
      <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="py-3 px-3">
            Nama Siswa
          </th>
          <th scope="col" class="py-3 px-3">
            Kelas
          </th>
          <th scope="col" class="py-3 px-3">
            Pemasukan (Rp)
          </th>
          <th scope="col" class="py-3 px-3">
            Pengeluaran (Rp)
          </th>
          <th scope="col" class="py-3 px-3">
            Saldo (Rp)
          </th>
          <th scope="col" class="py-3 px-3">
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="py-4 px-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            Andi Kusuma
          </th>
          <td class="py-4 px-3">
            2
          </td>
          <td class="py-4 px-3">
            100000
          </td>
          <td class="py-4 px-3">
            10000
          </td>
          <td class="py-4 px-3">
            20000
          </td>
          <td class="py-4 px-3 text-right">
            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
              <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Setor</button>
            </a>
            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-5">
              <button type="button"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Tarik</button>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
@endsection