<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Data Pengajuan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('konsumen') ? 'active' : '' }}">
                <a href="{{ route('konsumen.index') }}" class="nav-link"><i class="fas fa-home"></i><span>Konsumen</span></a>
            </li>
            <li class="{{ Request::is('kendaraan') ? 'active' : '' }}">
                <a href="{{ route('kendaraan.index') }}" class="nav-link"><i class="fas fa-home"></i><span>kendaraan</span></a>
            </li>




    </aside>
</div>
