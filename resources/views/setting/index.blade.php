@extends('layouts.app')

@section('showBottonMenu', true)
@section('showNavbar', true)

@section('content')

    <section class="setting" style="padding-top: 130px">
        <div class="container">

            <a href="{{ route('category.index') }}" class="text-decoration-none text-dark">
                <div class="card mt-10 mb-2 product-card shadow-sm card-feature">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-gear-fill fs-4 me-3"></i>
                        <span class="fw-semibold">Kategori</span>
                    </div>
                </div>
            </a>


        </div>
    </section>



    <section class="setting" style="padding-top: 130px">
        <div class="container">
            {{-- <form action="{{ route('logout') }}" method="POST"> --}}
            @csrf
            <div class="card mt-10 mb-2 product-card shadow-sm card-feature">
                <div class="card-body d-flex align-items-center">
                    <button class="btn btn-outline-secondary btn-sm">Logout</button>

                </div>
            </div>
            {{-- </form> --}}
        </div>
    </section>

@endsection
