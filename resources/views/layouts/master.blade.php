<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ORGM</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl-corousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            display: none;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rated:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
        .star-rating-complete{
            color: #c59b08;
        }
        .rating-container .form-control:hover, .rating-container .form-control:focus{
            background: #fff;
            border: 1px solid #ced4da;
        }
        .rating-container textarea:focus, .rating-container input:focus {
            color: #000;
        }
        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rated:not(:checked) > input {
            position:absolute;
            display: none;
        }
        .rated:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ffc700;
        }
        .rated:not(:checked) > label:before {
            content: '★ ';
        }
        .rated > input:checked ~ label {
            color: #ffc700;
        }
        .rated:not(:checked) > label:hover,
        .rated:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rated > input:checked + label:hover,
        .rated > input:checked + label:hover ~ label,
        .rated > input:checked ~ label:hover,
        .rated > input:checked ~ label:hover ~ label,
        .rated > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>
    @livewireStyles
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    @yield('body')


</div>
@yield('modals')
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-corousel.js') }}"></script>
<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.init.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script>
    $(function () {
        //
        // Carousel
        //
        $(".collectibles-carousel").owlCarousel({
            loop: false,
            margin: 30,
            mouseDrag: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 2000,
            nav: false,
            dots: false,
            rtl: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1268: {
                    items: 4,
                },

            },
        });
    });
</script>
@livewireScripts
<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{{--<x-livewire-alert::scripts />--}}
<x-livewire-alert::flash />
@yield('scripts')
</body>

</html>
