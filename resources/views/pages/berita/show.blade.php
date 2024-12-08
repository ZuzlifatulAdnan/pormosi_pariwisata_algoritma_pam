@extends('layouts.app')

@section('title', 'Berita')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <h3>Detail Berita</h3>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>{{ $berita->judul }}</h4>
                            <p class="text-muted">
                                <i class="bi bi-calendar3"></i> {{ $berita->created_at->format('d M Y') }} |
                                <span class="badge bg-primary">{{ $berita->kategori_berita->nama }}</span>
                            </p>
                        </div>
                        <div class="card-body">
                            @if ($berita->image)
                                <img src="{{ asset('img/berita/' . $berita->image) }}" alt="{{ $berita->judul }}"
                                    class="img-fluid rounded w-100 mb-4" style="height: 300px; object-fit: cover;">
                            @else
                                <div class="bg-light text-center py-5 mb-4" style="height: 300px;">
                                    <i class="bi bi-image" style="font-size: 3rem; color: gray;"></i>
                                    <p class="text-muted mt-2">No Image Available</p>
                                </div>
                            @endif

                            <div class="content">
                                {!! $berita->deskripsi !!}
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            @if (Auth::user())
                                <a href="{{ route('beritas.index') }}" class="btn btn-warning">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
                                </a>
                            @else
                                <a href="{{ route('berita.index') }}" class="btn btn-warning">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>


    <!-- Page Specific JS File -->
@endpush
