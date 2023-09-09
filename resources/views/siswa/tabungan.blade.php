@extends('layouts.main')
@section('title', $title)

@section('sidenav')
@include('partials.sidenav')
@endsection

@section('container')
<div class="wrapper m-3 w-[80%]">
  <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
    {{ $transaksi[0]->fullName }}
  </h1>
  <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
    Saldo Rp. {{ number_format($saldo, 0, ',', '.') }}
  </h2>
  <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700 space-y-1">
    @foreach ($transaksi as $trans)
    <li class="pb-3 sm:pb-4 {{ ($trans->money_in > $trans->money_out)? 'bg-lime-200' : 'bg-red-200' }} rounded-lg p-4">
      <div class="flex items-center space-x-4">
        <div class="flex-1 min-w-0">
          <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
            {{ $trans->keterangan }}
          </p>
          <p class="text-sm text-gray-900 truncate dark:text-gray-400">
            {{ $trans->created_at }}
          </p>
        </div>
        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
          Rp. {{ ($trans->money_in == 0)? number_format($trans->money_out, 0, ',', '.') :
          number_format($trans->money_in, 0, ',', '.'); }}
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</div>
@endsection