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

    public function adminIndex()
    {
        return view('admin.rekap.penjualan.index');
    }

    public function adminDetail($id_penjualan)
    {
        $detail = DetailPenjualan::where('id_penjualan', $id_penjualan)->get();
        $harga_jual = 0;
        $harga_beli = 0;
        foreach ($detail as $value){
            $harga_jual = $value->barang->harga_jual * $value->quantity + $harga_jual;
            $harga_beli = $value->barang->harga_beli * $value->quantity + $harga_beli;
    }

        return view('admin.rekap.penjualan.detail',[
            'detail'        => $detail,
            'id_transaksi'  => $id_penjualan,
            'keuntungan'    => $harga_jual-$harga_beli,
        ]);
    }

    public function adminPrint($tglAwal, $tglAkhir)
    {
        $rekap = RekapPenjualan::whereDate('tgl','>=',$tglAwal)
            ->whereDate('tgl','<=', $tglAkhir)->get();

        $admin = Auth::user()->nama;

        return view('admin.rekap.penjualan.print',[
            'prints'    => $rekap,
            'admin'     => $admin,
        ]);
    }

    public function adminPrintDetail($id_penjualan)
    {
        $penjualan = RekapPenjualan::where('id_penjualan',$id_penjualan)->first();

        $admin = Auth::user()->nama;

        return view('admin.rekap.penjualan.print_detail',[
            'penjualan' => $penjualan,
            'admin'     => $admin,
        ]);
    }

    public function pemilikIndex()
    {
        return view('pemilik.rekap.penjualan.index');
    }

    public function pemilikRekap(Request $request)
    {
        $rekap = RekapPenjualan::with('detailPenjualan')
            ->whereDate('tgl','<=',$request->tglAkhir)
            ->whereDate('tgl', '>=', $request->tglAwal)
            ->paginate(10)->withQueryString();

        return view('pemilik.rekap.penjualan.hasil_rekap',[
            'rekap'     => $rekap,
            'tglAwal'   => $request->tglAwal,
            'tglAkhir'  => $request->tglAkhir,
        ]);
    }

    public function pemilikDetail($id_penjualan)
    {
        $detail = DetailPenjualan::where('id_penjualan', $id_penjualan)->get();
        $harga_jual = 0;
        $harga_beli = 0;
        foreach ($detail as $value){
            $harga_jual = $value->barang->harga_jual * $value->quantity + $harga_jual;
            $harga_beli = $value->barang->harga_beli * $value->quantity + $harga_beli;
        }

        return view('pemilik.rekap.penjualan.detail',[
            'detail'        => $detail,
            'id_transaksi'  => $id_penjualan,
            'keuntungan'    => $harga_jual-$harga_beli,
        ]);
    }

    public function pemilikPrint($tglAwal, $tglAkhir)
    {
        $rekap = RekapPenjualan::whereDate('tgl','>=',$tglAwal)
            ->whereDate('tgl','<=', $tglAkhir)->get();

        $admin = Auth::user()->nama;

        return view('pemilik.rekap.penjualan.print',[
            'prints'    => $rekap,
            'admin'     => $admin,
        ]);
    }

    public function pemilikPrintDetail($id_penjualan)
    {
        $penjualan = RekapPenjualan::where('id_penjualan',$id_penjualan)->first();

        $admin = Auth::user()->nama;

        return view('pemilik.rekap.penjualan.print_detail',[
            'penjualan' => $penjualan,
            'admin'     => $admin,
        ]);
    }
}
