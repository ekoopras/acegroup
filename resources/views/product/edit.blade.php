@extends('layouts.app')

@section('content')
    <nav class="navbar fixed-top" style="background-color: #7633f9">
        <div class="container position-relative">

            <!-- Tombol Back -->
            <a href="{{ route('product.index', 'laptop') }}" class="position-absolute start-0 ms-2 text-white">
                <i class="bi bi-arrow-left fs-4 text-white p-3"></i>
            </a>

            <!-- Brand -->
            <div class="navbar-brand mx-auto text-white">
                Edit Produk {{ $category->name }}
            </div>

        </div>
    </nav>

    <form action="{{ route('product.update', [$category->slug, $product->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <section style="padding: 70px 0 100px 0">
            <div class="container">

                <div class="card card mt-1 mb-2 p-2 product-card shadow-sm card-feature">
                    <div class="card-body">

                        <!-- Nama Barang -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Barang</label>
                            <input type="text" name="barang" class="form-control" placeholder="Masukan Nama Barang"
                                value="{{ old('barang', $product->barang) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Merek</label>
                            <input type="text" name="merek" class="form-control" placeholder="Masukan Nama Barang"
                                value="{{ old('merek', $product->merek) }}" required>
                        </div>

                        <!-- Kondisi -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kondisi</label>
                            <select name="kondisi" class="form-select" required>
                                <option value="">-- Pilih Kondisi --</option>

                                <option value="original new"
                                    {{ old('kondisi', $product->kondisi) == 'original new' ? 'selected' : '' }}>
                                    Original New
                                </option>

                                <option value="original 2nd"
                                    {{ old('kondisi', $product->kondisi) == 'original 2nd' ? 'selected' : '' }}>
                                    Original 2nd
                                </option>

                                <option value="grade a new"
                                    {{ old('kondisi', $product->kondisi) == 'grade a new' ? 'selected' : '' }}>
                                    Grade A New
                                </option>

                                <option value="grade a 2nd"
                                    {{ old('kondisi', $product->kondisi) == 'grade a 2nd' ? 'selected' : '' }}>
                                    Grade A 2nd
                                </option>

                                <option value="grade b new"
                                    {{ old('kondisi', $product->kondisi) == 'grade b new' ? 'selected' : '' }}>
                                    Grade B New
                                </option>
                            </select>
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" placeholder="Rp."
                                value="{{ old('harga', number_format($product->harga, 0, ',', '.')) }}" required>
                        </div>



                        <div class="mb-3">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan" class="form-control">{{ old('keterangan', $product->keterangan) }}</textarea>
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

    <!-- Format Harga -->
    <script>
        document.getElementById('harga').addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        });
    </script>
@endsection
