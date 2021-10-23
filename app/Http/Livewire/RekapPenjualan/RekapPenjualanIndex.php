<?php

namespace App\Http\Livewire\RekapPenjualan;

use Illuminate\Support\Arr;
use Livewire\Component;
use App\Models\RekapPenjualan;
use App\Models\DetailPenjualan;

class RekapPenjualanIndex extends Component
{
    public $tglAwal;
    public $tglAkhir;
    public $rekap;

    public function show()
    {
        $rekap = RekapPenjualan::with('detailPenjualan')
            ->whereDate('tgl','<=',$this->tglAkhir)
            ->whereDate('tgl', '>=', $this->tglAwal)
            ->paginate(10)->withQueryString();

        foreach ($rekap as $value){
            Arr::add($rekap,[
                'tgl'       =>$value->tgl,
                'id_kasir'  =>$value->id_kasir
            ]);

        }
        $this->rekap=$rekap;
        dd($this->rekap['id_kasir']);
    }

//    public function detail()
//    {
//        $detail = DetailPenjualan::where('id_penjualan', $id_penjualan)->get();
//
//    }

    public function render()
    {
        return view('livewire.rekap-penjualan.rekap-penjualan-index');
    }
}
