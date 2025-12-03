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
  <!--Header-->
  <div>
    @include('layouts.header')
  </div>

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
                <img src="{{ asset('images/vegetables.jpg') }}" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Rau củ quả</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{ asset('images/meat.jpg') }}" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Thịt</h5>
                  <p class="card-text">This is a short card.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="{{ asset('images/fish.jpg') }}" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
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

  <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>