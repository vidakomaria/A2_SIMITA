<div>
    <div class="container">
        <form wire:submit.prevent="show">
            @csrf
            <div class="row mb-3 align-items-center">
                <div class="col-auto ">
                    <label for="tglAwal" class="col-form-label">Tanggal Awal :</label>
                </div>
                <div class="col-auto p-0">
                    <input wire:model="tglAwal"  type="date" id="tglAwal" class="form-control" name="tglAwal" required>
                </div>

                <div class="col-auto">
                    <label for="tglAkhir" class="col-form-label">Tanggal Akhir :</label>
                </div>
                <div class="col-auto p-0">
                    <input type="date" id="tglAkhir" class="form-control" name="tglAkhir" wire:model="tglAkhir" required>
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
{{--            {{ dd($rekap) }}--}}
{{--                $rekap[0]->detailPenjualan[0]->barang->nama_barang--}}
{{--                @foreach($rekap as $data)--}}
{{--                    <tr class="text-center">--}}
{{--                        <td>{{ $loop->iteration }}</td>--}}
{{--                        <td>{{ date('d/m/Y - H.i', strtotime($data->tgl)) }}</td>--}}
{{--                        <td><a href="" id="listBarang">{{ $data->id_penjualan }}</a></td>--}}
{{--                        <td class="text-start">{{ $data->detailPenjualan[0]->barang->nama_barang }} , . . .</td>--}}
{{--                        <td>{{ $data->detailPenjualan[0]->quantity }} , . . .</td>--}}
{{--                        <td style="width: 12%">{{ $data->grand_total }}</td>--}}
{{--                        <td>{{ $data->admin->nama }}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
            </tbody>
        </table>
    </div>
</div>
