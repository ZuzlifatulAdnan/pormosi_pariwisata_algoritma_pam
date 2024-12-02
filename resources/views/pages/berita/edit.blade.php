@extends('layouts.app')

@section('title', 'Berita')

@push('style')
    <!-- Bootstrap 4 dan Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Berita</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Berita.</p>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('beritas.update', $berita) }}" method="POST"
                                    enctype="multipart/form-data">
                                    
                                    @method('PATCH') <!-- Jika Anda menggunakan PATCH untuk update -->
                                    @csrf
                                    <!-- Input Kategori -->
                                    <div class="form-group">
                                        <label for="kategori_id" class="form-label">Kategori Berita</label>
                                        <select name="kategori_berita_id" id="kategori_id"
                                            class="form-control @error('kategori_berita_id') is-invalid @enderror" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($kategoriBerita as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    {{ $berita->kategori_berita_id == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_berita_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Judul -->
                                    <div class="form-group">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" name="judul" id="judul"
                                            class="form-control @error('judul') is-invalid @enderror"
                                            value="{{ old('judul', $berita->judul) }}" placeholder="Masukkan Judul Berita"
                                            required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Deskripsi dengan Summernote -->
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea id="summernote" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Gambar -->
                                    <div class="form-group">
                                        <label for="image">Gambar</label><br>
                                        <img id="imagePreview"
                                            src="{{ $berita->image ? asset('img/berita/' . $berita->image) : asset('assets/compiled/jpg/2.jpg') }}"
                                            class="form-image mb-3" width="100" height="100" alt="Image Preview">
                                        <input type="file" name="image" id="image"
                                            class="form-control @error('image') is-invalid @enderror" accept="image/*"
                                            onchange="previewImage(event)">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tombol Simpan -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
    <!-- JQuery, Bootstrap 4, dan Summernote JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        // Preview Gambar
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('imagePreview').src = reader.result; // Update preview image
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Inisialisasi Summernote
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300, // Tinggi editor
                placeholder: 'Masukkan deskripsi di sini...',
                tabsize: 2,
                toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ]
            });
        });
    </script>
@endpush
