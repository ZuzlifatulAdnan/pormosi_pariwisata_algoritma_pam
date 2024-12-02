@extends('layouts.app')

@section('title', 'Beranda')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}"> --}}
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            @if (Auth::user())
                <h3>Dashboard Statistik</h3>
            @else
                <h3>Aplikasi Pembelajran Sejarah</h3>
            @endif
        </div>
        <div class="page-content">
            <section class="row">
                @if (Auth::user())
                <div class="col-12">
                    <div class="row">
                        <!-- Total User -->
                        <div class="col-6 col-lg-3 col-md-6">
                            <a href="{{ route('user.index') }}">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="fa-solid fa-users"></i> <!-- Ikon untuk User -->
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total User</h6>
                                                <h6 class="font-extrabold mb-0">{{$users->count()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Total Berita -->
                        <div class="col-6 col-lg-3 col-md-6">
                            <a href="{{ route('beritas.index') }}">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="fa-solid fa-newspaper"></i> <!-- Ikon Berita -->
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Berita</h6>
                                                <h6 class="font-extrabold mb-0">{{$beritas->count()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Total Foto di Galeri -->
                        <div class="col-6 col-lg-3 col-md-6">
                            <a href="{{ route('galeris.index') }}">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon green mb-2">
                                                    <i class="fa-solid fa-images"></i> <!-- Ikon Foto -->
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Foto di Galeri</h6>
                                                <h6 class="font-extrabold mb-0">{{$fotos->count()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Total Video di Galeri -->
                        <div class="col-6 col-lg-3 col-md-6">
                            <a href="{{ route('galeris.index') }}">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon red mb-2">
                                                    <i class="fa-solid fa-video"></i> <!-- Ikon Video -->
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Video di Galeri</h6>
                                                <h6 class="font-extrabold mb-0">{{$vidios->count()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Total Review -->
                        <div class="col-6 col-lg-3 col-md-6">
                            <a href="{{ route('reviews.index') }}">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="fa-solid fa-comment"></i> <!-- Ikon Review -->
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Review</h6>
                                                <h6 class="font-extrabold mb-0">{{$reviews->count()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-12">
                        <div class="row">
                            {{-- @foreach ($mapels as $mapel)
                                <div class="col-6 col-lg-3 col-md-6">
                                    <a href="{{ route('detailMapel', $mapel) }}">
                                        <div class="card">
                                            <div class="card-body px-4 py-4-5">
                                                <div class="row">
                                                    <div
                                                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                                        <div class="stats-icon purple mb-3">
                                                            <i class="fa-brands fa-leanpub"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                        <h6 class="text-muted font-semibold">{{ $mapel->name }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach --}}
                        </div>
                    </div>
                @endif

            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script> --}}


    <!-- Page Specific JS File -->
@endpush
