@extends('layouts.app')

@section('showNavbar', true)

@section('showBottonMenu', true)

@section('content')


    <section style="padding: 80px 0 100px 0">
        <div class="container">

            <div id="cardList">

                @forelse ($notifis as $notif)
                    <div class="card-box mb-2 p-3">
                        <div class="card-body">

                            <!-- Judul -->
                            <h5 class="mb-1 text-capitalize">{{ $notif->title }}</h5>

                            <!-- Kondisi -->
                            <small class="text-muted">
                                {{ $notif->message }}
                            </small>
                            <br>
                            <small>{{ $notif->created_at->diffForHumans() }}</small>

                            @if (!$notif->is_read)
                                <span class="badge bg-danger">Baru</span>
                            @endif

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



@endsection
