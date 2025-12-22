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

                    <a href="#" class="list-group-item d-flex align-items-center">
                        <span class="icon-box bg-primary text-white me-3">
                            <i class="bi bi-wifi"></i>
                        </span>
                        <span class="flex-grow-1">Email</span>
                        <small class="text-muted me-2">HomeNet</small>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </a>
                    <a href="#" class="list-group-item d-flex align-items-center">
                        <span class="icon-box bg-primary text-white me-3">
                            <i class="bi bi-wifi"></i>
                        </span>
                        <span class="flex-grow-1">Password</span>
                        <small class="text-muted me-2">HomeNet</small>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </a>
                </div>
            </div>
            {{-- INCLUDE MODAL --}}
            @include('profile.modal')

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

    <div class="modal fade" id="modalUsername" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('profile.update.name') }}" method="POST" class="modal-content rounded-4 border-0">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Edit User Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>


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




@endsection
