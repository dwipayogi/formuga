<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class jenisController extends Controller
{
    //

    public function index() {
        return view('');
    }

    public function tambah(Request $request) {
        Jenis::create($request->except(['_token', 'submit']));
        return redirect('/transaksi');
    }

    public function edit($id, Request $request) {
        $data = Jenis::find($id);
        $data->update($request->except(['_token', 'submit']));
        return redirect('/transaksi');
    }

    public function hapus($id) {
        Jenis::find($$id);
        return redirect('/transaksi');
    }
}
