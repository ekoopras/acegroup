@extends('layouts.app')

@section('content')

<!-- FEATURE CARD -->
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
                <div class="topic-box">
                    <i class="bi bi-laptop-fill fs-1"></i>
                    <div class="fw-semibold small">Laptop</div>
                </div>
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

@endsection
