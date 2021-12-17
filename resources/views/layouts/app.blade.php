@php

use Illuminate\Support\Facades\URL;

    $url = url('/');
    $cur = URL::current();
    $ex = explode($url,$cur);

@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/permit.png') }}" sizes="32x32" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Permit Search') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/permitsearch.css') }}" />
     <link rel="stylesheet" href="{{ asset('css/devCustom.css') }}" />
</head>

@if($ex[1] == '/dashboard/permit')
    @if(\Session::get('viewReportPopUp') == 'yes')
        <body>
    @else
        <body class="popup-open">
    @endif
@else
    <body>
@endif

@if($ex[1] == '/dashboard/permit' || $ex[1] == '/dashboard' || $ex[1] == '/dashboard/permit-requests' || $ex[1] == '/dashboard/permit/my-report' || $ex[1] == '/dashboard/permit/alert' || $ex[1] == '/dashboard/account' || $ex[1] == '/dashboard/account/subscription' || $ex[1] == '/dashboard/account/billing' || $ex[1] == '/dashboard/account/setting' || $ex[1] == '/dashboard/change-password')
    <!-- <div id="app"> -->
        <header id="header" class="table-header">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg px-5">
                    <a class="navbar-brand m-0 p-0" href="{{ url('/') }}">
                        <figure><img src="{{ asset('/images/logo.png') }}" alt="img-logo"> </figure>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a style="padding: 4px 1rem !important;" class="nav-link nav-link btn btn-effect" href="javascript::void(0);">Remaining credits <span id="creRemSpn">{{ \Session::get('usePermit') }}</span><span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard/permit/my-report') }}">My Reports</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Help</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                    <a class="dropdown-item" href="{{ url('/dashboard/account') }}">Profile</a>                               
                                    <a class="dropdown-item" href="{{ url('/dashboard/account/subscription') }}">Subscription</a>
                                    <a class="dropdown-item" href="{{ url('/dashboard/account/billing') }}">Billing History</a>
                                    <a class="dropdown-item" href="{{ url('/dashboard/permit-requests') }}">Permit Requests</a>
                                    <!-- <a class="dropdown-item" href="{{ url('/dashboard/change-password') }}">Change Password</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </header>

        <main class="py-4">
            <span id="successStatusMsg" style="text-align: center;">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif            
            </span>
            @yield('content')
        </main>

        <footer class="new-footer">
           <div class="container">
               <div class="row">
                   <div class="col-lg-7">
                    <div class="disclaimer-text">
                        Disclaimer: We can not guarantee that all permits are shown for every property.
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bottom-menu">
                        <ul>
                            <li><a href="{{ url('/terms-and-conditions') }}">Terms</a> </li>
                            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a> </li>
                            <li><a href="{{ url('/contact-us') }}">Contact</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- </div> -->

@else
    <header id="header" class="table-header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg px-5">
                <a class="navbar-brand m-0 p-0" href="{{ url('/') }}">
                    <figure><img src="{{ asset('/images/logo.png') }}" alt="img-logo"> </figure>
                </a>
            </nav>
        </div>
    </header>

    <main class="py-4">
        @yield('content')
    </main>
@endif
<!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<script type="text/javascript">
    var pricing_page_flag = false;
</script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bundle.min.js') }}"></script>
<script src="{{ asset('js/permitsearch.js') }}"></script>
<script src="{{ asset('js/customDev.js') }}"></script>

</body>
</html>
