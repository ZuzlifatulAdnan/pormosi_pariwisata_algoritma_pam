@extends('layouts.app')

@section('title', 'Profile')

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
                        <h3>Profile</h3>
                        <p class="text-subtitle text-muted">Halaman tempat pengguna dapat mengubah informasi profil</p>
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
                @include('layouts.alert')
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="avatar avatar-2xl">
                                        <img src="{{ asset('assets/compiled/jpg/2.jpg') }}" alt="Avatar">
                                    </div>

                                    <h3 class="mt-3">{{ Auth::user()->name }}</h3>
                                    <p class="text-small">{{ ucfirst(Auth::user()->role) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('account.update', Auth::user()) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Your Name" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Your Email" value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Your Phone" value="083xxxxxxxxx">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        <input type="date" name="birthday" id="birthday" class="form-control"
                                            placeholder="Your Birthday">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
    {{-- <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> --}}


    {{-- <script src="{{ asset('assets/compiled/js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script> --}}


    <!-- Page Specific JS File -->
@endpush
