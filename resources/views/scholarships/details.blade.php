@extends('layouts.master')

@section('header')
    <link href="{{ asset('lib/summernote/summernote.css') }}" rel="stylesheet" />
@endsection
@section('topNav')
    @include('layouts.partials.topNav', ['page' => 'Scholarship', 'title' => 'Create Scholarship'])
@endsection
@section('Sidebar')
    @include('layouts.partials.aside', ['active' => 'scholarship'])
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto d-flex justify-content-end">
                <form action="{{ route('scholarships.Apply') }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to apply for this scholarship?')">
                    @csrf
                    <input type="hidden" name="userId" value="{{ auth()->user()->id }}" />
                    <input type="hidden" name="scholarshipId" value="{{ $data->id }}" />
                    <button type="submit" class="btn btn-primary">Apply</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card z-index-0 px-4">
                    @if (session('error'))
                        <div class="alert alert-danger text-white">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success text-white">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger text-white" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header pt-4">
                        <h5>{{ $data->title }}</h5>
                    </div>
                    <div class="position-relative">
                        <a class="d-block shadow-xl border-radius-xl">
                            @php
                                $image = asset('uploads/' . $data->image);
                            @endphp
                            <img src={{ $image }} alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="mb-4 text-sm">
                            {!! $data->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->role == '100')
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Applicants</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Student</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Gender</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                LGA</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Applied</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $res)
                                            @php
                                                $image = asset('profile/' . $res->profile);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ $image }}" class="avatar avatar-sm me-3"
                                                                alt="user4">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $res->name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $res->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $res->phone }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $res->gender }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $res->lga }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($res->status == 1)
                                                        <span class="badge badge-sm bg-gradient-success">Approved</span>
                                                    @endif
                                                    @if ($res->status == 2)
                                                        <span class="badge badge-sm bg-gradient-danger">Rejected</span>
                                                    @endif
                                                    @if ($res->status == 0)
                                                        <span class="badge badge-sm bg-gradient-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $res->created_at }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    @if ($res->status == 0)
                                                        <a href="{{ route('scholarships.approved', ['id' => $res->id]) }}"
                                                            onclick="return confirm('Are you sure you want to approve this application?')"
                                                            class="text-primary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Approve
                                                        </a>|
                                                        <a href="javascript:;" class="text-danger font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Reject
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('sub_title')
    Scholarship details
@endsection
@section('renderScript')
@endsection
