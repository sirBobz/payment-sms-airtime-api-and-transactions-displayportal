<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Plug and play into possibilities with Statum Company Ltd's Simple, Powerful Payment APIs, Airtime API, USSD APIs and SMS APIs." />
    <meta name="author" content="Bob Mwenda Murithi - Statum Company Ltd">

    <link rel="icon" href="https://www.statum.co.ke/assets/img/statumIco.ico" type="image/ico" />

    <title>{{ Auth::user()->organization->name }}</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/coreui.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />


    @yield('styles')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <header class="app-header navbar" style="background-color: #5D71BC">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show"
            style="color:white;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-none d-md-block">
            <a class="navbar-brand" href="{{ url('') }}">
                <img alt="statum logo" src="https://www.statum.co.ke/assets/img/logo.svg" width="110" height="80">
            </a>
        </div>

        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style="padding-bottom:10px;">
            <span style="text-align:center;color:white;">Account balance {{ $available_balance }}</span>
        </div>


        <ul class="nav navbar-nav ml-auto">

        </ul>

    </header>

    <div class="app-body">
        @include('partials.menu')
        <main class="main">


            <div style="padding-top: 1px" class="container-fluid">
                @if (session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-danger" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if ($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
                <p class="copyright-text text-center" style="text-transform:capitalize;">
                    Copyright © {{ date('Y') }} &nbsp; <a href="https://statum.co.ke" target=" _blank"> Statum Ltd</a> &nbsp; Version {{ config('app.app_version') }}
                </p>
            </div>
        </main>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutFormModal" tabindex="-1" role="dialog" aria-labelledby="LogOutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="LogOutModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{ asset('js/coreui.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/fontAwesomeKit.js') }}"></script>
    @yield('scripts')
    @include('sweetalert::alert')
</body>

</html>
