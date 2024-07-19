<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class dashboardController extends Controller
{
    public function index()
    {
        $data_transaksi = DB::table('transaksi')->join('jenis', 'jenis.id_jenis', 'transaksi.id_jenis')->get();
        $uang_masuk = DB::table('transaksi')->where('id_jenis', '=', 1)->sum('nilai_transaksi');
        $uang_keluar = DB::table('transaksi')->where('id_jenis', '=', 2)->sum('nilai_transaksi');

        $total_kas = $uang_masuk - $uang_keluar;


        $pemasukan_terakhir = DB::table('transaksi')->where('id_jenis', '=', 1)->orderBy('id_transaksi', 'DESC')->limit(1)->get();
        $pengeluaran_terakhir = DB::table('transaksi')->where('id_jenis', '=', 2)->orderBy('id_transaksi', 'DESC')->limit(1)->get();


        $anggota = DB::table('anggota')->get();
        return view('dashboard', compact(['data_transaksi', 'pemasukan_terakhir', 'pengeluaran_terakhir', 'total_kas', 'anggota']));
    }
}
