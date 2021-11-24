<nav class="vh-100 sidebar">
{{--<nav class="vh-100 sidebar" style="background-image: url({{ url('image/bg_sidebar.png') }})" >--}}
    <div class="text-center">
        <img class="logo" src="{{ ("/image/logo.png") }}" >
        <h4 class="text-white">UD MITRA TANI</h4>
    </div>

    <ul class="nav flex-column align-items-stretch mb-auto ml-4">
        <div class="d-flex flex-column pt-4">
            <li class="nav-item">
                <a href="/pemilik" class="nav-link text-white {{ Request::is('pemilik') ? 'active' : '' }}" aria-current="page">
                    <i class="bi bi-house-door"></i>  Home</a>
            </li>

            <li class="nav-item"><a  href="/pemilik/barang" class=" nav-link text-white {{ Request::is('pemilik/barang*') ? 'active' : '' }}">
                    <i class="bi bi-journal-text"></i>  Data Barang</a>
            </li>

            <li class="nav-item" id="rekap">
                <button class="nav-link border-0 text-white sidebar-btn text-start" data-bs-toggle="collapse" data-bs-target="#dataRekap">
                    <i class="bi bi-server"></i> Data Rekap</button>
                <div class="collapse" id="dataRekap">
                    <ul class="text-white" style="list-style-type:none;">
                        <li><a href="/pemilik/rekap/barang" class="nav-link text-white {{ Request::is('pemilik/rekap/barang*') ? 'active' : '' }}">
                                <i class="bi bi-check2"></i>  Rekap Barang</a></li>
                        <li><a href="/pemilik/rekap/penjualan" class="nav-link text-white {{ Request::is('pemilik/rekap/penjualan*') ? 'active' : '' }}">
                                <i class="bi bi-check2"></i>  Rekap Penjualan</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="/pemilik/prediksi" class="nav-link text-white {{ Request::is('pemilik/prediksi') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-bar-graph"></i>  Prediksi</a>
            </li>
            <li class="nav-item">
                <a href="/pemilik/karyawan" class="nav-link text-white {{ Request::is('pemilik/karyawan') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-person"></i>  Data Admin Karyawan</a>
            </li>
        </div>

        <div class="row dropdown position-absolute bottom-0 start-0 mx-auto text-center" style="width: 100%">
            @auth()
                <button class="btn sidebar-btn dropdown-toggle text-white py-3" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>{{ auth()->user()->nama }}</strong>
                </button>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" onclick="return confirm('Anda Yakin Ingin Keluar?')"
                                class="dropdown-item" aria-current="page">
                            <i class="bi bi-box-arrow-right"></i>  Logout
                        </button>
                    </form>
                </ul>
            @endauth
        </div>
    </ul>

</nav>

