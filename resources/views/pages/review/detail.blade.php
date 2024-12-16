@extends('layouts.app')

@section('title', 'Detail Review')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/card.css') }}">
@endpush

@section('main')
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Review</h3>
                    <p class="text-subtitle text-muted">Informasi lengkap mengenai review ini.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first text-end">
                    <a href="{{ route('review.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Review</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <h6>Nama</h6>
                                    <p>{{ $review->nama }}</p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h6>Jumlah Pengunjung</h6>
                                    <p>{{ $review->jumlah_pengunjung }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <h6>Asal Pengunjung</h6>
                                    <p>{{ $review->asal_pengunjung }}</p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h6>Aktivitas</h6>
                                    <p>{{ $review->activity->nama }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <h6>Review Pengunjung</h6>
                                    <p>{{ $review->review_pengunjung }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        // Tambahkan script jika diperlukan
    </script>
@endpush
