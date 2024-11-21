@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}"> --}}
@endpush

@section('main')
    <div id="main-content">
        <div class="page-heading">
            @if (Auth::user())
                <h3>Dashboard Statistik</h3>
            @else
                <h3>{{ $mapel->name }}</h3>
                <h3>Semester {{ $semester }}</h3>
            @endif
        </div>
        <div class="page-content">
            <section class="row">

                <div class="col-12">
                    <div class="row">
                        @foreach ($materis as $materi)
                            <div class="col-12 col-lg-3 col-md-6">
                                {{-- <a href="{{ route('detailMapelSemester', [$mapel, $materi]) }}"> --}}
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h6 class="text-muted font-semibold fw-bold">Pertemuan {{ $materi->pertemuan }}</h6>
                                    </div>
                                    <div class="embed-responsive embed-responsive-item embed-responsive-16by9 w-100">
                                        <iframe src="{{ $materi->link_youtube }}" style="width:100%" height="300"
                                            allowfullscreen></iframe>

                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{ $materi->materi }}
                                        </p>
                                        <a href="{{ asset('materi/' . $materi->file_materi) }}" class="card-link">Download
                                            Materi</a>
                                    </div>
                                </div>
                                {{-- </a> --}}
                            </div>
                        @endforeach
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script> --}}


    <!-- Page Specific JS File -->
@endpush
