@extends('layouts.main')
@section('title', $title)

@section('sidenav')
@include('partials.sidenav')
@endsection

@section('container')

<div class="overflow-x-auto relative shadow-md rounded w-[80vw] h-100 pt-3 pr-3 h-screen">
  <div class="flex justify-between items-center py-4 bg-white dark:bg-gray-800 p-4">
    <label for="table-search" class="sr-only">Search</label>
    <div class="relative">
      <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
            clip-rule="evenodd"></path>
        </svg>
      </div>
      <input type="text" id="table-search-users"
        class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Search for users">
    </div>
    <a href="/guru/create">
      <button type="button"
        class="flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Guru
        <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
        </svg>
      </button>
    </a>
  </div>
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="p-4">
          No.
        </th>
        <th scope="col" class="py-3 px-6">
          Name
        </th>
        <th scope="col" class="py-3 px-6">
          Alamat
        </th>
        <th scope="col" class="py-3 px-6">
          Status
        </th>
        <th scope="col" class="py-3 px-6">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($gurus as $guru)
      @php($no = 1)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="p-4 w-4">
          {{ $no += $loop->index }}
        </td>
        <th scope="row" class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          <img class="w-10 h-10 rounded-full" src="/images/user.png" alt="Jese image">
          <div class="pl-3">
            <div class="text-base font-semibold">{{ $guru->name }}</div>
            <div class="font-normal text-gray-500">{{ $guru->nip}}</div>
          </div>
        </th>
        <td class="py-4 px-6">
          {{ $guru->address }}
        </td>
        <td class="py-4 px-6">
          <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
          </div>
        </td>
        <td class="py-4 px-6 flex">
          <!-- Modal toggle -->
          <a href="#" type="button" data-modal-toggle="editUserModalById{{ $guru->id }}"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
            <button type="button"
              class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                </path>
              </svg>
            </button>
          </a>
          <form action="/guru/{{ $guru->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit"
              class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                </path>
              </svg>
            </button>
          </form>
        </td>
      </tr>

      <!-- Modal Section -->
      <div id="editUserModalById{{ $guru->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full backdrop-blur">
        <div class="relative w-full max-w-2xl h-full md:h-auto bg-white rounded">
          <!-- Modal content -->
          <form action="/guru/{{ $guru->id }}" class="relative bg-white rounded-lg shadow dark:bg-gray-700"
            method="POST">
            @csrf
            @method('PATCH')
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Edit Data Guru
              </h3>
              <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="editUserModalById{{ $guru->id }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-12 sm:col-span-6">
                  <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Lengkap</label>
                  <input type="text" name="name" id="first-name"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Bonnie" required="" value="{{ $guru->name }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk
                    Pegawai (NIP)</label>
                  <input type="text" name="nip" id="nip"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="example@company.com" required="" value="{{ $guru->nip }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                    Telepon</label>
                  <input type="text" name="telp" id="telp"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="e.g. +(12)3456 789" required="" value="{{ $guru->telp }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="address"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                  <input type="text" name="address" id="address"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Development" required="" value="{{ $guru->address }}"">
                </div>
              </div>
            </div>
            <!-- Modal footer -->
            <div class=" flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                  <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                </div>
          </form>
        </div>
      </div>

      @endforeach
    </tbody>
  </table>
  <!-- Edit user modal -->

  <!-- Paginate -->
  <div class="paginate absolute bottom-0">
    {{ $gurus->links() }}
  </div>
</div>

@endsection