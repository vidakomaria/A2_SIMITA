<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('admin.penjualan.index');
    }

    public function nota($id_penjualan)
    {
        $penjualan = Penjualan::with('detailPenjualan')
        ->where('id_penjualan',$id_penjualan)->first();
        return view('admin.penjualan.nota',[
            'penjualan' => $penjualan,
        ]);
    }
}
