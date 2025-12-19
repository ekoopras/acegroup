<!-- BOTTOM NAVIGATION -->
<nav class="bottom-nav">

    <a href="{{ route('apps.index') }}" class="bottom-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <i class="bi bi-house-fill"></i>
        <span>Home</span>
    </a>

    <a href="{{ route('notifikasi.index') }}"
        class="bottom-nav-item {{ request()->routeIs('notifikasi.*') ? 'active' : '' }}">
        <i class="bi bi-bell-fill"></i>
        <span>Notifikasi</span>
    </a>

    <a href="{{ route('setting.index') }}" class="bottom-nav-item {{ request()->routeIs('setting.*') ? 'active' : '' }}">
        <i class="bi bi-gear-fill"></i>
        <span>Setting</span>
    </a>

</nav>

<style>
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #fff;
        display: flex;
        border-top: 1px solid #ddd;
        z-index: 999;
    }

    .bottom-nav-item {
        flex: 1;
        text-align: center;
        text-decoration: none;
        color: #666;
        font-size: 12px;
    }

    .bottom-nav-item i {
        display: block;
        font-size: 20px;
    }

    .bottom-nav-item.active {
        color: #7633f9;
    }
</style>
