<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";

    public $guarded = [];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_barang', 'id_barang');
    }

    public function getRouteKeyName()
    {
        return 'id_kategori'; // TODO: Change the autogenerated stub
    }
}