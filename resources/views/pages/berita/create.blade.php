@extends('layouts.app')

@section('title', 'Berita')

@push('style')
    <link rel="stylesheet" href="assets/scss/pages/summernote.scss">
    <link rel="stylesheet" href="assets/extensions/summernote/summernote-lite.css">
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Tambah Berita</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat menambah informasi Berita.
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        {{-- <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav> --}}
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('berita.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="kategori_id" class="form-label">Kategori Berita</label>
                                        <select name="kategori_berita_id" id="kategori_id"
                                            class="form-control @error('kategori_id') is-invalid @enderror" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($kategoriBerita as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" name="judul" id="judul"
                                            class="form-control @error('judul') is-invalid

                                        @enderror"
                                            placeholder="Your Judul" required>
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Input Deskripsi dengan Summernote --}}
                                    <div class="form-group">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5"
                                            required></textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Gambar</label><br>
                                        <img id="imagePreview" src="{{ asset('assets/compiled/jpg/2.jpg') }}"
                                            class="form-image mb-3" width="100" height="100" alt="Image Preview">
                                        <input type="file" name="image" id="image"
                                            class="form-control @error('image') is-invalid @enderror" accept="image/*"
                                            onchange="previewImage(event)">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
    <!-- Summernote JS -->
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/extensions/summernote/summernote-lite.min.js"></script>
    <script src="assets/static/js/pages/summernote.js"></script>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('imagePreview').src = reader.result; // Update the image preview
            };
            reader.readAsDataURL(event.target.files[0]); // Read the selected file as Data URL
        }
        // Inisialisasi Summernote setelah DOM selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Summernote dengan toolbar standar
            $('#deskripsi').summernote({
                height: 200, // Set height editor
                placeholder: 'Tulis deskripsi berita di sini...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endpush
