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
                            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Hasil
                                Algoritma PAM.
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
                            <div class="d-flex justify-content-between">
                                <h5>Data Hasil Algoritma PAM</h5>
                                <a href="{{ route('export.pam') }}" class="btn btn-success">
                                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Wisatawan</th>
                                            <th class="text-center">Jumlah Pengunjung</th>
                                            <th>Aktivitas</th>
                                            <th class="text-center">Cluster</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clusters as $clusterId => $cluster)
                                            @foreach ($cluster as $sampleIndex)
                                                <tr>
                                                    {{-- <td class="text-center">{{ $loop->parent->iteration }}</td> --}}
                                                    <td class="text-center"> {{ $samples[$sampleIndex]['nama'] }}</td>
                                                    <td class="text-center">
                                                        {{ $samples[$sampleIndex]['jumlah_pengunjung'] }}</td>
                                                    <td>{{ $samples[$sampleIndex]['activity_nama'] }}</td>
                                                    <td class="text-center">{{ $clusterId + 1 }}</td>
                                                    <!-- Menampilkan cluster yang sesuai -->
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
