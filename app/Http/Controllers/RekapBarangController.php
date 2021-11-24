<?php

namespace App\Http\Controllers;
use App\Models\RekapBarang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapBarangController extends Controller
{

    public function index()
    {
        return view('Rekap.barang.index');
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

    public function cetak($tglAwal, $tglAkhir)
    {
        $rekap = RekapBarang::whereDate('tgl','>=',$tglAwal)
            ->whereDate('tgl','<=', $tglAkhir)->get();

        $admin = Auth::user()->nama;

        return view('Cetak.cetakRekapBarang',[
            'prints'    => $rekap,
            'admin'     => $admin,
        ]);
    }
}
