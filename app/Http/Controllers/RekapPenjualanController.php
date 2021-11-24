<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\RekapBarang;
use App\Models\RekapPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapPenjualanController extends Controller
{

    public function index()
    {
        return view('Rekap.penjualan.index');
    }

    public function detail($id_penjualan)
    {
        $detail = DetailPenjualan::where('id_penjualan', $id_penjualan)->get();
        $harga_jual = 0;
        $harga_beli = 0;
        foreach ($detail as $value){
            $harga_jual = $value->barang->harga_jual * $value->quantity + $harga_jual;
            $harga_beli = $value->barang->harga_beli * $value->quantity + $harga_beli;
    }

        return view('Rekap.penjualan.detail',[
            'detail'        => $detail,
            'id_transaksi'  => $id_penjualan,
            'keuntungan'    => $harga_jual-$harga_beli,
        ]);
    }

    public function cetak($tglAwal, $tglAkhir)
    {
        $rekap = RekapPenjualan::whereDate('tgl','>=',$tglAwal)
            ->whereDate('tgl','<=', $tglAkhir)->get();

        $admin = Auth::user()->nama;

        return view('Rekap.penjualan.cetak',[
            'prints'    => $rekap,
            'admin'     => $admin,
        ]);
    }
}
