@extends('layouts.app')

@section('showBottonMenu', true)

@section('content')

<!-- HEADER -->
    <div class="header-bg">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <img src="https://acegroupcenter.com/wp-content/uploads/2025/08/logo-1024x241.png" 
     alt="Logo"
     class="header-logo">

            <div class="d-flex align-items-center">
                <span class="me-2 text-white fw-semibold">Hai, User</span>
                <img src="https://via.placeholder.com/100" class="header-profile" alt="">
            </div>
        </div>

    </div>
    <style>
    .header-logo {
        height: 38px;        /* atur tinggi sesuai selera */
        width: auto;         /* biar proporsional */
        object-fit: contain; /* menjaga proporsi */
    }

    @media (max-width: 480px) {
        .header-logo {
            height: 34px;    /* untuk mobile */
        }
    }
</style>

<!-- FEATURE CARD -->
<div class="container">
        <div class="card shadow-sm card-feature">
            <div class="card-body d-flex align-items-center">
                <div class="flex-grow-1">
                    <h6 class="fw-bold mb-1">Especially For You</h6>
                    <p class="text-muted small mb-2">Top three sections and many topics.</p>
                    <button class="btn btn-primary btn-sm">Watch Now</button>
                </div>
                <img src="https://via.placeholder.com/110x100" class="ms-3 rounded" alt="">
            </div>
        </div>

        <!-- TOPICS -->
        <h6 class="fw-bold mt-4 mb-3">Produk</h6>

        <div class="row g-3 pb-5 mb-5">
            <div class="col-6">
                <a href="{{ route('product-laptop.index') }}" class="text-decoration-none text-dark">
                    <div class="topic-box">
                        <i class="bi bi-laptop-fill fs-1"></i>
                        <div class="fw-semibold small">Laptop</div>
                    </div>
                </a>
            </div>

            <div class="col-6">
                <div class="topic-box">
                    <i class="bi bi-pc-display fs-1"></i>
                    <div class="fw-semibold small">Komputer</div>
                </div>
            </div>

            <div class="col-6">
                <div class="topic-box">
                    <i class="bi bi-printer-fill fs-1"></i>
                    <div class="fw-semibold small">Printer</div>
                </div>
            </div>

            <div class="col-6">
                <div class="topic-box">
                    <i class="bi bi-apple fs-1"></i>
                    <div class="fw-semibold small">Macbook</div>
                </div>
            </div>
        </div>
</div>

@endsection
