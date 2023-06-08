<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle"
            src="img/avatar-6.jpg" alt="...">
        <div class="ms-3 title">
            <h1 class="h5 mb-1">Mark Stephen</h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p>
        </div>
    </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
    <ul class="list-unstyled">
        <li class="sidebar-item {{ $currentPage === 'home' ? 'active' : '' }}"><a class="sidebar-link"
                href="index.html">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#real-estate-1"> </use>
                </svg><span>Trang chủ </span></a></li>
        <li class="sidebar-item {{ $currentPage === 'photo' ? 'active' : '' }}"><a class="sidebar-link"
                href="tables.html">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#portfolio-grid-1"> </use>
                </svg><span>Photocopy </span></a></li>
        <li class="sidebar-item {{ $currentPage === 'product' ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('admin.products.index') }}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#sales-up-1"> </use>
                </svg><span>Sản phẩm </span></a>
        </li>
        <li class="sidebar-item {{ $currentPage === 'order' ? 'active' : '' }}"><a class="sidebar-link"
                href="#exampledropdownDropdown" data-bs-toggle="collapse">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#browser-window-1"> </use>
                </svg><span>Đơn hàng </span></a>
            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                <li><a class="sidebar-link" href="#">Photocopy</a></li>
                <li><a class="sidebar-link" href="#">Sản phẩm</a></li>
            </ul>
        </li>
        {{-- </ul><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Extras</span> --}}
        {{-- <ul class="list-unstyled">
        <li class="sidebar-item"><a class="sidebar-link" href="#">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#imac-screen-1"> </use>
                </svg><span>Demo </span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="#">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#chart-1"> </use>
                </svg><span>Demo </span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="#">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#quality-1"> </use>
                </svg><span>Demo </span></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="#">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#security-shield-1"> </use>
                </svg><span>Demo </span></a></li>
    </ul> --}}
</nav>
