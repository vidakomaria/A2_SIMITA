@extends('layouts.main')

@section('container')
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4><a href="/admin/prediksi" class="text-decoration-none">Prediksi</a> / Hasil Prediksi</h4>
    </div>
    <div class="container m-4 mx-0 table-responsive col-lg-auto">
        <div>
            <h5>Hasil Prediksi {{ $barang->nama_barang }} {{ $periode }} Bulan Kedepan</h5>
        </div>
        <div class="col-10 mx-auto m-4 border rounded">
            <div class="text-center py-2"><strong>Grafik Perbandingan Data Penjualan Aktual dengan Hasil Peramalan</strong></div>
            <canvas id="myChart" class="m-2"></canvas>
        </div>
        <!--Tabel-->
        <div class="container border mt-3 mb-4 rounded p-0">
            <div class="text-center py-2"><strong>Tabel Perbandingan Data Penjualan Aktual dengan Hasil Peramalan</strong></div>
            <div class="mx-3">
                <table class="table col-5 table-green mb-5 table-responsive table-borderless align-middle">
                    <thead>
                    <tr class="py-2">
                        <th scope="col">No</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Data Aktual Penjualan</th>
                        <th scope="col">Prediksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--            @for ($i = 0; $i<count($forecasting); $i++)--}}
                    @foreach($forecasting as $data)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td class="col-3">{!! date('F Y', strtotime($data->waktu)) !!}</td>
                            <td class="text-center col-3">{{ $data->Xt }}</td>
                            <td>{{ $data->ft }}</td>
                        </tr>
                    @endforeach
                    {{--            @endfor--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const labels = {!! json_encode($waktu) !!};
        const data = {
            labels: labels,
            datasets: [{
                label: 'Data Aktual',
                backgroundColor: 'rgb(133,255,99)',
                borderColor: 'rgb(2,56,0)',
                data: {!! json_encode($Xt) !!},
            },
                {
                    label: 'Data Prediksi',
                    backgroundColor: 'rgb(255,144,22)',
                    borderColor: 'rgb(255,185,99)',
                    data: {!! json_encode($ft) !!},
                }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection

@section('scrChart')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
