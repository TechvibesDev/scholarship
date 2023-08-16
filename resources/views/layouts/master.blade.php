<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield ('sub_title') | {{ config('app.name', 'Automated scholarship processing system') }}</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    @yield('header')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body class="g-sidenav-show  bg-gray-100">
   @yield('Sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      @yield('topNav')
        <div class="container-fluid py-4" style="min-height: 500px">
            @yield('content')
            
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
              <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                  <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                      document.write(new Date().getFullYear())
                    </script>,
                   By Name
                  </div>
                </div>
              </div>
            </div>
          </footer>
    </main>
    <!--   Core JS Files   -->
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
    <script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
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
