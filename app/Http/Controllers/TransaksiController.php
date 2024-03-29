<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use App\Models\Siswa;

class TransaksiController extends Controller
{
    public function index()
    {
        $tabungan = DB::table('transaksi')
            ->selectRaw('siswa.id, siswa.fullName, siswa.grade, SUM(money_in) AS masuk, SUM(money_out) AS keluar, SUM(money_in) - SUM(money_out) AS saldo')
            ->join('siswa', 'siswa.id', '=', 'transaksi.siswa_id')
            ->groupBy('siswa.fullName')
            ->orderBy('masuk', 'desc')
            ->get();
        // dd($tabungan);
        return view('transaksi.index', [
            'title' => 'Transaksi',
            'tabungan' => $tabungan,
        ]);
    }

    public function tarik(Request $request)
    {
        return view('transaksi.tarik', [
            'title' => 'Tarik',
            'url' => $request->url(),
        ]);
    }

    public function setor(Request $request)
    {

        return view('transaksi.setor', [
            'title' => 'Setor',
            'url' => $request->url(),   
        ]);
    }

    public function saveSetor($id, Request $request, Transaksi $transaksi)
    {
        $transaki = new Transaksi;
        $transaksi->money_in = $request->money_in;
        $transaksi->money_out = 0;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->siswa_id = $id;
        $transaksi->save();
        // dd($transaksi);

        return redirect('/transaksi');
    }

    public function saveTarik($id, Request $request, Transaksi $transaksi)
    {
        $transaki = new Transaksi;
        $transaksi->money_in = 0;
        $transaksi->money_out = $request->money_out;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->siswa_id = $id;
        $transaksi->save();
        // dd($transaksi);

        return redirect('/transaksi');
    }

    public function tabungan(Siswa $siswa)
    {
        $riwayat = DB::table('users')
        ->select('money_in','money_out','keterangan','transaksi.created_at', 'siswa.fullName')
        ->join('siswa','users.id','=','siswa.user_id')
        ->join('transaksi','transaksi.siswa_id','=','siswa.id')
        ->where('users.id','=',Auth::user()->id)
        ->orderBy('transaksi.created_at', 'desc')
        ->get();
        $saldo = $riwayat->reduce(function($carry, $item) {
            return $carry + $item->money_in - $item->money_out;
        });
        return view('siswa.tabungan', [
            'title' => 'Tabungan Siswa',
            'transaksi' => $riwayat,
            'saldo' => $saldo,
        ]);
    }
}
