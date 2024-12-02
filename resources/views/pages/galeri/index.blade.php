@extends('layouts.app')

@section('title', 'Galeri')

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
                            <h3>Galeri</h3>
                            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Galeri.</p>
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
                            <h5 class="card-title">
                                <a href="{{ route('galeris.create') }}">
                                    <button class="btn btn-primary">Tambah Galeri</button>
                                </a>
                            </h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Type</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galeris as $galeri)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $galeri->nama }}</td>
                                                <td>{{ $galeri->type }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('galeris.edit', $galeri) }}"
                                                            class="btn btn-sm btn-icon btn-success m-1"><i
                                                                class="fas fa-edit"></i></a>
                                                        <form action="{{ route('galeris.destroy', $galeri) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger btn-icon m-1">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Tables end -->
                </section>
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


    <!-- Page Specific JS File -->
@endpush
