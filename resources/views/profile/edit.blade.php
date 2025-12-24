@extends('layouts.app')

@section('showBottonMenu', true)
@section('showNavbar', true)

@section('content')

    <section class="profile-section ">
        <div class="container" style="max-width: 420px;">

            <!-- PROFILE CARD -->
            <div class="card shadow-sm border-0 rounded-4 mb-3">
                <div class="card-body d-flex align-items-center">

                    <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}" class="rounded-circle me-3"
                        width="60" height="60" alt="Avatar">

                    <div class="flex-grow-1">
                        <div class="fw-semibold">{{ Auth::user()->name }}</div>
                        <small class="text-muted">Devisi Laptop</small>
                    </div>

                </div>
            </div>

            <!-- GENERAL SETTINGS -->
            <div class="card shadow-sm border-0 rounded-4 mb3">

                <div class="list-group d-flex list-group-flush">
                    <a href="#" class="list-group-item d-flex align-items-center">
                        <span class="icon-box bg-warning text-white me-3">
                            <i class="bi bi-airplane"></i>
                        </span>
                        <span class="flex-grow-1">Edit Photo Profil</span>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </a>

                    <!-- Username -->
                    <a href="#" class="list-group-item d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#modalUsername">
                        <span class="icon-box bg-primary text-white me-3">
                            <i class="bi bi-person"></i>
                        </span>
                        <span class="flex-grow-1">User Name</span>
                        <small class="text-muted me-2">{{ auth()->user()->name }}</small>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </a>



                    <a href="#" class="list-group-item d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#modalEmail">
                        <span class="icon-box bg-primary text-white me-3">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <span class="flex-grow-1">Email</span>
                        <small class="text-muted me-2">{{ auth()->user()->email }}</small>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </a>


                    <a href="#" class="list-group-item d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#modalPassword">
                        <span class="icon-box bg-primary text-white me-3">
                            <i class="bi bi-lock"></i>
                        </span>
                        <span class="flex-grow-1">Password</span>
                        <small class="text-muted me-2">••••••••</small>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </a>

                </div>
            </div>

            <!-- PROFILE CARD -->
            <div class="card shadow-sm border-0 rounded-4 mt-3">
                <div class="card-body d-flex align-items-center">

                    <div class="flex-grow-1">
                        <div class="fw-semibold text-center">Logout</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <style>
        .profile-section {
            padding-top: 70px
        }

        .icon-box {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .list-group-item {
            border: 0;
            padding: 14px 16px;
        }

        .list-group-item+.list-group-item {
            border-top: 1px solid #f1f1f1;
        }
    </style>

    {{-- INCLUDE MODAL --}}
    @include('profile.modal')




@endsection
