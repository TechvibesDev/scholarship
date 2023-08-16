@extends('layouts.master')
@section('topNav')
    @include('layouts.partials.topNav', ['page' => 'Scholarship', 'title' => 'View Scholarships'])
@endsection
@section('Sidebar')
    @include('layouts.partials.aside', ['active' => 'scholarship'])
@endsection
@section('content')
    @if (auth()->user()->role == '100')
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('scholarships.create') }}" class="btn btn-primary">Add New Scholarship</a>
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-12 mt-4">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-1">Scholarships</h6>
                    <p class="text-sm">All added scholarships</p>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        @foreach ($list as $res)
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            @php
                                                $image = asset('uploads/' . $res->image);
                                            @endphp
                                            <img src={{ $image }} alt="img-blur-shadow"
                                                class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pb-0">
                                        {{-- <p class="text-gradient text-dark mb-2 text-sm">Project #2</p> --}}
                                        <a href="javascript:;">
                                            <h5
                                                style="display: -webkit-box !important;
                                            overflow: hidden !important;
                                            -webkit-box-orient: vertical !important;
                                            -webkit-line-clamp: 2 !important;
                                        ">
                                                {{ $res->title }}
                                            </h5>
                                        </a>
                                        <div style="max-height: 150px !important; overflow:hidden">
                                            <p class="mb-4 text-sm">
                                                {!! $res->description !!}
                                            </p>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <a role="button" href="{{ route('scholarships.details', ['id' => $res->id]) }}"
                                                class="btn btn-outline-primary btn-sm mb-0">View
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('sub_title')
    Scholarships
@endsection
@section('renderScript')
    <script></script>
@endsection
