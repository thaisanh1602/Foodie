<!-- Navbar -->
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
                data-mdb-collapse-init
                class="navbar-toggler"
                type="button"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0 {{request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <img
                        src="{{ asset('images/Foodie_Logo.png') }}"
                        height="35"
                        width="45"
                        alt="Foodie"
                        />
                </a>
                <!-- Left links -->
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
           href="{{ route('home') }}">
            Trang chủ
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('suggestion') ? 'active' : '' }}" 
           href="{{ route('suggestion') }}">
            Gợi ý món ăn
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('community') ? 'active' : '' }}" 
           href="{{ route('community') }}">
            Cộng đồng
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('statistic') ? 'active' : '' }}" 
           href="{{ route('statistic') }}">
            Thống kê
        </a>
    </li>
</ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
            <ul class="navbar-nav flex-row">
                <li class="nav-item me-3">
                    <a class="nav-link" href="#">Về chúng tôi</a>
                </li>
                <li class="nav-item me-3">
                    <a class="btn btn-primary btn-sm px-3 py-2 align-self-center" href="#">Đăng ký</a>
                </li>
            </ul>
            <a data-mdb-dropdown-init class="nav-link d-flex align-items-center" href="#"
            id="navbarDropdownMenuLink" role="button" aria-expanded="false">
            <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle" height="37" alt="Avatar"
              loading="lazy" />
          </a>
        </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body">
            <div class="container-fluid">
                <button
                    data-mdb-collapse-init
                    class="navbar-toggler"
                    type="button"
                    data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
</header>
        <!-- Navbar -->