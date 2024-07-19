<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transaksiController extends Controller
{
    //

    public function index()
    {
        $data_transaksi = DB::table('transaksi')->join('jenis', 'jenis.id_jenis', 'transaksi.id_jenis')->orderBy('id_transaksi', 'DESC')->get();
        $uang_masuk = DB::table('transaksi')->where('id_jenis', '=', 1)->sum('nilai_transaksi');
        $uang_keluar = DB::table('transaksi')->where('id_jenis', '=', 2)->sum('nilai_transaksi');

        $total_kas = $uang_masuk - $uang_keluar;


        $pemasukan_terakhir = DB::table('transaksi')->where('id_jenis', '=', 1)->orderBy('id_transaksi', 'DESC')->limit(1)->get();
        $pengeluaran_terakhir = DB::table('transaksi')->where('id_jenis', '=', 2)->orderBy('id_transaksi', 'DESC')->limit(1)->get();

        // dd($data_transaksi);
        return view('transaksi', compact(['data_transaksi', 'pemasukan_terakhir', 'pengeluaran_terakhir', 'total_kas']));
    }

    public function tambah(Request $request)
    {
        Transaksi::create($request->except(['_token', 'submit']));
        return redirect('/transaksi');
    }

    public function edit($id_transaksi, Request $request)
    {
        $data = Transaksi::find($id_transaksi);
        $data->update($request->except(['_token', 'submit']));
        return redirect('/transaksi');
    }

    public function hapus($id)
    {
        $data = Transaksi::find($id);
        $data->delete();
        return redirect('/transaksi');
    }
}
