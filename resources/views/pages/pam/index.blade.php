@extends('layouts.app')

@section('title', 'Hasil PAM')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endpush

@section('main')
    @if (Auth::user())
        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Hasil Algoritma PAM</h3>
                            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Hasil Algoritma PAM.
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            {{-- <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">DataTable jQuery</li>
                            </ol>
                        </nav> --}}
                        </div>
                    </div>
                    @include('layouts.alert')
                </div>

                <!-- Basic Tables start -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h5 class="card-title">
                                <a href="{{ route('reviews.create') }}">
                                    <button class="btn btn-primary">Tambah Review</button>
                                </a>
                            </h5> --}}
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>

                </section>
                <!-- Basic Tables end -->

            </div>
        </div>
    @else

    @endif
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>

    
@endpush
