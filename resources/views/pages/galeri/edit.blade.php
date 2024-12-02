@extends('layouts.app')

@section('title', 'Galeri')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}"> --}}
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Galeri</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Galeri.</p>
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
                                <form action="{{ route('galeris.update', $galeri) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('Patch')
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama', $galeri->nama) }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Type -->
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="type" id="type"
                                            class="form-control @error('type') is-invalid @enderror"
                                            onchange="toggleInput()" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="Foto"
                                                {{ old('type', $galeri->type) === 'Foto' ? 'selected' : '' }}>Foto</option>
                                            <option value="Vidio"
                                                {{ old('type', $galeri->type) === 'Vidio' ? 'selected' : '' }}>Vidio
                                            </option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Khusus Foto -->
                                    <div class="form-group" id="uploadFoto"
                                        style="display: {{ old('type', $galeri->type) === 'Foto' ? 'block' : 'none' }};">
                                        <label for="image">Gambar</label><br>
                                        <img id="imagePreview"
                                            src="{{ $galeri->image ? asset('img/galeri/' . $galeri->image) : asset('assets/compiled/jpg/2.jpg') }}"
                                            class="form-image mb-3" width="100" height="100" alt="Image Preview">
                                        <input type="file" name="image" id="image"
                                            class="form-control @error('image') is-invalid @enderror" accept="image/*"
                                            onchange="previewImage(event)">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Khusus Vidio -->
                                    <div class="form-group" id="inputVidio"
                                        style="display: {{ old('type', $galeri->type) === 'Vidio' ? 'block' : 'none' }};">
                                        <label for="vidio">Key Vidio YouTube</label>
                                        <input type="text" name="vidio" id="vidio"
                                            class="form-control @error('vidio') is-invalid @enderror"
                                            value="{{ old('vidio', $galeri->vidio) }}"
                                            placeholder="Masukkan Key Vidio YouTube">
                                        @error('vidio')
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
    <!-- Page Specific JS File -->
    <script>
        function toggleInput() {
            const type = document.getElementById('type').value;
            const uploadFoto = document.getElementById('uploadFoto');
            const inputVidio = document.getElementById('inputVidio');

            if (type === 'Foto') {
                uploadFoto.style.display = 'block';
                inputVidio.style.display = 'none';
            } else if (type === 'Vidio') {
                uploadFoto.style.display = 'none';
                inputVidio.style.display = 'block';
            } else {
                uploadFoto.style.display = 'none';
                inputVidio.style.display = 'none';
            }
        }

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('imagePreview').src = reader.result; // Update the image preview
            };
            reader.readAsDataURL(event.target.files[0]); // Read the selected file as Data URL
        }
    </script>
@endpush
