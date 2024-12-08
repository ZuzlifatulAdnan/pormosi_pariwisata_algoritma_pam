@extends('layouts.app')

@section('title', 'Foto')

@push('style')
    <style>
        /* Menyesuaikan modal untuk tampilan responsif di dashboard Mazer */
        .modal-dialog {
            max-width: 90%;
            width: 100%;
            height: auto;
        }

        .modal-body {
            max-height: 75vh;
            /* Batas tinggi modal */
            overflow-y: auto;
            /* Scroll vertikal jika konten melebihi */
            overflow-x: auto;
            /* Scroll horizontal jika konten melebihi */
        }

        /* Tambahkan sedikit gaya agar gambar dan teks lebih rapi */
        .modal-body img {
            max-width: 100%;
            /* Pastikan gambar responsif */
            height: auto;
        }
    </style>
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <h3>Foto</h3>
        </div>
        <!-- Card Utama -->
        <div class="card">
            <div class="card-body">
                <!-- Form Pencarian -->
                <form action="{{ route('galeri.foto') }}" method="GET" class="form-inline mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukan Nama Foto" name="judul">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Grid Foto -->
        @if ($foto->isEmpty())
            <p class="text-center">Tidak ada data foto tersedia.</p>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center g-4">
                @foreach ($foto as $item)
                    <div class="col">
                        <div class="card ">
                            <button class="btn p-0" data-bs-toggle="modal" data-bs-target="#fotoModal{{ $item->id }}">
                                <img src="{{ asset('img/galeri/' . $item->image) }}" class="card-img-top img-fluid"
                                    alt="{{ $item->nama }}" style="height: 300px; width: 300px; object-fit: cover;">
                            </button>
                            <figcaption class="bg-primary text-white mt-2 py-2 rounded text-center">
                                {{ $item->nama }}
                            </figcaption>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="fotoModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $item->id }}">{{ $item->nama }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('img/galeri/' . $item->image) }}" class="img-fluid w-100"
                                        alt="{{ $item->nama }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $foto->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Tambahkan script jika diperlukan -->
@endpush
