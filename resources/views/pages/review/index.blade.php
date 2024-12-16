@extends('layouts.app')

@section('title', 'Review')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endpush

@section('main')
    @if (Auth::user())
        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Review</h3>
                            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Review.
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
                            <h5 class="card-title">
                                <a href="{{ route('reviews.create') }}">
                                    <button class="btn btn-primary">Tambah Review</button>
                                </a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jumlah Pengunjung</th>
                                            <th class="text-center">Asal Pengunjung</th>
                                            <th class="text-center">Aktivitas</th>
                                            <th class="text-center">Review Pengunjung</th>
                                            <th class="text-center">Dibuat</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $review->nama }}</td>
                                                <td class="text-center">{{ $review->jumlah_pengunjung }}</td>
                                                <td>{{ Str::limit($review->asal_pengunjung, 25) }}</td>
                                                <td class="text-center">{{ $review->activity->nama }}</td>
                                                <td>{{ Str::limit($review->review_pengunjung, 20) }}</td>
                                                <td>{{ $review->created_at  }}</td>
                                                <td class="content-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('reviews.edit', $review) }}"
                                                            class="btn btn-sm btn-icon btn-success m-1"><i
                                                                class="fas fa-edit"></i></a>
                                                        <form action="{{ route('reviews.destroy', $review) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                class="btn btn-sm btn-danger btn-icon m-1 confirm-delete">
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

                </section>
                <!-- Basic Tables end -->

            </div>
        </div>
    @else
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Review</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Review.
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
                        <h5 class="card-title">
                            <a href="{{ route('review.input') }}">
                                <button class="btn btn-primary">Tambah Review</button>
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jumlah Pengunjung</th>
                                        <th class="text-center">Asal Pengunjung</th>
                                        <th class="text-center">Aktivitas</th>
                                        <th class="text-center">Review Pengunjung</th>
                                        <th class="text-center">Dibuat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $review->nama }}</td>
                                            <td class="text-center">{{ $review->jumlah_pengunjung }}</td>
                                            <td>{{ Str::limit($review->asal_pengunjung, 25) }}</td>
                                            <td class="text-center">{{ $review->activity->nama }}</td>
                                            <td>{{ Str::limit($review->review_pengunjung, 20) }}</td>
                                            <td>{{ $review->created_at  }}</td>
                                            <td class="content-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('review.show', $review) }}"
                                                        class="btn btn-sm btn-icon btn-info m-1"><i
                                                            class="fas fa-info"></i></a>
                                                </div>
                                            </td>
                                        </tr>
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
    @endif
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>
@endpush
