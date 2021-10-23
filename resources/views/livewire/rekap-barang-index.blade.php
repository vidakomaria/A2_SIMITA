<div>
    <form wire:submit.prevent="sort">
        @csrf
        <div class="row mb-3 align-items-center">
            <div class="col-auto">
                <label for="tglAwal" class="col-form-label">Tanggal Awal :</label>
            </div>
            <div class="col-auto">
                <input type="date" name="tglAwal" wire:model="tglAwal" id="tglAwal" class="form-control">
            </div>
            {{ ($tglAwal) }}

            <div class="col-auto">
                <label for="tglAkhir" class="col-form-label">Tanggal Akhir :</label>
            </div>
            <div class="col-auto">
                <input type="date" id="tglAkhir" class="form-control" name="tglAkhir" wire:model="tglAkhir">
            </div>
            {{ ($tglAkhir) }}

            <div class="col-auto align-self-end">
                <button type="submit" class="btn me-md-2 text-white" >Lihat</button>
            </div>
        </div>
    </form>

    <div class="mt-4">
        <table class="table table-striped table-sm table-bordered align-middle">
            <thead class="text-white text-center">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">ID Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Data Masuk</th>
                <th scope="col">Total Barang</th>
                <th scope="col">Admin</th>
            </tr>
            </thead>
            <tbody>
{{--            {{ dd($rekaps) }}--}}
{{--            @foreach($rekaps as $rekap)--}}
{{--                <tr>--}}
{{--                    <td>{{ $loop->iteration }}</td>--}}
{{--                    <td>{{ date('d/m/Y - H.i', strtotime($rekap->tgl)) }}</td>--}}
{{--                    <td>{{ $rekap->id_barang }}</td>--}}
{{--                    <td>nama</td>--}}
{{--                    <td>{{ $rekap->barang_masuk }}</td>--}}
{{--                    <td>stok</td>--}}
{{--                    <td>petugas</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('tglAwal').max = new Date().toISOString().split("T")[0];
    document.getElementById('tglAkhir').max = new Date().toISOString().split("T")[0];
</script>
@push('scripts')
@endpush
