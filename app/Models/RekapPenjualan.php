<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapPenjualan extends Model
{
    use HasFactory;
    protected $table = "penjualan";

    public $guarded = [];

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_kasir', 'id');
    }

}
