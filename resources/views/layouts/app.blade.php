<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Plug and play into possibilities with Statum Company Ltd's Simple, Powerful Payment APIs, Airtime API, USSD APIs and SMS APIs." />

    <meta name="author" content="Bob Mwenda Murithi - Statum Company Ltd">
    <link rel="icon" href="https://www.statum.co.ke/assets/img/statumIco.ico" type="image/ico" />

    <title>{{ config('app.name', 'Statum Company Ltd') }}</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset ('css/coreui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset ('css/main.css') }}" rel="stylesheet" />
</head>

<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">
<div class="app flex-row align-items-center">
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <img style="height: 40px !important;" src="{{ asset('img/logoBlack.png') }}" class="img-responsive" alt="statum">

        </div>
        <br>
        @yield("content")
    </div>
</div>
<footer>
    <p class="copyright-text text-center" style="text-transform:capitalize;">
        Copyright © {{ date('Y') }} &nbsp; Statum Ltd.&nbsp; &nbsp;
    </p>
</footer>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>

</body>

</html>
