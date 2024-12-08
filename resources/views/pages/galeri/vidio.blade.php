@extends('layouts.app')

@section('title', 'Video')

@push('style')
    <!-- Include Mazer CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/mazer.css') }}">
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            <h3>Vidio</h3>
        </div>

        <div class="page-content">
            <div class="card-body">
                <div class="row">
                    <!-- Video Display -->
                    <div class="col-lg-8 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    @foreach ($videos as $video)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="video{{ $video->id }}" role="tabpanel"
                                            aria-labelledby="video-tab{{ $video->id }}">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="https://www.youtube.com/embed/{{ $video->vidio }}"
                                                    allowfullscreen></iframe>
                                            </div>
                                            <p class="mt-3 text-center">{{ $video->nama }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video List -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('galeri.vidio') }}" method="GET" class="mb-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari Video" name="judul"
                                            value="{{ request('judul') }}">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <ul class="nav nav-pills flex-column" id="videoTabs" role="tablist">
                                    @foreach ($videos as $video)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                id="video-tab{{ $video->id }}" data-bs-toggle="tab"
                                                href="#video{{ $video->id }}" role="tab"
                                                aria-controls="video{{ $video->id }}"
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                <i class="bi bi-play-circle-fill"></i> {{ $video->nama }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="mt-4 d-flex justify-content-center">
                                    {{ $videos->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Include Bootstrap and Mazer JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/mazer.js') }}"></script>
@endpush
