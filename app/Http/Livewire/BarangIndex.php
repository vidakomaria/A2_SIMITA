<?php

namespace App\Http\Livewire;

use App\Models\BarangDijual;
use Livewire\Component;
use Livewire\WithPagination;

class BarangIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.barang.barang-index',[
            'barang' => BarangDijual::where('id_barang', 'like', '%'.$this->search.'%')
                ->orWhere('nama_barang', 'like', '%'.$this->search.'%')->paginate(10),
        ]);

//        if(auth()->user()->role == "karyawan"){
//            return view('livewire.barang.barang-index',[
//                'barang' => BarangDijual::where('id_barang', 'like', '%'.$this->search.'%')
//                    ->orWhere('nama_barang', 'like', '%'.$this->search.'%')->paginate(10),
//            ]);
//        }
//        elseif (auth()->user()->role == "pemilik"){
//            return view('livewire.barang.barang-index',[
//                'barang' => BarangDijual::where('id_barang', 'like', '%'.$this->search.'%')
//                    ->orWhere('nama_barang', 'like', '%'.$this->search.'%')->paginate(10),
//            ]);
//        }
    }
}
