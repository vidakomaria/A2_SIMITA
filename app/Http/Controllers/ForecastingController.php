<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Forecasting;
use App\Models\ForecastingDES;
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

        return view('admin.prediksi.index',[
            'waktu'         => $waktu,
            'grup_barang'   => $grup,
        ]);
    }
    public function checkForecast(Request $request)
    {
        $n          = 2;
        $x          = $n-1;        //baris kosong di Mt
        $z          = ($n-1)*2;  //baris kosong di M't
        $subMonth   = (($n - 1) * 2) + 8;
        $m          = $request->periode + 1;         //yg mau dilihat
        $idBarang   = $request->id_barang;
        $barang     = Barang::where('id_barang', $idBarang)->first();

        $forecastingCol = collect([]);

        $this->dropDb();
        //forecasting DES
        $alpha = 0.48;
        $desColl = collect();
        $this->Xt($idBarang,$desColl);
        $this->Des($desColl, $alpha, $m);
        $this->createDb($desColl);


        //call
//        $this->callForecast($idBarang, $subMonth, $forecastingCol, $n, $x, $z, $m);

//        $result = Forecasting::whereNotNull('Ft')->get();
        $result = ForecastingDES::all();
//        return $result;
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

//        $this->viewAdmin($result, $request->periode, $barang, $waktu, $yt, $Ft);

        return view('admin.prediksi.hasil',[
            'forecasting'   => $result,
            'periode'       => $request->periode,
            'barang'        => $barang,
            'waktu'         => $waktu,
            'Xt'            => $Xt,
            'ft'            => $ft,
        ]);
    }

    public function Xt($idBrg, $desColl)
    {
        $month_end= Carbon::now();
        $month_start = Carbon::now()->subMonths(10);
        $penjualanBrg = PenjualanBarang::where('id_barang', $idBrg)
            ->whereBetween('waktu', [$month_start, $month_end])->get();

        for ($i = 0; $i < (count($penjualanBrg)); $i++){
            $add = [
                'waktu' => $penjualanBrg[$i]->waktu,
                'Xt'    => $penjualanBrg[$i]->jumlah,
            ];
            $desColl->push($add);
        }
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
            $St     = ($alpha * $desColl[$i]['Xt']) + ((1 - $alpha) * $desColl[$i-1]['St']);
            $St2    = ($alpha * $St) + ((1 - $alpha) * $desColl[$i-1]['St2']);
            $a      = (2 * $St) - $St2;
            $b      = $alpha * ($St - $St2) / (1 - $alpha);
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

    public function callForecast($idBarang, $subMonth, $forecastingCol, $n, $x, $z, $m)
    {
        //call
        $this->dropDb();
        $this->yt($idBarang, $subMonth, $forecastingCol);
        $this->Mt($n, $x, $forecastingCol);
        $this->mt2($n, $z, $forecastingCol);
        $this->ab($n, $z, $forecastingCol);
        $this->Ft($z, $m, $forecastingCol);
        $this->createDb($forecastingCol);
    }

    public function yt($idBrg, $subMonth, $forecastingCol)
    {
        $month_end= Carbon::now();
        $month_start = Carbon::now()->subMonths($subMonth);
        $penjualanBrg = PenjualanBarang::where('id_barang', $idBrg)
            ->whereBetween('waktu', [$month_start, $month_end])->get();

        for ($i = 0; $i < (count($penjualanBrg)); $i++){
            $add = [
                'yt'    => $penjualanBrg[$i]->jumlah,
                'waktu' => $penjualanBrg[$i]->waktu,
            ];
            $forecastingCol->push($add);
        }
        return $forecastingCol;
    }

    public function Mt($n, $x, $forecastingCol)
    {
        $groupsYt = $forecastingCol->sliding($n);

        $Mt = collect([]);
        for($i=0; $i<(count($groupsYt)); $i++){
            $result = 0;
            foreach ($groupsYt[$i] as $value){
                $result = $value['yt'] + $result;
            }
            $Mt->push($result/3);
        }

        $MtCol_new = $forecastingCol->skip($n-1);

        //Mt
        for ($i=$x; $i < ((count($MtCol_new)+$x)); $i++){
            $new_mt = [
                'yt'    => $forecastingCol[$i]['yt'],
                'waktu' => $forecastingCol[$i]['waktu'],
                'Mt'    => $Mt[$i-$x],
            ];
            $forecastingCol[$i] = $new_mt;
        }
            return $forecastingCol;
    }

    public function mt2($n, $z, $forecastingCol)
    {
        $forecastingMtCol = $forecastingCol->whereNotNull('Mt');
        $groupsMtCol = $forecastingMtCol->sliding($n);

        $Mt2 = collect();
        for ($i=0; $i<(count($groupsMtCol)); $i++){
            $result_mt2 = 0;
            foreach ($groupsMtCol[$i] as $value_mt){
                $result_mt2 = $value_mt['Mt'] + $result_mt2;
            }
            $Mt2->push($result_mt2/$n);
        }

        $newMtCol = $forecastingMtCol->skip($n-1);

        //M't//

        for ($i=$z; $i<(count($newMtCol)+$z); $i++){
            $new_mt2 = [
                'yt'    => $forecastingCol[$i]['yt'],
                'waktu' => $forecastingCol[$i]['waktu'],
                'Mt'    => $forecastingCol[$i]['Mt'],
                "M't"    => $Mt2[$i-$z]
            ];

            $forecastingCol[$i] = $new_mt2;
        }
        return $forecastingCol;
    }

    public function ab($n, $z, $forecastingCol)
    {
        // a = 2Mt - M't

        $forecastingMt2Col = $forecastingCol->whereNotNull("M't");
        $countMt2 = $forecastingMt2Col->count();
        for ($i=$z; $i<($countMt2 + $z); $i++){
            //a and b at collection//
            $a = (2 * $forecastingCol[$i]['Mt']) - $forecastingCol[$i]["M't"];
            $b = 2/($n-1) * ($forecastingCol[$i]['Mt'] - $forecastingCol[$i]["M't"]);


            $new_ab = [
                'yt'    => $forecastingCol[$i]['yt'],
                'waktu' => $forecastingCol[$i]['waktu'],
                'Mt'    => $forecastingCol[$i]['Mt'],
                "M't"   => $forecastingCol[$i]["M't"],
                "a"     => $a,
                "b"     => $b,
            ];
            $forecastingCol[$i] = $new_ab;
        }
        return $forecastingCol;
    }

    public function Ft($z, $m, $forecastingCol)
    {
        $forecastingMt2Col = $forecastingCol->whereNotNull("M't")->skip(1);
        $countMt2 = $forecastingMt2Col->count();
        //Ft
        for ($i=$z+1; $i<=($countMt2 + $z); $i++){
            $j = $i - 1;
            $ftCol =   $forecastingCol[$j]['a'] + $forecastingCol[$j]['b'];

            $new_ft = [
                'yt'    => $forecastingCol[$i]['yt'],
                'waktu' => $forecastingCol[$i]['waktu'],
                'Mt'    => $forecastingCol[$i]['Mt'],
                "M't"   => $forecastingCol[$i]["M't"],
                "a"     => $forecastingCol[$i]["a"],
                "b"     => $forecastingCol[$i]["b"],
                "Ft"    => $ftCol,
            ];
            $forecastingCol[$i] = $new_ft;
        }

        $fColLast = $forecastingCol->last();
        $a = $fColLast['a'];
        $b = $fColLast['b'];

        //Ft+m
        $ftm = collect([]);
        for ($z=1; $z<=$m ; $z++){
            $current = Carbon::now();
            $current->subMonth();
            $addM = $current->addMonths($z);
            $waktu = $addM->format('Y m d');

            $predic = $a + ($b * $z);
            $ftm->push($predic);
            $new_ftm = [
                'yt'    => null,
                'waktu' => $addM,
                'Mt'    => null,
                "M't"   => null,
                "a"     => null,
                "b"     => null,
                'Ft'    => $predic,
            ];
            $forecastingCol->push($new_ftm);
        }
        return $forecastingCol;
    }

    public function createDb($forecastingCol)
    {
//        foreach ($forecastingCol as $value){
//            Forecasting::create($value);
//        }
        foreach ($forecastingCol as $value){
            ForecastingDES::create($value);
        }
    }

    public function dropDb()
    {
//        Forecasting::truncate();
        ForecastingDES::truncate();
    }
}
