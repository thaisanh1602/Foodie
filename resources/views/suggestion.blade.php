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

    .card-container {
    border: 2px solid #ddd; 
    border-radius: 15px;    
    padding: 15px;          
    background-color: #f8f9fa; 
}

    .selectable-card {
    border: 2px solid #ddd;
    border-radius: 10px;
    cursor: pointer;
    background-color: #fff;
    transition: 0.2s;
}

.selectable-card.selected {
    border-color: #28a745 !important;
    background-color: #e9fbe9 !important;
}

.selectable-card input[type="checkbox"] {
    display: none;
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
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="m-0">Danh sách nguyên liệu</h2>

    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addIngredientModal">
        Thêm mới
    </a>
</div>

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


    <!--Xu ly goi nguyen lieu-->
    <div class="card-container row g-4">
      @foreach($ingredients as $ingredient)
      <div class="col-md-2 mb-2">
        <div class="card selectable-card" id="card-{{ $ingredient->ingredientID }}">
          <input type="checkbox" name="ingredients[]" value="{{ $ingredient->name }}">

          <img src="{{ asset($ingredient->image) }}"
            class="card-img-top img-fluid"
            alt="Món ăn"
            style="width:auto; height:160px; object-fit:cover;">

          <div class="card-body">
            <h5 class="card-title">{{ $ingredient->name }}</h5>
            <p class="card-text">{{ $ingredient->description }}</p>

            <a class="btn btn-warning mt-2 w-100 text-white"
              data-bs-toggle="modal"
              data-bs-target="#editIngredientModal{{ $ingredient->ingredientID }}">Sửa</a>

            <form action="{{ route('ingredients.destroy', $ingredient->ingredientID) }}"
              method="POST">
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

  <section>
    @include('goiy')
  </section>
  
  <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>

  <script>
document.querySelectorAll('.selectable-card').forEach(card => {
    card.addEventListener('click', (e) => {

        // Khi nhấn vào checkbox thì không trigger lên card
        if (e.target.type === "checkbox") {
            e.stopPropagation();
            return;
        }

        // Không đổi màu khi bấm vào các nút khác
        if (e.target.tagName === "A" || e.target.tagName === "BUTTON" || e.target.closest("form button")) {
            return;
        }

        // Toggle màu card
        card.classList.toggle('selected');

        let checkbox = card.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;
    });
});
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>