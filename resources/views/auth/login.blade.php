@extends('layouts.authLayout')
@section('content')
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form id="form" role="form" method="post">
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
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="btnLogin" class="btn bg-lg bg-gradient-info w-100 mt-4 mb-0">
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="{{ route('auth.register') }}"
                                        class="text-info text-gradient font-weight-bold">Sign up</a>
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
    Login
@endsection
@section('renderScript')
    <script>
        document.getElementById("form").addEventListener("submit", async function(e) {
            e.preventDefault();
            var btn =  document.getElementById('btnLogin');
            btn.setAttribute("disabled", true);
            btn.innerHTML=`<img src="{{ asset('img/loader.svg') }}"/> Login`;
            
            var formData = new FormData(document.getElementById("form"));
            const res = await httpPost("{{ route('auth.login') }}", formData);
            if (res.status == 200) {
                alertify.success(res.message);
                setTimeout(() => {
                    window.location.replace(res.data);
                }, 1500);

            } else {
                btn.removeAttribute('disabled');
                btn.innerHTML=`Login`;
                alertify.error(res.message);
            }
        });
    </script>
@endsection
