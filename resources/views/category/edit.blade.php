@extends('layouts.app')

@section('content')
    <nav class="navbar fixed-top" style="background-color: #7633f9">
        <div class="container position-relative">

            <!-- Tombol Back -->
            <a href="{{ route('category.index') }}" class="position-absolute start-0 ms-2 text-white">
                <i class="bi bi-arrow-left fs-4 text-white p-3"></i>
            </a>

            <!-- Brand -->
            <div class="navbar-brand mx-auto text-white">
                Edit Kategori
            </div>

        </div>
    </nav>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <section style="padding: 70px 0 100px 0">
            <div class="container">

                <div class="card card mt-1 mb-2 p-2 product-card shadow-sm card-feature">
                    <div class="card-body">

                        <!-- Nama Barang -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Barang</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukan Kategori Barang"
                                value="{{ old('barang', $category->name) }}" required>
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
                        Update Data
                    </button>
                </div>
            </div>
        </nav>

    </form>
@endsection
