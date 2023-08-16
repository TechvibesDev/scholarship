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
            <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header pt-4">
                        <h5>Create Scholarship</h5>
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
                        <form role="form text-left" enctype="multipart/form-data" method="POST"
                            action="{{ route('scholarships.store') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" required class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ Request::old('title') }}" placeholder="Title" aria-label="Title" aria-describedby="email-addon">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="description @error('description') is-invalid @enderror" required name="description" required>{{ Request::old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <input type="file" required class="form-control @error('image') is-invalid @enderror"
                                    name="image" placeholder="Thumbnail"
                                    aria-label="Image" value={{ Request::old('image') }} aria-describedby="email-addon">
                            </div>
                            <div class="form-check form-check-info text-left">
                                <input class="form-check-input" name="status" type="checkbox" value="1"
                                    id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Student can apply?</a>
                                </label>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a class="btn bg-gradient-white my-4 mb-2" role="button"
                                    href="{{ route('scholarships.index') }}">Cancel</a>
                                <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('sub_title')
        Dashboard
    @endsection
    @section('renderScript')
        <script src="{{ asset('lib/summernote/summernote.js') }}"></script>
        <script>
            jQuery(document).ready(function() {

                $('.description').summernote({
                    height: 240, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false // set focus to editable area after initializing summernote
                });
            });
        </script>
    @endsection
