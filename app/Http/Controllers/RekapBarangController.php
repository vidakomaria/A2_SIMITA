<?php

namespace App\Http\Controllers;
use App\Models\RekapBarang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapBarangController extends Controller
{

    public function index()
    {
        return view('admin.rekap.barang.index');
    }

    public function rekap(Request $request)
    {
//        dd($request->tglAwal);
        $rekap = RekapBarang::whereDate('tgl','>=',$request->tglAwal)
            ->whereDate('tgl','<=', $request->tglAkhir)
            ->paginate(10)->withQueryString();
        return view('admin.rekap.barang.rekap',[
            'rekaps'    =>$rekap,
            'tglAwal'   =>$request->tglAwal,
            'tglAkhir'  =>$request->tglAkhir,
        ]);
    }

    public function print($tglAwal, $tglAkhir)
    {
        $rekap = RekapBarang::whereDate('tgl','>=',$tglAwal)
            ->whereDate('tgl','<=', $tglAkhir)->get();

        $admin = Auth::user()->nama;

        return view('admin.rekap.barang.cetak',[
            'prints'    => $rekap,
            'admin'     => $admin,
        ]);
    }

    public function pemilikIndex()
    {
        return view('pemilik.rekap.barang.index');
    }

    public function pemilikRekap(Request $request)
    {
        $rekap = RekapBarang::whereDate('tgl','>=',$request->tglAwal)
            ->whereDate('tgl','<=', $request->tglAkhir)
            ->paginate(10)->withQueryString();
        return view('pemilik.rekap.barang.rekap',[
            'rekaps'    =>$rekap,
            'tglAwal'   =>$request->tglAwal,
            'tglAkhir'  =>$request->tglAkhir,
        ]);
    }

    public function pemilikPrint($tglAwal, $tglAkhir)
    {
        $rekap = RekapBarang::whereDate('tgl','>=',$tglAwal)
            ->whereDate('tgl','<=', $tglAkhir)->get();

        $admin = Auth::user()->nama;

        return view('pemilik.rekap.barang.cetak',[
            'prints'    => $rekap,
            'admin'     => $admin,
        ]);
    }
}
