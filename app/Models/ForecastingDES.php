<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastingDES extends Model
{
    use HasFactory;

    protected $table = 'forecasting_des';

    protected $guarded = ['id'];
}
