<nav class="vh-100 sidebar" >
    <div><img src=""></div>

    <ul class="nav flex-column align-items-stretch mb-auto ml-4">
        @auth()
            <div class="d-flex flex-column py-5 px-0 ">
                <li class="nav-item">
                    <a href="/owner" class="nav-link text-white {{ Request::is('owner') ? 'active' : '' }}" aria-current="page">
                        <i class="bi bi-house-door"></i>  Home</a>
                </li>
            </div>
            <div class="d-flex flex-column">
                <li class="nav-item"><a  href="/owner/items" class=" nav-link text-white {{ Request::is('owner/items*') ? 'active' : '' }}">
                        <i class="bi bi-journal-text"></i>  Data Barang</a>
                </li>

                <li class="nav-item"><a href="#" class="nav-link text-white {{ Request::is('owner/sales*') ? 'active' : '' }}">
                        <i class="bi bi-folder2"></i>  Data Penjualan</a>
                </li>

                <li class="nav-item">
                    <button class="nav-link border-0 text-white {{ Request::is('owner/rekap*') ? 'active' : '' }}" type="" data-bs-toggle="collapse" data-bs-target="#dataRekap">
                        <i class="bi bi-server"></i> Data Rekap</button>
                    <div class="collapse" id="dataRekap">
                        <ul>
                            <li><a href="#" class="nav-link text-white">Rekap Barang</a></li>
                            <li><a href="#" class="nav-link text-white">Rekap Penjualan</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-white {{ Request::is('owner/prediction') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-bar-graph"></i>  Prediksi</a>
                </li>
            </div>
        @endauth

        <div class="d-flex flex-column position-absolute bottom-0 start-0 ">
            @auth()
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link border-0 text-white" aria-current="page">
                            <i class="bi bi-box-arrow-right"></i>  Logout
                        </button>
                    </form>
                </li>
            @endauth
        </div>
    </ul>
</nav>

