@extends('layouts.app')

@section('showBottonMenu', true)

@section('content')

    <!-- HEADER -->
    <div class="header-bg">
        <div class="d-flex justify-content-between align-items-center mb-3">

            <div class="d-flex align-items-center">
                {{-- <img src="{{ Auth::user()->avatar }}" class="header-profile rounded-circle" alt="Profile"> --}}
                <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}"
                    class="header-profile rounded-circle" alt="">
                <span class="p-2 text-white fw-semibold">Hai, {{ Auth::user()->name }}</span>

            </div>
        </div>

    </div>
    <style>
        .header-logo {
            height: 38px;
            /* atur tinggi sesuai selera */
            width: auto;
            /* biar proporsional */
            object-fit: contain;
            /* menjaga proporsi */
        }

        @media (max-width: 480px) {
            .header-logo {
                height: 34px;
                /* untuk mobile */
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

        <div class="row g-3 mb-3 ">

            <div class="col-3 text-center">
                <a href="{{ route('product.index', 'laptop') }}" class="text-decoration-none text-dark">
                    <div class="topic-box">
                        <div class="icon-circle text-white" style="background-color: #ffd8f4">

                            <i class="bi bi-laptop-fill fs-1" style="color: #ca4da7"></i>
                        </div>
                        <div class="fw-medium small" style="font-size: 12px">Laptop</div>
                    </div>
                </a>
            </div>


            <div class="col-3 text-center">
                <a href="{{ route('product.index', 'komputer') }}" class="text-decoration-none text-dark">
                    <div class="topic-box">
                        <div class="icon-circle text-white" style="background-color: #eae7fe">
                            <i class="bi bi-pc-display fs-1" style="color: #8473e4"></i>
                        </div>
                        <div class="fw-medium small" style="font-size: 12px">Komputer</div>
                    </div>
                </a>
            </div>


            <div class="col-3 text-center">
                <a href="{{ route('product.index', 'printer') }}" class="text-decoration-none text-dark">
                    <div class="topic-box">
                        <div class="icon-circle text-white" style="background-color: #d8f6fe">
                            <i class="bi bi-printer-fill fs-1" style="color: #75b7cd"></i>
                        </div>
                        <div class="fw-medium small" style="font-size: 12px">Printer</div>
                    </div>
                </a>
            </div>

            <div class="col-3 text-center">
                <a href="{{ route('product.index', 'macbook') }}" class="text-decoration-none text-dark">
                    <div class="topic-box">
                        <div class="icon-circle text-white" style="background-color: #ffd8a4">
                            <i class="bi bi-apple fs-1" style="color: #ff9b29"></i>
                        </div>
                        <div class="fw-medium" style="font-size: 12px">Macbook</div>
                    </div>
                </a>
            </div>
        </div>

        <h6 class="fw-bold mt-4 mb-3">Settings</h6>
        <div class="row g-3 pb-5 mb-5 ">
            <div class="col-3 text-center">
                <a href="{{ route('category.index') }}" class="text-decoration-none text-dark">
                    <div class="topic-box">
                        <div class="icon-circle text-white" style="background-color: #ffd8a4">
                            <i class="bi bi-tags fs-1" style="color: #ff9b29"></i>
                        </div>
                        <div class="fw-medium" style="font-size: 12px">category</div>
                    </div>
                </a>
            </div>

        </div>



    </div>




    <style>
        .icon-circle {
            width: 45px;
            height: 45px;
            border-radius: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
    </style>

@endsection
