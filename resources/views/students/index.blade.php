@extends('layouts.master')
@section('topNav')
    @include('layouts.partials.topNav', ['page' => 'Dashboard', 'title' => 'Profile'])
@endsection
@section('Sidebar')
    @include('layouts.partials.aside', ['active' => 'dashboard'])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header min-height-150 border-radius-xl mt-4 bg-white" style=" background-position-y: 50%;">
            <div class="d-flex gap-4 px-4">
                <div class="col-auto my-auto d-flex flex-column">
                    @if ($data->image)
                        @php
                            $image = asset('profile/' . $data->image);
                        @endphp
                        <img class="avatar avatar-xl" src="{{ $image}}" />
                    @else
                    <img class="avatar avatar-xl" src="{{ asset('img/team-2.jpg') }}" />
                    @endif

                </div>
                <div class="col-auto my-auto d-flex flex-column">
                    <div class="h-100">
                        <p class="mb-0 font-weight-bold text-sm">
                            Fullname
                        </p>
                        <h5 class="mb-0">
                            {{ $data->name }}
                        </h5>
                    </div>
                    <div class="h-100">
                        <p class="mb-0 font-weight-bold text-sm">
                            Gender
                        </p>
                        <h5 class="mb-0">
                            {{ $data->gender }}
                        </h5>
                    </div>
                </div>
                <div class="col-auto my-auto d-flex flex-column">
                    <div class="h-100">
                        <p class="mb-0 font-weight-bold text-sm">
                            Email
                        </p>
                        <h5 class="mb-0">
                            {{ $data->email }}
                        </h5>
                    </div>
                    <div class="h-100">
                        <p class="mb-0 font-weight-bold text-sm">
                            Phone number
                        </p>
                        <h5 class="mb-0">
                            {{ $data->phone }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-12 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header">
                        <h5>Update details</h5>
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
                        <form role="form" class="row" enctype="multipart/form-data" method="POST"
                            action="{{ route('home.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}" />
                            <div class="mb-3 col-6">
                                <input type="text" required class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ Request::old('name') ?? $data->name }}"
                                    placeholder="Fullname" aria-label="Fullname" aria-describedby="email-addon">
                            </div>
                            <div class="mb-3 col-6">
                                <select name="gender" required class="form-control @error('gender') is-invalid @enderror">

                                    @if (Request::old('gender') || $data->gender)
                                        <option selected value="{{ $data->gender ??Request::old('gender') }}">{{Request::old('gender') ??  $data->gender }}</option>
                                    @else
                                        <option value="">Gender</option>
                                    @endif
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <input type="date" required class="form-control @error('dob') is-invalid @enderror"
                                    name="dob" value="{{ Request::old('dob') ?? $data->dob }}"
                                    max="2007-01-02" placeholder="Date of Birth" aria-label="dob"
                                    aria-describedby="dob-addon">
                            </div>
                            <div class="mb-3 col-6">
                                <select name="lga" required class="form-control @error('lga') is-invalid @enderror">
                                    @if (Request::old('lga') || $data->lga)
                                        <option value="{{ $data->lga ?? Request::old('lga')}}">{{ $data->lga ??Request::old('lga') }}</option>
                                    @else
                                        <option value="">Local Government</option>
                                    @endif
                                    <option value="Ardo Kola">Ardo Kola</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Donga">Donga</option>
                                    <option value="Gashaka">Gashaka</option>
                                    <option value="Gassol">Gassol</option>
                                    <option value="Ibi">Ibi</option>
                                    <option value="Jalingo">Jalingo</option>
                                    <option value="Karim Lamido">Karim Lamido</option>
                                    <option value="Kurmi">Kurmi</option>
                                    <option value="Lau">Lau</option>
                                    <option value="Sardauna">Sardauna</option>
                                    <option value="Takum">Takum</option>
                                    <option value="Ussa">Ussa</option>
                                    <option value="Wukari">Wukari</option>
                                    <option value="Yorro">Yorro</option>
                                    <option value="Zing">Zing</option>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <input type="number" minlength="11" maxlength="11" min="1000000" max="10000000000"
                                    required class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ Request::old('phone') ?? $data->phone }}" placeholder="Phone"
                                    aria-label="Phone" aria-describedby="phone-addon">
                            </div>
                            <div class="mb-3 col-6">
                                <input type="email" readonly="true" required
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ Request::old('email') ?? $data->email }}" placeholder="Email"
                                    aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <div class="mb-3 col-6">
                                <input type="text" required class="form-control @error('school') is-invalid @enderror"
                                    name="school" value="{{ Request::old('school') ?? $data->school }}"
                                    placeholder="Current school name" aria-label="school"
                                    aria-describedby="school-addon">
                            </div>
                            <div class="mb-3 col-6">
                                <input type="file" required class="form-control @error('image') is-invalid @enderror"
                                    name="image" placeholder="Thumbnail" aria-label="Image"
                                    value={{ Request::old('image') }} aria-describedby="email-addon">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('sub_title')
    Profile
@endsection
@section('renderScript')
    <script></script>
@endsection
