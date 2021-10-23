<?php

namespace App\Http\Livewire;

use App\Models\Barang;
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
        'quantity' => 'required',
    ];

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
            'bayar'         =>'required|gte:total',
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
            $detail = [
                'id_penjualan' => $penjualan->id,
                'id_barang' => $value->id_barang,
                'quantity' => $value->quantity,
                'total' => $value->sub_total,
            ];
            $barang = Barang::where('id_barang', $value->id_barang)->first();
            $stok = ($barang->stok) - ($value->quantity);

            DetailPenjualan::insert($detail);
            Transaksi::where('id', $value->id)->delete();

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
        return view('livewire.penjualan-index', [
            'items'         => Barang::get(),
            'transactions'  => Transaksi::get()
        ]);
    }


}
