@extends('layouts.app')

@section('title', 'Review')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                @include('layouts.alert')
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Tambah Review</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat menambah informasi Review.</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('review.stores') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12 col-lg-6">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukkan Nama Review" required>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-lg-6">
                                            <label for="jumlah_pengunjung" class="form-label">Jumlah Pengunjung</label>
                                            <input type="number" name="jumlah_pengunjung" id="jumlah_pengunjung"
                                                class="form-control @error('jumlah_pengunjung') is-invalid @enderror"
                                                placeholder="Masukkan Jumlah Pengunjung" required>
                                            @error('jumlah_pengunjung')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12 col-lg-6">
                                            <label for="asal_pengunjung" class="form-label">Asal Pengunjung</label>
                                            <input type="text" name="asal_pengunjung" id="asal_pengunjung"
                                                class="form-control @error('asal_pengunjung') is-invalid @enderror"
                                                placeholder="Contoh: Kota A, Kota B" required>
                                            @error('asal_pengunjung')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 col-lg-6">
                                            <label for="activity_id" class="form-label">Aktivitas</label>
                                            <select name="activity_id" id="activity_id"
                                                class="form-control @error('activity_id') is-invalid @enderror" required>
                                                <option value="" disabled selected>Pilih Aktivitas</option>
                                                @foreach ($activities as $activity)
                                                    <option value="{{ $activity->id }}">{{ $activity->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('activity_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="review_pengunjung" class="form-label">Review Pengunjung</label>
                                            <textarea name="review_pengunjung" id="review_pengunjung"
                                                class="form-control @error('review_pengunjung') is-invalid @enderror" placeholder="Masukkan Review" required></textarea>
                                            @error('review_pengunjung')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
@endpush
