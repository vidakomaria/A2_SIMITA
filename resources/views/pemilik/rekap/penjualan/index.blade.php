@extends('pemilik.layouts.main')

@section('container')
    <div class="container m-4 mb-0 pb-0 table-responsive col-lg-auto">
        <h1 class="mb-3 border-bottom pb-3">Rekap Penjualan</h1>

        <h6>Rekap Penjualan berdasarkan tanggal</h6>
        <form method="get" action="/pemilik/rekap/penjualan/rekap">
            @csrf
            <div class="row mb-3 align-items-center">
                <div class="col-auto ">
                    <label for="tglAwal" class="col-form-label">Tanggal Awal :</label>
                </div>
                <div class="col-auto p-0">
                    <input type="date" id="tglAwal" class="form-control" name="tglAwal" required>
                </div>

                <div class="col-auto">
                    <label for="tglAkhir" class="col-form-label">Tanggal Akhir :</label>
                </div>
                <div class="col-auto p-0">
                    <input type="date" id="tglAkhir" class="form-control" name="tglAkhir" required>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-green-cetak me-md-2 text-white" style="width: auto">Lihat</button>
                </div>
            </div>
        </form>


        <table class="table table-striped table-sm table-bordered align-middle">
            <thead class="text-white text-center">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">ID Transaksi</th>
                <th scope="col">List Barang</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Admin</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('tglAwal').max = new Date().toISOString().split("T")[0];
        document.getElementById('tglAkhir').max = new Date().toISOString().split("T")[0];
    </script>
@endsection
