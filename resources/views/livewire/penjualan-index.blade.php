<div>
    <div class="row g-3">
{{--        <button type="submit"class="delete-text"><i class="bi bi-x-lg"></i>  Delete</button>--}}
        @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
        @endif

        <form wire:submit.prevent="store">
            @csrf
            <div class="col-5">
                <label for="id_barang" class="form-label">ID Barang</label>
                <select name="id_barang"  wire:model="id_barang" class="form-select  @error('id_barang') is-invalid @enderror" >
                    <option value=""></option>
                    @foreach($items as $item)
                        <option value="{{ $item->id_barang }}">{{ $item->id_barang . '  ' . $item->nama_barang }}</option>
                    @endforeach
                </select>

                @error('id_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-5">
                    <label for="quantity" class="form-label" >Quantity</label>
                    <div class="input-group mb-3">
                        <input name="quantity" wire:model="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="items"><button type="submit" class="btn text-white ">Tambahkan</button></div>
        </form >

    </div>

    <div class="mt-4">
        <table class="table table-striped table-sm table-bordered">
            <thead class="text-white text-center">
            <tr>
                <th scope="col">ID Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>

            <tbody>
                @foreach ( $transactions as $transaksi )
                    <tr>
                        <td>{{ $transaksi->id_barang }}</td>
                        <td>{{ $transaksi->barang->nama_barang }}</td>
                        <td>{{ number_format($transaksi->barang->harga_jual) }}</td>
                        <td>{{ $transaksi->quantity }}</td>
                        <td>{{ number_format($transaksi->sub_total) }}</td>
                        <td>
                            <button type="submit" wire:click="deleteTransaction({{ $transaksi->id }})" class="delete-text"><i class="bi bi-x-lg"></i>  Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot style="border-style:hidden">
                <tr class="total_penjualan" >
                    <td colspan="3" ></td>
                    <td style="border-style:hidden">Total</td>
                    <td colspan="2">
{{--                        <input wire:model="total" hidden name="total" value="{{ ($transactions->sum('sub_total')) }}" class="@error ('total') is-invalid @enderror">--}}
                        : Rp. {{ number_format($transactions->sum('sub_total')) }}
                    </td>
                </tr>
                <tr style="border-style:hidden">
                    <td colspan="3" ></td>
                    <td style="border-style:hidden">Bayar : </td>
                    <td colspan="2">
                        <input type="number" wire:model="bayar" class="form-control width-auto @error ('bayar') is-invalid @enderror" required style="height: 34px; width:80%">
                        @error('bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </td>
                </tr>
                <tr >
                    <td colspan="3"></td>
                    <td style="border-style:hidden">Kembali : </td>
                    <td colspan="2">
                        Rp. {{ number_format($bayar - ($transactions->sum('sub_total'))) }}
{{--                        <input hidden wire:model="kembalian" value="{{ number_format($bayar - ($transactions->sum('sub_total'))) }}" class="@error ('kembalian') is-invalid @enderror">--}}
{{--                        @error('kembalian')--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ 'Pembayaran harus lebih daripada Total' }}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="container mx-auto ">
        <div class="row mt-3">
            <div class="col items"><a href="/admin" class="btn text-white"><i class="bi bi-arrow-left"></i>  Kembali</a></div>
            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-save text-white" data-bs-toggle="modal" data-bs-target="#saveModal"><i class="bi bi-sd-card"></i> Simpan</button>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="saveModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Apakah anda ingin mencetak?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="nota" target="_blank" class="btn btn-orange">IYA</button>
                    <button type="button" wire:click="noNota" class="btn btn-green-cetak" data-bs-dismiss="modal">TIDAK</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
@endpush
