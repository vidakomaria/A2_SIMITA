@extends('pemilik.layouts.main')

@section('container')
    <div class="container m-4 mb-0 pb-0 table-responsive col-lg-auto">
        <h1 class="mb-3 border-bottom pb-3">Rekap Barang</h1>

        <form method="get" action="/pemilik/rekap/penjualan/rekap">
            @csrf
            <div class="row mb-3 align-items-center">
                <div class="col-auto ">
                    <label for="tglAwal" class="col-form-label">Tanggal Awal :</label>
                </div>
                <div class="col-auto p-0">
                    <input type="date" id="tglAwal" class="form-control" name="tglAwal" value="{{ $tglAwal }}">
                </div>

                <div class="col-auto">
                    <label for="tglAkhir" class="col-form-label">Tanggal Akhir :</label>
                </div>
                <div class="col-auto p-0">
                    <input type="date" id="tglAkhir" class="form-control" name="tglAkhir" value="{{ $tglAkhir }}">
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-green-cetak me-md-2 text-white" style="width: auto">Lihat</button>
                </div>
                <div class="col align-self-end">
                    <button type="button" class="btn btn-orange me-md-2 text-white"
                            data-bs-toggle="modal" data-bs-target="#print">
                        <i class="bi bi-printer"></i> Cetak
                    </button>
                </div>
            </div>
        </form>

        <div class="mt-1">
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
                @foreach($rekap as $data)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d/m/Y - H.i', strtotime($data->tgl)) }}</td>
                        <td><a id="listBarang" href="/pemilik/rekap/penjualan/detail/{{ $data->id_penjualan }}">
                                {{ $data->id_penjualan }}
                            </a>
                        </td>
                        <td class="text-start">{{ $data->detailPenjualan[0]->barang->nama_barang }} , . . .</td>
                        <td>{{ $data->detailPenjualan[0]->quantity }} , . . .</td>
                        <td style="width: 12%">{{ $data->grand_total }}</td>
                        <td>{{ $data->admin->nama }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex flex-total justify-content-end p-2 px-3 bd-highlight">
            Keuntungan : Rp. {{ number_format($rekap->sum('grand_total')) }}</div>

        <div class="row">
             <div class="col">
                Menampilkan {{ $rekap->currentPage() }} s/d {{ $rekap->lastPage() }} data
            </div>
            <div class="col-auto align-self-end">
                {{ $rekap->links() }}
            </div>
        </div>

        <!-- Modal Cetak-->
        <div class="modal fade" id="print" data-bs-backdrop="static" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Apakah anda ingin mencetak?</h5>
                    </div>
                    <div class="modal-footer">
                        <a href="/pemilik/rekap/penjualan/print/{{ $tglAwal }}/{{ $tglAkhir }}" target="_blank"><button class="btn btn-orange">IYA</button></a>
                        <button type="button" class="btn btn-green-cetak" data-bs-dismiss="modal">TIDAK</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal Cetak-->
    </div>


    <script>
        document.getElementById('tglAwal').max = new Date().toISOString().split("T")[0];
        document.getElementById('tglAkhir').max = new Date().toISOString().split("T")[0];

    </script>
@endsection
