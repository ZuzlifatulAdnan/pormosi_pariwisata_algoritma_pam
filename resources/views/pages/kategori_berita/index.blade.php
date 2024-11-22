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
            @endif
        </div>
        <div class="page-content">
            <section class="row">

                <div class="col-12">
                    <div class="row">
                        @foreach ($materis as $materi)
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="{{ route('detailMapelSemester', [$mapel, $materi]) }}">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                                    <div class="stats-icon purple mb-3">
                                                        <i class="fa-brands fa-leanpub"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Semester</h6>
                                                    <h6 class="text-muted font-semibold">{{ $materi }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
