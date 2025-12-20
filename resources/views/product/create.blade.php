@extends('layouts.app')

@section('content')
    <nav class="navbar fixed-top" style="background-color: #7633f9">
        <div class="container position-relative">

            <!-- Tombol Back -->
            <a href="{{ route('product.index', 'laptop') }}" class="position-absolute start-0 ms-2 text-white">
                <i class="bi bi-arrow-left fs-4 text-white p-3"></i>
            </a>

            <!-- Brand di tengah -->
            <div class="navbar-brand mx-auto text-white">
                Tambah Produk {{ $category->name }}
            </div>

        </div>
    </nav>

    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <section style="padding: 70px 0 100px 0">
            <div class="container">

                <div class="card-box p-3">
                    <div class="card-body">

                        <!-- category hidden -->
                        <input type="hidden" name="category_id" value="{{ $category->id }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Barang</label>
                            <input type="text" name="barang" class="form-control" placeholder="Masukan Nama Barang"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Merek</label>
                            <input type="text" name="merek" class="form-control" placeholder="Masukan Merek Barang">
                        </div>



                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kondisi</label>
                            <select name="kondisi" class="form-select" required>
                                <option value="">-- Pilih Kondisi --</option>
                                <option value="original new">Original New</option>
                                <option value="original 2nd">Original 2nd</option>
                                <option value="grade a new">Grade A New</option>
                                <option value="grade a 2nd">Grade A 2nd</option>
                                <option value="grade b new">Grade B New</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga Rp.</label>
                            <input type="text" name="harga" id="harga" class="form-control" placeholder="Rp."
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan" class="form-control" placeholder="Masukan Keterangan"></textarea>
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

    <script>
        document.getElementById('harga').addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        });
    </script>
@endsection
