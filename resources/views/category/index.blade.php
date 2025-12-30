@extends('layouts.app')

@section('content')
    <nav class="navbar fixed-top" style="background-color: #7633f9">
        <div class="container position-relative">

            <!-- Tombol Back -->
            <a href="{{ route('apps.index') }}" class="position-absolute start-0 ms-2 text-white">
                <i class="bi bi-arrow-left fs-4 text-white p-3"></i>
            </a>

            <!-- Brand di tengah -->
            <div class="navbar-brand mx-auto text-white">
                {{ $title ?? 'Bootstrap' }}
            </div>

        </div>
    </nav>

    <section style="padding: 80px 0 100px 0">
        <div class="container">

            <div id="cardList">

                @forelse ($category as $ctg)
                    <div class="card-box mb-2 p-3">
                        <div class="card-body">

                            <!-- Judul -->
                            <h5 class="mb-1">{{ $ctg->name }}</h5>

                            <!-- Tombol Action -->
                            <div class="d-flex justify-content-between align-items-center mt-3">

                                <!-- Harga (Kiri) -->
                                <small class="text-muted">
                                    SLUG : {{ $ctg->slug }}
                                </small>

                                <!-- Action (Kanan) -->
                                <div class="d-flex gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('category.edit', $ctg->id) }}" class="btn btn-sm btn-success">
                                        <i class="bi bi-pencil"></i>
                                    </a>


                                    <!-- Delete -->
                                    <form action="{{ route('category.destroy', $ctg->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-4">
                        Data produk belum tersedia
                    </div>
                @endforelse

            </div>

        </div>
    </section>


    <!-- Bottom Fixed Button -->
    <nav class="bottom-nav fixed-bottom bg-white border-top">
        <div class="container">
            <div class="d-grid gap-2 col-12 mx-auto py-2">

                <a href="{{ route('category.create') }}" class="btn text-white" style="background-color: #7633f9">
                    <i class="bi bi-plus-lg"></i> Tambah Kategori
                </a>

            </div>
        </div>
    </nav>
@endsection
