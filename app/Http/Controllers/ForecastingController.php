<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Forecasting;
use App\Models\ForecastingDES;
use App\Models\Penjualan;
use App\Models\PenjualanBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;
use phpDocumentor\Reflection\Types\Float_;
use function Symfony\Component\String\b;

class ForecastingController extends Controller
{
    public function index()
    {
        $waktu = collect();
        for ($i=1; $i<=3; $i++){
            $current = Carbon::now();
            $addM = $current->addMonths($i);
            $waktu->push($addM);
        }

        $grup = PenjualanBarang::all()->groupBy('id_barang');

        return view('Prediksi.index',[
            'waktu'         => $waktu,
            'grup_barang'   => $grup,
        ]);
//        if(auth()->user()->role == 'karyawan'){
//            return view('Prediksi.index',[
//                'waktu'         => $waktu,
//                'grup_barang'   => $grup,
//            ]);
//        }
//        elseif (auth()->user()->role == 'pemilik'){
//            return view('pemilik.prediksi.index',[
//                'waktu'         => $waktu,
//                'grup_barang'   => $grup,
//            ]);
//        }
    }
    public function checkForecast(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'periode'   => 'required',
        ]);
        $m          = $request->periode + 1;         //yg mau dilihat
        $idBarang   = $request->id_barang;
        $barang     = Barang::where('id_barang', $idBarang)->first();

        $this->dropDb();
        //forecasting DES
        $alpha = 0.562;
        $desColl = collect();
        $this->Xt($idBarang,$desColl);
        $this->Des($desColl, $alpha, $m);
        $this->createDb($desColl);

        $result = ForecastingDES::all();
        $waktu = [];
        foreach ($result as $wkt){
            $bln = Carbon::createFromFormat('Y-m-d', $wkt->waktu)->format('F y');
            $waktu[]=$bln;
        }
        $Xt = [];
        foreach ($result as $valueYt){
            $Xt[]=$valueYt->Xt;
        }
        $ft = [];
        foreach ($result as $valueFt){
            $ft[]=$valueFt->ft;
        }

        return view('Prediksi.dataPrediksi',[
            'forecasting'   => $result,
            'periode'       => $request->periode,
            'barang'        => $barang,
            'waktu'         => $waktu,
            'Xt'            => $Xt,
            'ft'            => $ft,
        ]);
//        if(auth()->user()->role == 'karyawan'){
//        }
//        elseif (auth()->user()->role == 'pemilik'){
//            return view('pemilik.prediksi.dataPrediksi',[
//                'forecasting'   => $result,
//                'periode'       => $request->periode,
//                'barang'        => $barang,
//                'waktu'         => $waktu,
//                'Xt'            => $Xt,
//                'ft'            => $ft,
//            ]);
//        }
    }

    public function Xt($idBrg, $desColl)
    {
        $penjualanBrg   = PenjualanBarang::where('id_barang', $idBrg)->get();
        $monthLast      = Carbon::createFromFormat('Y-m-d', $penjualanBrg->last()->waktu)->format('m Y');
        $currentMonth   = Carbon::now()->format('m Y');

        // if($monthLast == $currentMonth){
        //     $month_end= Carbon::now()->subMonth();
        //     dd("sama" . $monthLast . $currentMonth);
        // }
        // else{
        //     $month_end= Carbon::now();
        //     dd("beda" . $monthLast . $currentMonth);
        // }

        $month_start = Carbon::now()->subMonths(10);
        $month_end = Carbon::now();
        $penjualanBrg = PenjualanBarang::where('id_barang', $idBrg)
            ->whereBetween('waktu', [$month_start, $month_end])->get();
        // dd($penjualanBrg->skip(-1));

        for ($i = 0; $i < (count($penjualanBrg) - 1); $i++){
            $add = [
                'waktu' => $penjualanBrg[$i]->waktu,
                'Xt'    => $penjualanBrg[$i]->jumlah,
            ];
            $desColl->push($add);
        }
        // dd($desColl);
        return $desColl;
    }

    public function Des($desColl, $alpha, $m)
    {
        $desColl[0] = [
            'waktu'   => $desColl[0]['waktu'],
            'Xt'   => $desColl[0]['Xt'],
            'St'   => $desColl[0]['Xt'],
            'St2'  => $desColl[0]['Xt'],
            'a'    => $desColl[0]['Xt'],
            'b'    => 0,
        ];
        $data = $desColl->skip(1);

        for($i=1; $i<(count($desColl)); $i++) {
            //smoothing 1
            $St     = ($alpha * $desColl[$i]['Xt']) + ((1 - $alpha) * $desColl[$i-1]['St']);
            //smoothin 2
            $St2    = ($alpha * $St) + ((1 - $alpha) * $desColl[$i-1]['St2']);
            //a
            $a      = (2 * $St) - $St2;
            //b
            $b      = $alpha * ($St - $St2) / (1 - $alpha);
            //Nila prediksi
            $Ft     = $desColl[$i-1]['a'] + $desColl[$i-1]['b'];
            $waktu = Carbon::createFromFormat('Y-m-d', $desColl[$i]['waktu']);
            $newSt = [
                'waktu' => $waktu,
                'Xt'    => $desColl[$i]['Xt'],
                'St'    => $St,
                'St2'   => $St2,
                'a'     => $a,
                'b'     => $b,
                'ft'    => $Ft,
            ];
            $desColl[$i] = $newSt;
        }
        $last = $desColl->last();
        $a = $last['a'];
        $b = $last['b'];

        //Ft+m
        $ftm = collect([]);
        for ($z=1; $z<=$m ; $z++) {
            $current = Carbon::now();
            $current->subMonth();
            $addM = $current->addMonths($z);
            $waktu = $addM->format('Y m d');

            $predic = $a + ($b * $z);
            $ftm->push($predic);
            $new_ftm = [
                'waktu' => $addM,
                'Xt' => null,
                "St" => null,
                "St2" => null,
                "a" => null,
                "b" => null,
                'ft' => $predic,
            ];
            $desColl->push($new_ftm);
        }
        return $desColl;
    }


    public function createDb($forecastingCol)
    {
        foreach ($forecastingCol as $value){
            ForecastingDES::create($value);
        }
    }

    public function dropDb()
    {
        ForecastingDES::truncate();
    }
}
