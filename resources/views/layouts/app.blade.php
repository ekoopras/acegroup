<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Style Layout</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- PWA  -->
    <meta name="theme-color" content="#7633f9" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <style>
        body {
            background: #dfe8ef;
        }

        /* Wrapper agar desktop tampil seperti mobile */
        .mobile-wrapper {
            max-width: 430px;
            margin: 0 auto;
            min-height: 100vh;
            background: #e7f1f8;
            position: relative;
        }

        /* Header */
        .header-bg {
            background: #7633f9;
            color: white;
            padding: 40px 20px 80px;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }

        .header-profile {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.6);
            object-fit: cover;
        }

        /* Card floating */
        .card-feature {
            margin-top: -60px;
            border-radius: 20px;
            overflow: hidden;
        }

        /* Topics */
        .topic-box {
            background: white;
            padding: 10px;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .topic-box img {
            width: 55px;
            margin-bottom: 10px;
        }

        .card-box {
            background: white;
            padding: 10px;
            border-radius: 13px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>

    <!-- Add this inside <body> -->
    <button id="pwa-install-btn"
        style="display:none; position: fixed; bottom: 20px; right: 20px; padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 8px; z-index: 1000;">
        Install App
    </button>

    <div class="mobile-wrapper">

        @if (View::hasSection('showNavbar'))
            @include('layouts.header')
        @endif


        @yield('content')

        @if (View::hasSection('showBottonMenu'))
            @include('layouts.bottom-menu')
        @endif



    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
    <script src="{{ asset('pwa-install.js') }}"></script>

</body>

</html>
