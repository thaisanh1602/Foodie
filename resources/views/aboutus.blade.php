<!doctype html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Về chúng tôi</title>
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

<section class="about-banner d-flex align-items-center justify-content-center text-center text-white relative">
    <div class="overlay-dark"></div>
    <div class="content position-relative z-2">
        <h1 class="display-3 fw-bold animate__animated animate__fadeInDown">Câu Chuyện Của Foodie</h1>
        <p class="lead animate__animated animate__fadeInUp">Kết nối đam mê - Chia sẻ hương vị</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center bg-transparent p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Trang chủ</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Về chúng tôi</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="image-stack">
                    <img src="{{ asset('images/about-1.jpg') }}" alt="Cooking" class="img-fluid rounded-4 shadow-lg img-main">
                    <img src="{{ asset('images/about-2.jpg') }}" alt="Food" class="img-fluid rounded-4 shadow border border-4 border-white img-small position-absolute d-none d-md-block">
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h6 class="text-warning fw-bold text-uppercase ls-2">Về Foodie</h6>
                <h2 class="fw-bold mb-4">Không Chỉ Là Món Ăn, <br>Đó Là Phong Cách Sống</h2>
                <p class="text-muted mb-4">
                    Foodie được thành lập bởi nhóm sinh viên VKU với một niềm tin đơn giản: "Ai cũng có thể nấu ăn ngon". Chúng tôi hiểu rằng trong cuộc sống bận rộn, câu hỏi "Hôm nay ăn gì?" luôn là một vấn đề nan giải.
                </p>
                <p class="text-muted">
                    Sứ mệnh của Foodie là trở thành người bạn đồng hành trong gian bếp của bạn, cung cấp những công thức nấu ăn đa dạng, dễ làm và đầy đủ dinh dưỡng.
                </p>
                
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box bg-light text-warning rounded-circle me-3">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="fw-medium">Công thức chuẩn</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box bg-light text-warning rounded-circle me-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="fw-medium">Cộng đồng sẻ chia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4 mb-md-0">
                <h2 class="fw-bold text-warning display-4">5K+</h2>
                <p class="text-muted fw-medium">Công thức món ăn</p>
            </div>
            <div class="col-md-3 col-6 mb-4 mb-md-0">
                <h2 class="fw-bold text-warning display-4">10K+</h2>
                <p class="text-muted fw-medium">Thành viên</p>
            </div>
            <div class="col-md-3 col-6">
                <h2 class="fw-bold text-warning display-4">500+</h2>
                <p class="text-muted fw-medium">Bài viết chia sẻ</p>
            </div>
            <div class="col-md-3 col-6">
                <h2 class="fw-bold text-warning display-4">24/7</h2>
                <p class="text-muted fw-medium">Hỗ trợ nhiệt tình</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h6 class="text-warning fw-bold text-uppercase">Liên Hệ</h6>
            <h2 class="fw-bold">Ghé Thăm Chúng Tôi</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <div class="d-flex align-items-start mb-4">
                        <div class="icon-square bg-warning text-white rounded-3 me-3 flex-shrink-0">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Địa chỉ</h5>
                            <p class="text-muted mb-0">Trường CNTT & TT Việt Hàn (VKU)<br>470 Trần Đại Nghĩa, Đà Nẵng</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="icon-square bg-warning text-white rounded-3 me-3 flex-shrink-0">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Email</h5>
                            <p class="text-muted mb-0">contact@foodie.vn<br>support@foodie.vn</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="icon-square bg-warning text-white rounded-3 me-3 flex-shrink-0">
                            <i class="fas fa-phone-alt fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold">Hotline</h5>
                            <p class="text-muted mb-0">+84 905 123 456<br>0236 333 444</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="map-container rounded-4 overflow-hidden shadow-sm h-100">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.733297551574!2d108.2497800750041!3d15.975298284690494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buH - Hw6Bu!5e0!3m2!1svi!2s!4v1700000000000!5m2!1svi!2s" 
                        width="100%" 
                        height="100%" 
                        style="border:0; min-height: 400px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
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