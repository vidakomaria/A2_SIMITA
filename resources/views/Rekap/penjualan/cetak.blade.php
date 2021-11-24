@extends('layouts.nota')
@section('nota')
    <div class="container mt-1">
        <div class="text-center mb-4">
            <h3 style="font-weight: bold">Rekap Penjualan</h3>
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
        <table class="table table-striped table-sm table-borderless align-middle table-green">
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
                            <div class="row">
                                <div class="col">
                                    {{ $detail->barang->nama_barang }}
                                </div>
                            </div>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach($print->detailPenjualan as $detail)
                            <div class="row">
                                <div class="col">
                                    {{ $detail->quantity }}
                                </div>
                            </div>
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
