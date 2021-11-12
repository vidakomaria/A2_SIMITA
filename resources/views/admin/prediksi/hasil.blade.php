@extends('admin.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Prediksi</h1>
        <div>
            <h5>Hasil Prediksi {{ $barang->nama_barang }} {{ $periode }} Bulan Kedepan</h5>
        </div>
        <div class="col-10 mx-auto m-4 border">
            <canvas id="myChart"></canvas>
        </div>
        <table class="table col-5">
            <thead>
            <tr>
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
