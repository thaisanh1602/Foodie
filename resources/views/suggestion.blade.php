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

  <!--Header-->
  <div>
    @include('layouts.header')
  </div>

  <section class="hero">
    <div class="container">
      <h1 class="display-5">Biến nguyên liệu sẵn có thành bữa ăn ngon!</h1>
      <p class="lead">Khám phá hàng trăm công thức dễ làm ngay hôm nay</p>
    </div>
  </section>
  <!-- Search Section -->
  <section class="py-4 bg-light">
    <div class="container">
      <form class="d-flex" role="search">
        <input
          class="form-control me-2 "
          type="search"
          placeholder="Tìm món ăn..."
          aria-label="Search"
          style="max-width: 400px;" />
        <button class="btn btn-success" type="submit">
          Tìm
        </button>
      </form>
    </div>
  </section>

  <!-- Filter Section -->
  <section class="filter-section container">
    <h3>Lọc món ăn</h3>
    <div class="row g-3">
      <div class="col-md-4">
        <select class="form-select">
          <option selected>Chọn loại món</option>
          <option>Món chính</option>
          <option>Món phụ</option>
          <option>Tráng miệng</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select">
          <option selected>Chọn nguyên liệu</option>
          <option>Thịt</option>
          <option>Rau củ</option>
          <option>Hải sản</option>
        </select>
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary w-100">Áp dụng lọc</button>
      </div>
    </div>
  </section>

  <!-- Them sua xoa mon an -->
  <section class="container my-5">
    <h2>Danh sách nguyên liệu</h2>
    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addIngredientModal">Thêm mới</a>

    <!-- Modal Thêm Nguyên Liệu -->
    <div class="modal fade" id="addIngredientModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Thêm Nguyên Liệu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <form action="{{ route('ingredients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">

              <div class="mb-3">
                <label class="form-label">Tên nguyên liệu</label>
                <input type="text" name="name" class="form-control"
                  placeholder="Nhập tên nguyên liệu..." required>
              </div>

              <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3"
                  placeholder="Nhập mô tả..."></textarea>
              </div>

            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Lưu</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>

          </form>

        </div>
      </div>
    </div>


    <h3>Món gợi ý cho bạn</h3>
    <div class="row g-4">
      <!-- Card -->
      @foreach($ingredients as $ingredient)
      <div class="col-md-3">
        <div class="card food-card">
          <img src="{{ asset($ingredient->image) }} " class="card-img-top img-fluid" alt="Món ăn" style="width:auto; height:160px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $ingredient->name }}</h5>
            <p class="card-text">{{ $ingredient->description }}</p>
            <a href="#" class="btn btn-success w-100">Xem công thức</a>
            <a class="btn btn-warning mt-2 w-100 text-white" data-bs-toggle="modal" data-bs-target="#editIngredientModal{{ $ingredient->ingredientID }}">Sửa</a>
            <form action="{{ route('ingredients.destroy', $ingredient->ingredientID) }}" method="POST">
              @csrf @method('DELETE')
              <button class="btn btn-danger mt-2 w-100" type="submit">Xóa</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>


  @foreach ($ingredients as $ingredient)

  <!-- Modal Sửa -->
  <div class="modal fade" id="editIngredientModal{{ $ingredient->ingredientID }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title">Sửa Nguyên Liệu</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{ route('ingredients.update', $ingredient->ingredientID) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="modal-body">

            <div class="mb-3">
              <label class="form-label">Tên nguyên liệu</label>
              <input type="text" name="name" class="form-control"
                value="{{ $ingredient->name }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Hình ảnh hiện tại</label><br>
              <img src="{{ asset($ingredient->image) }}" width="75" class="rounded mb-2 img-fluid">
            </div>

            <div class="mb-3">
              <label class="form-label">Chọn hình ảnh mới</label>
              <input type="file" name="image" class="form-control" accept="image/*" method="POST" enctype="multipart/form-data">
              <small class="text-muted">Để trống nếu không muốn đổi ảnh</small>
            </div>
            <div class="mb-3">
              <label class="form-label">Mô tả</label>
              <textarea name="description" class="form-control" rows="3">{{ $ingredient->description }}</textarea>
            </div>

          </div>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Cập nhật</button>
            <button class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  @endforeach



  <!-- Food Suggestions Section -->
  <section class="container my-5">
    <h3>Món gợi ý cho bạn</h3>
    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="card food-card">
          <img src="https://source.unsplash.com/400x300/?pasta" class="card-img-top" alt="Món ăn">
          <div class="card-body">
            <h5 class="card-title">Mỳ Ý sốt bò bằm</h5>
            <p class="card-text">⏱ 30 phút | 🟢 Dễ</p>
            <a href="#" class="btn btn-success w-100">Xem công thức</a>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="card food-card">
          <img src="https://source.unsplash.com/400x300/?salad" class="card-img-top" alt="Món ăn">
          <div class="card-body">
            <h5 class="card-title">Salad rau củ tươi</h5>
            <p class="card-text">⏱ 15 phút | 🟢 Rất dễ</p>
            <a href="#" class="btn btn-success w-100">Xem công thức</a>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="card food-card">
          <img src="https://source.unsplash.com/400x300/?dessert" class="card-img-top" alt="Món ăn">
          <div class="card-body">
            <h5 class="card-title">Bánh flan caramen</h5>
            <p class="card-text">⏱ 40 phút | 🟡 Trung bình</p>
            <a href="#" class="btn btn-success w-100">Xem công thức</a>
          </div>
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