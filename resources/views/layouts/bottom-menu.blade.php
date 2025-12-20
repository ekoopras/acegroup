<nav class="bottom-nav fixed-bottom bg-white border-top">
    <div class="container">
        <div class="d-flex justify-content-between text-center py-2">

            <a href="{{ route('apps.index') }}"
                class="nav-item text-decoration-none
               {{ request()->routeIs('apps.index') ? 'active' : '' }}">
                <div class="icon-wrapper">
                    <i class="bi bi-house-fill"></i>
                </div>
                <small>Home</small>
            </a>

            <a href="#" class="nav-item text-decoration-none">
                <div class="icon-wrapper">
                    <i class="bi  bi-grid-fill"></i>
                </div>
                <small>Service</small>
            </a>

            <a href="{{ route('notifikasi.index') }}"
                class="nav-item text-decoration-none
               {{ request()->routeIs('notifikasi.index') ? 'active' : '' }}">
                <div class="icon-wrapper">
                    <i class="bi bi-bell"></i>
                </div>
                <small>Notifikasi</small>
            </a>

            <a href="#" class="nav-item text-decoration-none">
                <div class="icon-wrapper">
                    <i class="bi  bi-person-fill"></i>
                </div>
                <small>Profile</small>
            </a>

        </div>
    </div>
</nav>
<style>
    .bottom-nav {
        height: 60px;
        z-index: 1030;
    }

    .bottom-nav .nav-item {
        flex: 1;
        font-size: 15px;
        color: #9ca3af;
        /* abu */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 2px;
    }

    .bottom-nav .nav-item i {
        font-size: 18px;
        line-height: 1;
    }

    .bottom-nav .nav-item.active {
        color: #7633f9;
        /* biru aktif */
    }

    .bottom-nav .nav-item.active i {
        color: #7633f9;
    }
</style>
