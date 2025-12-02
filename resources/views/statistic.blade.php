<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thống kê</title>
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

     <div class="container my-5">
    <h2 class="mb-4 text-center">Thống kê gợi ý món ăn</h2>

    <div class="row">
      <!-- Biểu đồ số lượng món theo loại -->
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <div class="card-header text-center">
            Số lượng món theo loại
          </div>
          <div class="card-body">
            <canvas id="chartCategory"></canvas>
          </div>
        </div>
      </div>

      <!-- Biểu đồ số lượt gợi ý theo món -->
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <div class="card-header text-center">
            Số lượt gợi ý theo món
          </div>
          <div class="card-body">
            <canvas id="chartSuggestions"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

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