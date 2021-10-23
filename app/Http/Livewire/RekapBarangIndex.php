<?php

namespace App\Http\Livewire;
use App\Models\RekapBarang;

use Livewire\Component;

class RekapBarangIndex extends Component
{
    public $tglAwal;
    public $tglAkhir;
    public $rekap;
    public $quantity;

    public function sort()
    {
        $this->rekap = 'hayy';
//        $this->rekap = RekapBarang::whereDate('tgl','>=',$this->tglAwal)
//            ->whereDate('tgl','<=', $this->tglAkhir)
//            ->get();
    }

    public function render()
    {
        return view('livewire.rekap-barang-index');
    }
}
