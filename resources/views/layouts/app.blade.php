<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Style Layout</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="manifest" href="{{ asset('app/json/manifest.json') }}">
    <meta name="theme-color" content="#0066ff">

    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <meta name="apple-mobile-web-app-capable" content="yes">

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
            background: #0066ff;
            color: white;
            padding: 40px 20px 80px;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }
        .header-profile {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.6);
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
            padding: 18px;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .topic-box img {
            width: 55px;
            margin-bottom: 10px;
        }

        /* Bottom menu */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            max-width: 430px;
            margin: 0 auto;
            background: #ffffff;
            padding: 8px 0 5px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.12);
            display: flex;
            justify-content: space-around;
        }
        .bottom-nav-item {
            text-align: center;
            font-size: 13px;
            color: #777;
        }
        .bottom-nav-item.active {
            color: #0d6efd;
            font-weight: 600;
        }
        .bottom-nav-item i {
            font-size: 22px;
            display: block;
            margin-bottom: 2px;
        }
    </style>
</head>

<body>

<div class="mobile-wrapper">

        @if(View::hasSection('showNavbar'))
            @include('layouts.header')
        @endif


        @yield('content')

         @if(View::hasSection('showBottonMenu'))
            @include('layouts.bottom-menu')
        @endif

    

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- ============ PWA SCRIPT ============ -->
    <script>
        // Register Service Worker
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('{{ asset('app/js/sw.js') }}')
                    .then(function(registration) {
                        console.log('Service Worker registered with scope:', registration.scope);
                    })
                    .catch(function(error) {
                        console.log('Service Worker registration failed:', error);
                    });
            });
        }

        // Online/Offline Detection
        window.addEventListener('online', function() {
            console.log('You are online');
            // Bisa tambahkan notifikasi atau reload
            showNotification('Back online', 'success');
        });

        window.addEventListener('offline', function() {
            console.log('You are offline');
            showNotification('You are offline - app needs internet', 'warning');
        });

        function showNotification(message, type) {
            // Simple notification
            alert(message);
        }

        // Install Prompt
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            // Prevent Chrome 67 and earlier from automatically showing the prompt
            e.preventDefault();
            // Stash the event so it can be triggered later
            deferredPrompt = e;
            
            // Show install button (optional)
            showInstallButton();
        });

        function showInstallButton() {
            // Buat button install jika mau
            console.log('App can be installed');
        }

        function installPWA() {
            if(deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted install');
                    }
                    deferredPrompt = null;
                });
            }
        }
        // ======================================
    </script>

</body>
</html>
