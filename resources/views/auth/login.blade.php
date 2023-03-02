<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        Lelang | Login
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.4') }}" rel="stylesheet" />
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>

<body>
    <main class="main-content mt-0 bg-img min-vh-100">
        @include('sweetalert::alert')
        <section>
            <div class="page-header min-vh-75">
                <div class="container-stm">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-6 bg-light">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-center text-info text-gradient">Welcome</h3>
                                    <p class="mb-0 text-dark text-center fw-semibold">Enter your username and
                                        password to
                                        sign in
                                    </p>
                                </div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger" style="color: white">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success text-center col-11 rounded-pill"
                                            style="color: white">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form role="form" action="{{ route('actionLogin') }}" method="post">
                                        @csrf
                                        <label class="text-dark fw-bold" for="username">Username</label>
                                        <div class="mb-3">
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                name="username" id="username" placeholder="Username" autofocus
                                                value="{{ old('username') }}">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label class="text-dark fw-bold">Password</label>
                                        <div class="mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 @error('g-recaptcha-response') is-invalid @enderror"
                                                name="g-recaptcha-response"> {!! htmlFormSnippet() !!}
                                            </div>

                                            @error('g-recaptcha-response')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="/register" class="text-info text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
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
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.4') }}"></script>
</body>

</html>
