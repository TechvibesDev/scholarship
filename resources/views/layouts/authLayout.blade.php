<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Automated scholarship processing system') }} | @yield ('sub_title')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js')"></script>
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/alertify.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="~/favicon.png" />
    <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
<style>
    .ajs-success,.ajs-error{
  color: #fff !important;
}
</style>
</head>

<body>
    <main class="main-content mt-0">
        @yield('content')
    </main>
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">Copyright {{ date('Y') }} by Suenos Softwares.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    <script src="{{ asset('js/alertify.js') }}"></script>
    <script>
        // Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
        // for details on configuring this project to bundle and minify static web assets.

        // Write your JavaScript code.
        function httpPost(url, data) {
            return new Promise(async (r) => {
                fetch(url, {
                    method: 'POST',
                    headers: {
                        // "Content-Type": "application/json",
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        // "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: data
                }).then(res => {
                    r(res.json());
                }).catch(err => {
                    r({
                        status: 203,
                        message: 'Error:: Unable to completed the request at this time try again later',
                        data: []
                    });
                });
            });
        }
    </script>
    @yield('renderScript')
</body>

</html>
