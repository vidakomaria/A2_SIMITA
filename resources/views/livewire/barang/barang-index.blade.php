<div>
    <div class="container-fluid mt-3 pt-2 ms-1 ps-0">
        <!--session message-->
        @if(session()->has('success'))
            <div class="alert alert-success col-lg-8 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    <!--Add & search-->
        <div class="row g-3 mt-0 pt-0">
            <div class="col">
                @if(auth()->user()->role == 'karyawan')
                    <a href="/admin/barang/create" class="btn-green-a p-3 text-decoration-none text-white rounded-3">
                        <i class="bi bi-plus-lg"></i>  Tambah Data Baru
                    </a>
                @endif
            </div>
            <div class="col-4">
                <form action="/admin/barang" >
                    <div class="input-group">
                        <input wire:model="search" type="text" class="form-control"
                               placeholder="Pencarian" name="search" >
{{--                        <button class="btn btn-outline-secondary text-white" type="submit" ><i class="bi bi-search"></i></button>--}}
                    </div>
                </form>
            </div>
        </div>

        <!--Table-->
        <div class="container border mt-3 rounded-lg p-0">
            <div class="table-responsive mx-3">
                <table class="table table-striped table-green table-sm table-borderless align-middle">
                    <thead class="text-white text-center align-middle">
                    <tr>
                        <th scope="col">ID Barang</th>
                        <th scope="col" style="width: 25%">Nama Barang</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col" style="width: 18%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($barang as $item)
                        <tr class="text-center">
                            <td class="p-3">{{ $item->id_barang }}</td>
                            <td class="text-start">{{ ucwords($item->nama_barang) }}</td>
                            <td>Rp. {{ number_format($item->harga_beli) }}</td>
                            <td>Rp. {{ number_format($item->harga_jual) }}</td>
                            <td>{{ ucwords($item->kategori->nama_kategori) }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                @if(auth()->user()->role == 'karyawan')

                                    <form action="/admin/barang/{{ $item->id_barang }}" method="post" class="d-inline">
                                        <a href="/admin/barang/{{ $item->id_barang }}/edit" class="badge edit text-decoration-none"><i class="bi bi-pencil-square"></i> Ubah</a>
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')">
                                            <i class="bi bi-x-circle"></i> Hapus
                                        </button>
                                    </form>
                                @elseif(auth()->user()->role == 'pemilik')
                                    <a href="/pemilik/barang/{{ $item->id_barang }}/edit" class="badge edit text-decoration-none"><i class="bi bi-pencil-square"></i> Ubah</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row mx-2">
                <div class="col">

                </div>
                <div class="col-auto align-self-end">
                    {{ $barang->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
