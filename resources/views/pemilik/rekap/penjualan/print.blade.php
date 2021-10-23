@extends('layouts.login')
@section('login')
    <div class="container mt-1">
        <div class="text-center mb-4">
            <h3 style="font-weight: bold">Rekap Barang Masuk</h3>
        </div>
        <div>
            <table class="table table-borderless">
                <tr>
                    <td>Admin</td>
                    <td>: {{ $admin }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ date('d/m/Y H:i', strtotime(\Carbon\Carbon::now())) }}</td>
                </tr>
            </table>
        </div>
        <table class="table table-striped table-sm table-bordered align-middle">
            <thead class="text-white text-center">
            <tr class="align-middle">
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">ID Transaksi</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Admin</th>
            </tr>
            </thead>
            <tbody>
            @foreach($prints as $print)
                <tr class="p-0">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d/m/Y - H.i', strtotime($print->tgl)) }}</td>
                    <td class="text-center">{{ $print->id_penjualan }}</td>
                    <td>
                        @foreach($print->detailPenjualan as $detail)
                            <ul style="list-style-type:none">
                                <li>{{ $detail->barang->nama_barang }}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td>
                        @foreach($print->detailPenjualan as $detail)
                            <ul style="list-style-type:none;">
                                <li>{{ $detail->quantity }}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td>
                        {{ $detail->total }}
                    </td>
                    <td>{{ $print->admin->nama }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.print()
    </script>
@endsection
