<?php

namespace App\Http\Livewire\Admin\Rekap;

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
        return view('livewire.admin.rekap.rekap-barang-index',[
            'rekap' => $this->tglAkhir == null ? RekapBarang::whereDate('tgl',$this->tglAwal)->paginate(0) : $rekap,
            ]);
    }
}
