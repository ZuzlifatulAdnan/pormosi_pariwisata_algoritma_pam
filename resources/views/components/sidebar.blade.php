<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="img-fluid"
                            style="max-width: 100%; height: auto; /* Adjust size here */">
                    </a>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>
        @if (Auth::user())
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item {{ $type_menu == 'beranda' ? 'active' : '' }}">
                        <a href="{{ route('berandas.index') }}" class='sidebar-link'>
                            <i class="bi bi-house-door-fill"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ $type_menu == 'user' ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}" class='sidebar-link'>
                            <i class="bi bi-person-lines-fill"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ $type_menu == 'galeri' ? 'active' : '' }}">
                        <a href="{{ route('galeris.index') }}" class='sidebar-link'>
                            <i class="bi bi-image-fill"></i>
                            <span>Galeri</span>
                        </a>
                    </li>
                    <li class="sidebar-item  has-sub {{ $type_menu == 'berita' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-newspaper"></i>
                            <span>Berita</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::is('beritas') ? 'active' : '' }}">
                                <a href="{{ route('beritas.index') }}" class="submenu-link">Berita</a>
                            </li>
                            <li class="submenu-item {{ Request::is('kategori_berita') ? 'active' : '' }} ">
                                <a href="{{ route('kategori_berita.index') }}" class="submenu-link">Kategori Berita</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub {{ $type_menu == 'review' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-star-fill"></i>
                            <span>Review</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::is('activity') ? 'active' : '' }}">
                                <a href="{{ route('activity.index') }}" class="submenu-link">Activity</a>
                            </li>
                            <li class="submenu-item {{ Request::is('reviews') ? 'active' : '' }}">
                                <a href="{{ route('reviews.index') }}" class="submenu-link">Review</a>
                            </li>
                            <li class="submenu-item {{ Request::is('hasil-pam') ? 'active' : '' }} ">
                                <a href="{{ route('pam.index') }}" class="submenu-link">Hasil Algoritma PAM </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @else
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item {{ $type_menu == 'beranda' ? 'active' : '' }}">
                        <a href="{{ route('beranda.index') }}" class='sidebar-link'>
                            <i class="bi bi-house-door-fill"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ $type_menu == 'berita' ? 'active' : '' }}">
                        <a href="{{ route('berita.index') }}" class='sidebar-link'>
                            <i class="bi bi-newspaper"></i>
                            <span>Berita</span>
                        </a>
                    </li>
                    <li class="sidebar-item  has-sub {{ $type_menu == 'galeri' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-image-fill"></i>
                            <span>Galeri</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::is('foto') ? 'active' : '' }}">
                                <a href="{{ route('galeri.foto') }}" class="submenu-link">Foto</a>
                            </li>
                            <li class="submenu-item {{ Request::is('vidio') ? 'active' : '' }} ">
                                <a href="{{ route('galeri.vidio') }}" class="submenu-link">Video</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ $type_menu == 'review' ? 'active' : '' }}">
                        <a href="{{ route('review.input') }}" class='sidebar-link'>
                            <i class="bi bi-star-fill"></i>
                            <span>Review</span>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</div>
