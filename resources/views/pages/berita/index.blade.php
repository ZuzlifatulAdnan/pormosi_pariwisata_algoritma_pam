@extends('layouts.app')

@section('title', 'Berita')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endpush

@section('main')
    @if (Auth::user())
        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Berita</h3>
                            <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi Berita.
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
                                <a href="{{ route('beritas.create') }}">
                                    <button class="btn btn-primary">Tambah Berita</button>
                                </a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th class="text-center">Foto</th>
                                            <th>kategori</th>
                                            <th>Judul</th>
                                            <th>Dibuat</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($beritas as $berita)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    <img alt="image"
                                                        src="{{ $berita->image ? asset('img/berita/' . $berita->image) : asset('assets/compiled/jpg/2.jpg') }}"
                                                        class="rounded-circle" width="35" height="35"
                                                        data-toggle="tooltip">
                                                </td>
                                                <td>{{ $berita->kategori_berita->nama }}</td>
                                                <td>{{ $berita->judul }}</td>
                                                <td>{{ $berita->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('beritas.edit', $berita) }}"
                                                            class="btn btn-sm btn-icon btn-success m-1"><i
                                                                class="fas fa-edit"></i></a>
                                                        <form action="{{ route('beritas.destroy', $berita) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger btn-icon m-1">
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
                <h3>Berita</h3>
            </div>

            <div class="page-content">
                <!-- Search Bar -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('berita.index') }}" method="GET"
                                    class="d-flex align-items-center">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari berita..." value="{{ request('search') }}">

                                        <select name="kategori_berita_id" class="form-select" onchange="this.form.submit()">
                                            <option value="" {{ request('kategori') == '' ? 'selected' : '' }}>Semua
                                                Kategori</option>
                                            @foreach ($kategori_berita as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-search"></i> Cari
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Card Berita -->
                    <div class="row justify-content-center g-4">
                        @forelse ($beritas as $berita)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        @if ($berita->image)
                                            <img src="{{ asset('img/berita/' . $berita->image) }}"
                                                alt="{{ $berita->judul }}" class="img-fluid w-100"
                                                style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="text-center py-5 bg-light" style="height: 200px;">No Image
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $berita->judul }}</h5>
                                            <!-- Tanggal dan Kategori -->
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar3"></i>
                                                    {{ $berita->created_at->format('d M Y') }}
                                                </small>
                                                <span
                                                    class="badge bg-warning text-dark">{{ $berita->kategori_berita->nama }}</span>
                                            </div>
                                            <!-- Deskripsi -->
                                            <div class="card-text mt-2" style="max-height: 100px; overflow: hidden;">
                                                {!! Str::limit($berita->deskripsi, 200) !!} <!-- Render HTML deskripsi -->
                                            </div>
                                            <a href="{{ route('berita.show', $berita->id) }}"
                                                class="btn btn-primary w-100 mt-3">Baca Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning text-center">
                                    <i class="bi bi-exclamation-circle"></i> Tidak ada berita ditemukan.
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $beritas->links('pagination::bootstrap-4') }}
                    </div>
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


    <!-- Page Specific JS File -->
@endpush
