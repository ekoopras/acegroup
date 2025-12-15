@extends('layouts.app')

@section('showNavbar', true)

@section('content')

<!-- SEARCH FIXED -->
<div class="search-fixed">
    <section>
        <div class="card rounded-0">
          <div class="card-body">

            <div class="d-flex gap-2">
              
              <input 
                type="text" 
                id="searchCard" 
                class="form-control" 
                placeholder="Cari produk..."
              >

              

            </div>

          </div>
        </div>
    </section>
</div>
<style>
  .search-fixed {
    position: fixed;
    top: 56px; /* tinggi navbar */
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    
    z-index: 1030; /* di atas konten */
}

</style>

<section style="padding: 150px 0 100px 0">
  <div class="container">

    <div id="cardList">

      @forelse ($product_laptops as $item)
        <div class="card mb-2 product-card">
          <div class="card-body">

            <!-- Judul -->
            <h5 class="mb-1">{{ $item->barang }}</h5>

            <!-- Kondisi -->
            <small class="text-muted">
              Kondisi {{ $item->kondisi }}
            </small>
            <br>

            <!-- Harga -->
            <strong class="text-primary">
              Rp {{ number_format($item->harga, 0, ',', '.') }}
            </strong>

            <!-- Tombol Action -->
            <div class="d-flex gap-2 mt-3">

              <!-- Edit -->
              <a href="{{ route('product-laptop.edit', $item->id) }}"
                 class="btn btn-sm btn-success">
                <i class="bi bi-pencil"></i> Edit
              </a>

              <a href=""
                 class="btn btn-sm btn-primary">
                <i class="bi bi-eye"></i> View
              </a>

              <!-- Delete -->
              <form action="{{ route('product-laptop.destroy', $item->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i> Hapus
                </button>
              </form>

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

            <a href="{{ route('product-laptop.create') }}"
               class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Produk
            </a>

        </div>
    </div>
</nav>



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