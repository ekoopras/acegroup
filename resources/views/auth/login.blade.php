@extends('layouts.app')

@section('content')
    <!-- HEADER -->
    <div class="header-bg-login">
        <div class="d-flex justify-content-center align-items-center h-100">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="header-logo-login" style="height: 50px">
        </div>
    </div>

    <style>
        .header-bg-login {
            background: #7633f9;
            color: white;
            padding: 0 0 150px;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            height: 300px;
        }

        .header-logo-login {
            height: 38px;
            width: auto;
            object-fit: contain;
        }

        @media (max-width: 480px) {
            .header-logo-login {
                height: 34px;
            }
        }
    </style>


    <section class="login-card">
        <div class="d-flex align-items-center justify-content-center">
            <div class="card shadow-sm border-0 rounded-4" style="max-width:380px;width:100%;padding: 40px 30px 40px 30px;">

                <div class="text-center mb-1">
                    <h4 class="fw-bold">LOGIN</h4>
                    <p class="text-muted medium">Silahkan Login Dulu Bosss Ku!!</p>
                </div>

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-primary w-100 mb-3">
                        Login
                    </button>
                </form>

                <div class="text-center text-muted medium mb-2">atau</div>

                <a href="{{ route('google.login') }}"
                    class="btn btn-danger w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-google"></i>
                    Login dengan Google
                </a>

            </div>
        </div>
    </section>

    <style>
        .login-card {
            z-index: 1;
            margin: -180px;

        }
    </style>
@endsection
