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
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
  <!--Header-->
  <div>
    @include('layouts.header')
  </div>

  <!-- Background image -->
<div id="foodieCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#foodieCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#foodieCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#foodieCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="overlay-dark"></div> <img src="{{ asset('images/homepage1.jpg') }}" class="d-block w-100 vh-80 object-fit-cover" alt="Món ngon">
            <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInUp">
                <h2 class="display-4 fw-bold text-warning shadow-text">Món Ngon Mỗi Ngày</h2>
                <p class="fs-4">Hôm nay ăn gì? Khám phá ngay thực đơn đa dạng!</p>
                <a href="#" class="btn btn-warning btn-lg rounded-pill px-5 fw-bold mt-3">Khám phá ngay</a>
            </div>
        </div>

        <div class="carousel-item">
            <div class="overlay-dark"></div>
            <img src="{{ asset('images/homepage2.jpg') }}" class="d-block w-100 vh-80 object-fit-cover" alt="Tiện lợi">
            <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInUp">
                <h2 class="display-4 fw-bold text-warning shadow-text">Tiện Lợi & Nhanh Chóng</h2>
                <p class="fs-4">Bí ý tưởng? Để Foodie gợi ý giúp bạn chỉ trong 1 nốt nhạc.</p>
                <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-5 fw-bold mt-3">Xem gợi ý</a>
            </div>
        </div>

        <div class="carousel-item">
            <div class="overlay-dark"></div>
            <img src="{{ asset('images/homepage3.jpg') }}" class="d-block w-100 vh-80 object-fit-cover" alt="Đa dạng">
            <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInUp">
                <h2 class="display-4 fw-bold text-warning shadow-text">Ẩm Thực Đa Dạng</h2>
                <p class="fs-4">Kết nối đam mê, chia sẻ công thức nấu ăn độc đáo.</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#foodieCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#foodieCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
    </button>
</div>

<section class="py-5 text-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <span class="text-warning fw-bold text-uppercase">Chào mừng bạn đến với Foodie</span>
                <h1 class="mb-3 mt-2 fw-bold text-dark">Nấu Ăn Là Một Nghệ Thuật</h1>
                <p class="text-muted lead mb-4">
                    "Bữa ăn tuyệt vời không phải là ngẫu nhiên, đó là sự lựa chọn!" <br>
                    Hãy để chúng tôi giúp bạn biến những nguyên liệu đơn giản thành kiệt tác ẩm thực.
                </p>
                <a class="btn btn-dark rounded-pill px-4 py-2" href="#">Bắt đầu hành trình <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Khám Phá Nguyên Liệu</h2>
            <div class="divider mx-auto bg-warning"></div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 border-0 shadow-sm card-hover overflow-hidden">
                    <div class="img-wrapper">
                        <img src="{{ asset('images/vegetables.jpg') }}" class="card-img-top" alt="Rau củ">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Rau Củ Quả</h5>
                        <p class="card-text text-muted small">Tươi ngon, giàu vitamin cho bữa ăn healthy.</p>
                        <a href="#" class="btn btn-sm btn-outline-warning rounded-pill px-3">Xem thêm</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm card-hover overflow-hidden">
                    <div class="img-wrapper">
                        <img src="{{ asset('images/meat.jpg') }}" class="card-img-top" alt="Thịt">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Thịt Tươi Sống</h5>
                        <p class="card-text text-muted small">Nguồn protein chất lượng cao cho năng lượng mỗi ngày.</p>
                        <a href="#" class="btn btn-sm btn-outline-warning rounded-pill px-3">Xem thêm</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm card-hover overflow-hidden">
                    <div class="img-wrapper">
                        <img src="{{ asset('images/fish.jpg') }}" class="card-img-top" alt="Hải sản">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Hải Sản & Cá</h5>
                        <p class="card-text text-muted small">Hương vị biển cả tươi mới trong từng món ăn.</p>
                        <a href="#" class="btn btn-sm btn-outline-warning rounded-pill px-3">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>