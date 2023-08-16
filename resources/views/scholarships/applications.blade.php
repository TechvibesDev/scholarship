@extends('layouts.master')

@section('header')
    <link href="{{ asset('lib/summernote/summernote.css') }}" rel="stylesheet" />
@endsection
@section('topNav')
    @include('layouts.partials.topNav', ['page' => 'Scholarship', 'title' => 'Applications'])
@endsection
@section('Sidebar')
    @include('layouts.partials.aside', ['active' => 'applications'])
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header pt-4">
                        <h5>Applications</h5>
                    </div>
                    <div class="card-body">
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
                        @if (auth()->user()->role == '200')
                            <div class=" p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Scholarship</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Applied</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $res)
                                            @php
                                                $image = asset('uploads/' . $res->image);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ $image }}" class="avatar avatar-sm me-3"
                                                                alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            {{ $res->title }}
                                                        </div>
                                                    </div>
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
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $res->created_at }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Student</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Scholarship</th>
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
                                            <td
                                                style="width: 300px !important;display: -webkit-box !important;
                                            overflow: hidden !important;
                                            -webkit-box-orient: vertical !important;
                                            -webkit-line-clamp: 2 !important;
                                        ">
                                                {{ $res->title }}
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
                                                        class="text-primary font-weight-bold text-xs" data-toggle="tooltip"
                                                        data-original-title="Edit user">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('sub_title')
        Applications
    @endsection
    @section('renderScript')
    @endsection
