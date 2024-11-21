@extends('layouts.app')

@section('title', 'Materi')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Materi</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Materi.
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
                                <form action="{{ route('materi.update', $materi) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12 col-lg-6">
                                            <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                                            <select class="choices form-select" name="mapel_id" id="mapel_id">
                                                @foreach ($mapels as $mapel)
                                                    <option value="{{ $mapel->id }}"
                                                        {{ $mapel->id == $materi->mapel_id ? 'selected' : '' }}>
                                                        {{ $mapel->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12 col-lg-6">
                                            <label for="judul_materi" class="form-label">Judul Materi</label>
                                            <input type="text" name="judul_materi" id="judul_materi"
                                                class="form-control @error('judul_materi') is-invalid

                                            @enderror"
                                                placeholder="Judul Materi" value="{{ $materi->materi }}" required>
                                            @error('judul_materi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12 col-lg-3">
                                            <label for="semester" class="form-label">Semester</label>
                                            <input type="number" name="semester" id="semester"
                                                class="form-control @error('semester') is-invalid

                                            @enderror"
                                                placeholder="Ex 1/2/3" value="{{ $materi->semester }}" required>
                                            @error('semester')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 col-lg-3">
                                            <label for="pertemuan" class="form-label">Pertemuan</label>
                                            <input type="number" name="pertemuan" id="pertemuan"
                                                class="form-control @error('pertemuan') is-invalid

                                            @enderror"
                                                placeholder="Ex 1/2/3" value="{{ $materi->pertemuan }}" required>
                                            @error('pertemuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 col-lg-3">
                                            <label for="link_youtube" class="form-label">Link Vidio</label>
                                            <input type="text" name="link_youtube" id="link_youtube"
                                                class="form-control @error('link_youtube') is-invalid

                                            @enderror"
                                                placeholder="" value="{{ $materi->link_youtube }}" required>
                                            @error('link_youtube')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 col-lg-3">
                                            <label for="file_materi" class="form-label">File Materi</label>
                                            <input type="file" name="file_materi" id="file_materi"
                                                class="form-control @error('file_materi') is-invalid

                                            @enderror"
                                                placeholder="">
                                            @error('file_materi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
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
    <!-- JS Libraies -->
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }}"></script>
    {{-- <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> --}}


    {{-- <script src="{{ asset('assets/compiled/js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script> --}}


    <!-- Page Specific JS File -->
@endpush
