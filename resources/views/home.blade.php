<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
        }

        .hero {
            min-height: 60vh;
            display: flex;
            align-items: center
        }

        .brand {
            font-weight: 700
        }

        footer {
            padding: 2rem 0;
            background: #f8f9fa
        }
    </style>
</head>

<body>

    <!-- Navbar -->
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
        <a class="nav-link" 
           href="#">
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
        <!-- Navbar -->

        <!-- Background image -->
     <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
<div class="carousel-inner">
    <!-- Slide 1 -->
    <div class="carousel-item active">
        <img src="{{ asset('images/homepage1.jpg') }}" 
             class="d-block w-100" 
             alt="Món ăn ngon"
             style="height: 80vh; object-fit: cover;">
             <div class="carousel-caption">
    <h3>Món ngon mỗi ngày</h3>
    <p>Hôm nay ăn gì? Khám phá ngay!</p>
  </div>
             
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
        <img src="{{ asset('images/homepage2.jpg') }}" 
             class="d-block w-100" 
             alt="Ẩm thực Việt Nam"
             style="height: 80vh; object-fit: cover;">
             <div class="carousel-caption">
    <h3>Đánh vào sự tiện lợi</h3>
    <p>Bí ý tưởng bữa ăn? Để chúng tôi gợi ý món ngon cho bạn!</p>
  </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
        <img src="{{ asset('images/homepage3.jpg') }}" 
             class="d-block w-100" 
             alt="Món ăn hấp dẫn"
             style="height: 80vh; object-fit: cover;">
             <div class="carousel-caption">
    <h3>Nhấn mạnh sự đa dạng</h3>
    <p>Thế giới ẩm thực trong tầm tay. Gợi ý món ăn phong phú, mới lạ mỗi ngày!</p>
  </div>
    </div>
</div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
        <!-- Background image -->
    </header>

    <section class="hero py-5 text-white">
        <div class="container text-center">
            <h1 class="h2 text-muted mb-3">Chào mừng bạn đến với Foodie!</h1>
            <p class="text-muted mb-4">Bữa ăn tuyệt vời không phải là ngẫu nhiên, đó là một lựa chọn! — Chấm dứt sự phân vân, bắt đầu hành trình biến mọi nguyên liệu thành những kiệt tác ẩm thực với gợi ý món ăn đầy năng lượng từ chúng tôi.</p>
            <a class="btn btn-primary" href="#">Bắt đầu</a>

            <section class="py-4">
        <div class="container">
           <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="{{ asset('images/vegetables.jpg') }}"  class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title">Rau củ quả</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="{{ asset('images/meat.jpg') }}"  class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title">Thịt</h5>
        <p class="card-text">This is a short card.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="{{ asset('images/fish.jpg') }}"  class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title">Cá</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
</div>
        </div>
    </section>
        
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
       
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Foodie
                        </h6>
                        <p>
                            Không còn đau đầu với câu hỏi 'Hôm nay ăn gì?' nữa! — Website của chúng tôi là nguồn cảm hứng bất tận, mang đến những gợi ý món ăn hoàn hảo, phù hợp khẩu vị và quỹ thời gian bận rộn của gia đình bạn.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Liên hệ</h6>
                        <p><i class="fas fa-home me-3"></i> Ngũ Hành Sơn, Đà Nẵng</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © Thực hiện bởi nhóm sinh viên trường Công nghệ Thông tin và Truyền thông Việt Hàn - VKU
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>