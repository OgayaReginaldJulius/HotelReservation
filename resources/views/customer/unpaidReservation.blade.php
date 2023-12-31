<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn')
    {{-- CSS --}}
    <link href="{{ asset('/css/customerDashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sideBar.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/img/whitelogo.png') }}" type="image/x-icon">
    {{-- CSS --}}
    <title>Harbor View</title>
</head>

<body>

    <div class="d-flex" id="wrapper">
        {{-- SIDE NAV --}}
        @include('layouts.customerSidebar')
        {{-- SIDE NAV --}}

        {{-- MAIN CONTENT --}}
        <div id="page-content-wrapper">
            {{-- NAV BAR --}}
            <nav class="navbar navbar-expand-lg text-white border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-lg" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
                    <h4 class="ms-2 pt-2">UNPAID RESERVATION</h4>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li>
                                <a class="nav-link me-3">
                                    <span>{{ auth()->guard('userModel')->user()->firstname }}</span>
                                    <span>{{ auth()->guard('userModel')->user()->lastname }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- NAV BAR --}}

            {{-- MAIN CONTENT --}}
            <div class="container-fluid mainBar">
                <div class="row g-2" id="showUnpaidReservation"></div>
            </div>
            {{-- MAIN CONTENT --}}
        </div>
        {{-- END MAIN CONTENT --}}
    </div>

    {{-- JS --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            showUnpaidBookingPerUser();

            function showUnpaidBookingPerUser() {
                $.ajax({
                    url: "/getUnpaidBooking",
                    method: 'GET',
                    success: function(data) {
                        $("#showUnpaidReservation").html(data);
                    }
                })
            }
        });
    </script>

    <script src="{{ asset('/js/customer/reservation.js') }}"></script>
    <script src="{{ asset('/js/dateTime.js') }}"></script>
    <script src="{{ asset('/js/logout.js') }}"></script>
    {{-- END JS --}}
</body>

</html>
