@extends('layouts.app')

@section('title', 'Review')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Review</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengedit informasi Review.</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Add the PUT method to indicate updating -->
                                    
                                    <div class="row">
                                        <div class="form-group col-12 col-lg-6">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', $review->nama) }}" placeholder="Masukkan Nama Review" required>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-lg-6">
                                            <label for="jumlah_pengunjung" class="form-label">Jumlah Pengunjung</label>
                                            <input type="number" name="jumlah_pengunjung" id="jumlah_pengunjung"
                                                class="form-control @error('jumlah_pengunjung') is-invalid @enderror"
                                                value="{{ old('jumlah_pengunjung', $review->jumlah_pengunjung) }}" placeholder="Masukkan Jumlah Pengunjung" required>
                                            @error('jumlah_pengunjung')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12 col-lg-4">
                                            <label for="asal_pengunjung" class="form-label">Asal Pengunjung</label>
                                            <input type="text" name="asal_pengunjung" id="asal_pengunjung"
                                                class="form-control @error('asal_pengunjung') is-invalid @enderror"
                                                value="{{ old('asal_pengunjung', $review->asal_pengunjung) }}" placeholder="Contoh: Kota A, Kota B" required>
                                            @error('asal_pengunjung')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 col-lg-4">
                                            <label for="activity_id" class="form-label">Aktivitas</label>
                                            <select name="activity_id" id="activity_id"
                                                class="form-control @error('activity_id') is-invalid @enderror" required>
                                                <option value="" disabled>Pilih Aktivitas</option>
                                                @foreach ($activities as $activity)
                                                    <option value="{{ $activity->id }}" 
                                                        @selected($review->activity_id == $activity->id)>
                                                        {{ $activity->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('activity_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 col-lg-4">
                                            <label for="rating" class="form-label">Rating</label>
                                            <select name="nilai_review" id="rating"
                                                class="form-control @error('rating') is-invalid @enderror" required>
                                                <option value="" disabled>Pilih Rating</option>
                                                <option value="1" @selected($review->nilai_review == 1)>1 - Sangat Buruk</option>
                                                <option value="2" @selected($review->nilai_review == 2)>2 - Buruk</option>
                                                <option value="3" @selected($review->nilai_review == 3)>3 - Cukup</option>
                                                <option value="4" @selected($review->nilai_review == 4)>4 - Baik</option>
                                                <option value="5" @selected($review->nilai_review == 5)>5 - Sangat Baik</option>
                                            </select>
                                            @error('rating')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="review_pengunjung" class="form-label">Review Pengunjung</label>
                                            <textarea name="review_pengunjung" id="review_pengunjung"
                                                class="form-control @error('review_pengunjung') is-invalid @enderror" placeholder="Masukkan Review" required>{{ old('review_pengunjung', $review->review_pengunjung) }}</textarea>
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
