<?php

namespace App\Http\Livewire\Rekap;

use App\Models\RekapBarang;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class RekapBarangIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tglAwal;
    public $tglAkhir;

    protected $queryString = [
        'tglAwal',
        'tglAkhir',
    ];

    public function getData(){
        $tAwal = Carbon::parse($this->tglAwal);
        $tAkhir = Carbon::parse($this->tglAkhir)->addDays(1);

        $rekap = RekapBarang::whereBetween('tgl', [$tAwal, $tAkhir])->paginate(10);
        $this->resetPage();

        return $rekap;
    }

    public function render()
    {
        $rekap = $this->getData();
        return view('livewire.rekap.rekap-barang-index',[
            'rekap' => $this->tglAkhir == null ? RekapBarang::whereDate('tgl',$this->tglAwal)->paginate(0) : $rekap,
        ]);
//        if(auth()->user()->role == "karyawan"){
//            return view('livewire.rekap.rekap-barang-index',[
//                'rekap' => $this->tglAkhir == null ? RekapBarang::whereDate('tgl',$this->tglAwal)->paginate(0) : $rekap,
//            ]);
//        }
//        elseif(auth()->user()->role == "pemilik"){
//            return view('livewire.rekap.rekap-barang-index',[
//                'rekap' => $this->tglAkhir == null ? RekapBarang::whereDate('tgl',$this->tglAwal)->paginate(0) : $rekap,
//            ]);
//        }
    }
}
