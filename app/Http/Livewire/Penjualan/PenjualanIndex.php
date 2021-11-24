<?php

namespace App\Http\Livewire\Penjualan;

use App\Models\Barang;
use App\Models\BarangDijual;
use App\Models\PenjualanBarang;
use App\Models\Transaksi;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Carbon\Carbon;
use Livewire\Component;
use function PHPUnit\Framework\lessThanOrEqual;

class PenjualanIndex extends Component
{
    public $id_barang;
    public $quantity;
    public $bayar;
    public $total;

    protected $rules = [
        'id_barang' => 'required|unique:transaksi',
        'quantity' => 'required|gte:1',
    ];

    public function searchIdBarang(){
        if ($this->search != ''){
            $this->idBarang = Barang::where('id_barang', 'like', '%' . $this->search . '%')->get();
        }
//        $this->mount();
    }
    public function store()
    {
        $this->validate();

        $harga = Barang::where('id_barang', $this->id_barang)->first();
        $sub_total = $harga->harga_jual;

        $transaksi = Transaksi::create([
            'id_barang' => $this->id_barang,
            'quantity'  => $this->quantity,
            'sub_total' => $this->quantity * $sub_total,
        ]);

        $transaksi->sub_total = ($transaksi->barang->harga_jual)*($transaksi->quantity);
        // $transaksi->save();
        $this->clear();
    }

    public function deleteTransaction($id)
    {
        $transaction = Transaksi::find($id);
        $transaction->delete();
    }

    public function clear()
    {
        $this->id_barang = null;
        $this->quantity = null;
        $this->bayar = null;
    }

    public function save()
    {
        $this->total = Transaksi::get()->sum('sub_total');

        $transaksi = Transaksi::get();
        $rules =[
            'total'         => 'required',
            'bayar'         => 'required|gte:total',
        ];
//        $this->addError('bayar', 'Bayar kurang');

        $this->validate($rules);

        $penjualan = Penjualan::create([
            'tgl'           => Carbon::now(),
            'id_kasir'      => auth()->user()->id,
            'nama_kasir'    => auth()->user()->nama,
//            'id_kasir'      => 1,
//            'nama_kasir'    => 'test',
            'grand_total'   => $transaksi->sum('sub_total'),
            'pembayaran'    => $this->bayar,
            'kembalian'     => ($this->bayar)-($transaksi->sum('sub_total')),
        ]);

        foreach ($transaksi as $value) {
            //tambah di penjualan barang (forecasting)
            $penjualanBrg = PenjualanBarang::where('id_barang', $value->id_barang)->get();

            if(count($penjualanBrg)>=1)
            {
                $penjualanLast = $penjualanBrg->last();
                $waktu = Carbon::createFromFormat('Y-m-d',$penjualanLast->waktu)->format('m Y');
                $now = Carbon::now()->format('m Y');

                if ($waktu == $now){
                    // dd('waktu sama');
                    $jmlh = $penjualanLast->jumlah + $value->quantity;
                    // dd('id barang '.$value->id_barang . 'jmlh '. $jmlh);
                    // dd($penjualanLast->id);
                    $updateData = [
                        'jumlah'    => $jmlh,
                        'waktu'     => Carbon::now(),
                    ];
                    PenjualanBarang::where('id', $penjualanLast->id)
                        ->update($updateData);
                }
                else{
//                    dd($penjualanLast->jumlah);
                    $create = [
                        'waktu'     => Carbon::now()->format('Y-m-d'),
                        'id_barang' => $value->id_barang,
                        'jumlah'    => $value->quantity,
                    ];
                    PenjualanBarang::create($create);
                }
            }

            $detail = [
                'id_penjualan' => $penjualan->id,
                'id_barang' => $value->id_barang,
                'quantity' => $value->quantity,
                'total' => $value->sub_total,
            ];
            $barang = BarangDijual::where('id_barang', $value->id_barang)->first();
            $stok = ($barang->stok) - ($value->quantity);

            DetailPenjualan::insert($detail);
            Transaksi::where('id', $value->id)->delete();

            BarangDijual::where('id_barang', $value->id_barang)
                ->update(['stok' => $stok]);
            Barang::where('id_barang', $value->id_barang)
                ->update(['stok' => $stok]);
        }
        $this->clear();
        return $penjualan->id;
    }

    public function noNota()
    {
        $this->save();
    }

    public function nota()
    {
        $id_penjualan = $this->save();
        $this->redirect('/admin/penjualan/nota/'.$id_penjualan);
    }

    //inisialisasi controllernya livewire
    public function render()
    {
        return view('livewire.penjualan.penjualan-index', [
            'items'         => BarangDijual::get(),
            'transactions'  => Transaksi::get()
        ]);
    }


}
