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
                Produk {{ $category->name }}
            </div>

        </div>
    </nav>
    <!-- SEARCH FIXED -->
    <div class="search-fixed">
        <section>
            <div class="card rounded-0">
                <div class="card-body">

                    <div class="d-flex gap-2">
                        <input type="text" id="searchCard" class="form-control" placeholder="Cari produk...">
                    </div>

                </div>
            </div>
        </section>
    </div>
    <style>
        .search-fixed {
            position: fixed;
            top: 56px;
            /* tinggi navbar */
            left: 50%;
            transform: translateX(-50%);
            width: 100%;

            z-index: 1030;
            /* di atas konten */
        }
    </style>

    <section style="padding: 150px 0 100px 0">
        <div class="container">

            <div id="cardList">

                @forelse ($products as $item)
                    <div class="card-box p-3">
                        <div class="card-body">

                            <!-- Judul -->
                            <h5 class="mb-1 text-capitalize">{{ $item->barang }}</h5>

                            <!-- Kondisi -->
                            <small class="text-muted">
                                Kondisi {{ $item->kondisi }}
                            </small>
                            <br>



                            <!-- Tombol Action -->
                            <div class="d-flex justify-content-between align-items-center mt-3">

                                <!-- Harga (Kiri) -->
                                <strong class="text-primary fs-6">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </strong>

                                <!-- Action (Kanan) -->
                                <div class="d-flex gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('product.edit', [$category->slug, $item->id]) }}"
                                        class="btn btn-sm btn-success">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- View -->
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewModal" data-barang="{{ $item->barang }}"
                                        data-merek="{{ $item->merek }}" data-kondisi="{{ ucfirst($item->kondisi) }}"
                                        data-harga="{{ number_format($item->harga, 0, ',', '.') }}"
                                        data-keterangan="{{ $item->keterangan }}">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <!-- Delete -->
                                    <form action="{{ route('product.destroy', [$category->slug, $item->id]) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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

                <a href="{{ route('product.create', $category->slug) }}" class="btn text-white"
                    style="background-color: #7633f9">
                    <i class="bi bi-plus-lg"></i> Tambah Produk
                </a>

            </div>
        </div>
    </nav>

    @include('product.view')
    <script>
        document.getElementById('viewModal')
            .addEventListener('show.bs.modal', function(event) {

                let button = event.relatedTarget;

                document.getElementById('viewBarang').innerText =
                    button.getAttribute('data-barang');

                document.getElementById('viewMerek').innerText =
                    button.getAttribute('data-merek');

                document.getElementById('viewKondisi').innerText =
                    button.getAttribute('data-kondisi');

                document.getElementById('viewHarga').innerText =
                    'Rp ' + button.getAttribute('data-harga');

                document.getElementById('viewKeterangan').innerText =
                    button.getAttribute('data-keterangan');
            });
    </script>



    <!-- Script Filter Cards -->
    <script>
        document.getElementById('searchCard').addEventListener('keyup', function() {
            let input = this.value.toLowerCase();
            let cards = document.querySelectorAll('.product-card');

            cards.forEach(card => {
                let text = card.innerText.toLowerCase();
                card.style.display = text.includes(input) ? '' : 'none';
            });
        });
    </script>
@endsection
