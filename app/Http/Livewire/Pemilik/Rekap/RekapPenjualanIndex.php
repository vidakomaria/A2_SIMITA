<?php

namespace App\Http\Livewire\Pemilik\Rekap;

use App\Models\RekapPenjualan;
use Carbon\Carbon;
use Livewire\Component;

use Livewire\WithPagination;

class RekapPenjualanIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tglAwal;
    public $tglAkhir;
    public $keuntungan;
    public $hargaJual;
    public $hargaBeli;

    protected $queryString = [
        'tglAwal',
        'tglAkhir',
    ];

    public function getData(){
        $tAwal = Carbon::parse($this->tglAwal);
        $tAkhir = Carbon::parse($this->tglAkhir)->addDays(1);

        $dataRekap = RekapPenjualan::whereBetween('tgl', [$tAwal, $tAkhir])->get();

        $harga_jual = 0;
        $harga_beli = 0;
        foreach ($dataRekap as $data){
            foreach ($data->detailPenjualan as $detail){
                $harga_jual = $detail->barang->harga_jual * $detail->quantity + $harga_jual;
                $harga_beli = $detail->barang->harga_beli * $detail->quantity + $harga_beli;
            }
        }
        $this->hargaJual = $harga_jual;
        $this->hargaBeli = $harga_beli;
        $this->keuntungan = $harga_jual-$harga_beli;

        $rekap = RekapPenjualan::whereBetween('tgl', [$tAwal, $tAkhir])->paginate(10);

        $this->resetPage();
        return $rekap;
    }
    public function render()
    {
        $rekap = $this->getData();
        return view('livewire.pemilik.rekap.rekap-penjualan-index',[
            'rekap' => $this->tglAkhir == null ? RekapPenjualan::whereDate('tgl',$this->tglAwal)->paginate(0) : $rekap,
            'keuntungan'    => $this->keuntungan,
        ]);
    }
}
