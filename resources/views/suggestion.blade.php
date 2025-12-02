<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gợi ý món ăn</title>
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
                <li class="nav-item me-2">
                    <a class="btn btn-primary btn-sm px-3 py-2 align-self-center" href="#">Đăng ký</a>
                </li>
            </ul>
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
     <div
    id="intro-example"
    class="p-5 text-center text-white d-flex align-items-center justify-content-center"
    style="
        background-image: url('/public/images/pile-vegetables-green-background-generative-ai-design-instagram-facebook-wall-painting-wallpaper-art-photo-325567806.webp');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    "
>
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Gợi ý món ăn</h1>
          <h5 class="mb-4">Best & free guide of responsive web design</h5>
          <a
            data-mdb-ripple-init
            class="btn btn-outline-light btn-lg m-2"
            href="https://www.youtube.com/watch?v=c9B4TPnak1A"
            role="button"
            rel="nofollow"
            target="_blank"
          >Start tutorial</a
          >
          <a
            data-mdb-ripple-init
            class="btn btn-outline-light btn-lg m-2"
            href="https://mdbootstrap.com/docs/standard/"
            target="_blank"
            role="button"
          >Download MDB UI KIT</a
          >
        </div>
      </div>
    </div>
  </div>
        <!-- Background image -->
    </header>

    <section class="hero py-5">
        <div class="container text-center">
            <h1 class="h2 mb-3">Tiêu đề ngắn, ấn tượng</h1>
            <p class="text-muted mb-4">Mô tả ngắn gọn về sản phẩm hoặc dịch vụ của bạn.</p>
            <a class="btn btn-primary" href="#">Bắt đầu</a>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-4">
                    <h6>Nhanh</h6>
                    <p class="small text-muted">Tốc độ tải tốt</p>
                </div>
                <div class="col-4">
                    <h6>Đẹp</h6>
                    <p class="small text-muted">Thiết kế tối giản</p>
                </div>
                <div class="col-4">
                    <h6>Dễ dùng</h6>
                    <p class="small text-muted">Tùy chỉnh nhanh</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
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