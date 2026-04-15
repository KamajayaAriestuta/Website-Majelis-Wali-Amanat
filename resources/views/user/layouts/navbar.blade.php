<div class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="/about" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">Tentang</a>
                    <a href="/anggota_mwa" class="nav-item nav-link {{ request()->is('anggota_mwa') ? 'active' : '' }}">Anggota MWA</a>
                    <a href="/anggota_ka" class="nav-item nav-link {{ request()->is('anggota_ka') ? 'active' : '' }}">Anggota KA</a>
                    <a href="/kegiatan" class="nav-item nav-link {{ request()->is('kegiatan') ? 'active' : '' }}">Kegiatan</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->is('produk_hukum') ? 'active' : '' }}" data-toggle="dropdown">Produk Hukum</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('user.peraturan') }}" class="dropdown-item">Peraturan</a>
                            <a href="{{ route('user.keputusan') }}" class="dropdown-item">Keputusan</a>
                        </div>
                    </div>
                    <a href="{{ route('user.kontak') }}" class="nav-item nav-link {{ request()->is('kontak') ? 'active' : '' }}">Kontak</a>
                </div>
                <div class="ml-auto">
                    <a class="btn" href="/login">Masuk sebagai Admin</a>
                </div>
            </div>
        </nav>
    </div>
</div>