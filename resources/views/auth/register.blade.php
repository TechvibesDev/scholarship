@extends('layouts.authLayout')
@section('content')
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Sign Up</h3>
                                <p class="mb-0">Fill the form below</p>
                            </div>
                            <div class="card-body">
                                <form id="form" role="form" method="post">
                                    <label>Fullname</label>
                                    <div class="mb-3">
                                        <input type="text" required name="name" class="form-control"
                                            placeholder="name" aria-label="name" aria-describedby="name-addon">
                                    </div>
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" required name="email" class="form-control"
                                            placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" required name="password" class="form-control"
                                            placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <label>Confirm Password</label>
                                    <div class="mb-3">
                                        <input type="password" required name="password_confirmation" class="form-control"
                                            placeholder="Password" aria-label="password_confirmation"
                                            aria-describedby="password_confirmation-addon">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Already have an account?
                                    <a href="{{ route('auth.login') }}"
                                        class="text-info text-gradient font-weight-bold">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url({{ asset('img/bg/tsb.jpg') }})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('sub_title')
    Register
@endsection
@section('renderScript')
    <script>
        document.getElementById("form").addEventListener("submit", async function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("form"));
            const res = await httpPost("{{ route('auth.register') }}", formData);
            if (res.status == 200) {
                alertify.success(res.message);
                setTimeout(() => {
                    window.location.replace("{{ route('auth.login') }}");
                }, 1500);

            } else {
                alertify.error(res.message);
            }
        });
    </script>
@endsection
