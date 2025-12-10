<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-2">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="{{ route('home') }}">
            <img src="{{ asset('images/Foodie_Logo.png') }}" height="40" width="auto" alt="Foodie" class="me-2" />
            <span style="color: #ff6b6b;">Foodie</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-medium">
                @php
                    $isUser = !Auth::check() || (Auth::check() && Auth::user()->typeUser == 'user');
                    $isAdmin = Auth::check() && Auth::user()->typeUser == 'admin';
                @endphp

                @if($isUser)
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active text-primary' : '' }}" href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('suggestion') ? 'active text-primary' : '' }}" href="{{ route('suggest.ingredient') }}">Gợi ý</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('community') ? 'active text-primary' : '' }}" href="{{ route('community') }}">Cộng đồng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('post') ? 'active text-primary' : '' }}" href="{{ route('post') }}">Đăng bài</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('aboutus') ? 'active text-primary' : '' }}" href="{{ route('aboutus') }}">Về chúng tôi</a>
                </li>
                @endif

                @if($isAdmin)
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('statistic') ? 'active text-primary' : '' }}" href="{{ route('statistic') }}">Thống kê</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('suggestion') ? 'active text-primary' : '' }}" href="{{ route('categorymanage') }}">Quản lý nguyên liệu</a>
                    </li>
                @endif
                
                
            </ul>

            <div class="d-flex align-items-center gap-3">
                <form action="{{ route('user.search') }}" method="GET" class="search-form position-relative d-none d-lg-block">
                    <input type="text" name="query" class="form-control rounded-pill ps-4 pe-5 bg-light border-0" placeholder="Tìm món, bạn bè..." value="{{ request('query') }}">
                    <button type="submit" class="btn position-absolute top-50 end-0 translate-middle-y text-muted border-0 bg-transparent pe-3">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <a href="#" class="d-lg-none text-dark"><i class="fa-solid fa-magnifying-glass"></i></a>

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('login') }}">Đăng nhập</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item ms-2">
                                <a class="btn btn-primary rounded-pill px-4" style="background-color: #ff6b6b; border: none;" href="{{ route('register') }}">Đăng ký</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ asset(Auth::user()->image ?? 'images/default-avatar.png') }}" class="rounded-circle object-fit-cover shadow-sm border" height="40" width="40" alt="Avatar">
                                <span class="ms-2 d-none d-lg-inline fw-bold text-dark">{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 rounded-3" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->typeUser == 'user')
                                    <a class="dropdown-item py-2" href="{{ route('profile') }}">
                                        <i class="fas fa-user me-2 text-muted"></i> Hồ sơ cá nhân
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>