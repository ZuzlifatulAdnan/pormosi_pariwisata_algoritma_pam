@extends('layouts.app')

@section('title', 'Galeri')

@push('style')
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Tambah Galeri</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat menambah informasi Galeri.</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('galeris.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="nama" id="name"
                                            class="form-control @error('name') is-invalid @enderror" required>
                                        @error('name')
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
                                            <option value="Foto">Foto</option>
                                            <option value="Vidio">Vidio</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Input Khusus Foto -->
                                    <div class="form-group" id="uploadFoto" style="display: none;">
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

                                    <!-- Input Khusus Vidio -->
                                    <div class="form-group" id="inputVidio" style="display: none;">
                                        <label for="vidio">Key Vidio YouTube</label>
                                        <input type="text" name="vidio" id="vidio"
                                            class="form-control @error('vidio') is-invalid @enderror"
                                            value="{{ old('vidio', $galeri->vidio ?? '') }}"
                                            placeholder="Masukkan Key Vidio YouTube"
                                            oninput="updateVideoPreview(this.value)">
                                        @error('vidio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <!-- Video Preview -->
                                        <div id="videoPreview" style="margin-top: 15px; display: none;">
                                            <iframe id="youtubeEmbed" width="560" height="315" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
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
        // Update video preview based on the entered key
        function updateVideoPreview(videoKey) {
            const videoPreview = document.getElementById('videoPreview');
            const youtubeEmbed = document.getElementById('youtubeEmbed');

            if (videoKey.trim() === '') {
                videoPreview.style.display = 'none';
                youtubeEmbed.src = '';
                return;
            }

            const embedUrl = `https://www.youtube.com/embed/${videoKey}`;
            youtubeEmbed.src = embedUrl;
            videoPreview.style.display = 'block';
        }
    </script>
@endpush
