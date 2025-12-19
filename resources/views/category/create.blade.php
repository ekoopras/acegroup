@extends('layouts.app')

@section('content')
    <nav class="navbar fixed-top" style="background-color: #7633f9">
        <div class="container position-relative">

            <!-- Tombol Back -->
            <a href="{{ route('category.index') }}" class="position-absolute start-0 ms-2 text-white">
                <i class="bi bi-arrow-left fs-4 text-white p-3"></i>
            </a>

            <!-- Brand di tengah -->
            <div class="navbar-brand mx-auto text-white">
                {{ $title ?? 'Bootstrap' }}
            </div>

        </div>
    </nav>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <section style="padding: 70px 0 100px 0">
            <div class="container">

                <div class="card mt-1 mb-2 p-2 product-card shadow-sm card-feature">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukan Kategori"
                                required>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- Bottom Fixed Button -->
        <nav class="bottom-nav fixed-bottom bg-white border-top">
            <div class="container">
                <div class="d-grid gap-2 col-12 mx-auto py-2">
                    <button class="btn text-white" style="background-color: #7633f9" type="submit">
                        Simpan Data
                    </button>
                </div>
            </div>
        </nav>

    </form>
@endsection
