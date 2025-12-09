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

  @if($categories->isEmpty())
    <div class="alert alert-warning">
        Bạn chưa có danh mục nào. 
        <a href="{{ route('categories.index') }}" class="fw-bold">Bấm vào đây để tạo danh mục trước</a> 
        rồi mới thêm nguyên liệu nhé!
    </div>
@else
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addIngredientModal">
        Thêm Nguyên Liệu Mới
    </button>
@endif

<a href="{{ route('categories.index') }}" class="btn btn-success" >
        Quản lý danh mục
</a>

  <!-- Them sua xoa mon an -->
 <section class="container my-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0 fw-bold">Danh sách nguyên liệu</h2>
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addIngredientModal">
            + Thêm mới
        </a>
    </div>

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
                            <label class="form-label fw-bold">Loại nguyên liệu <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select" required>
                                <option value="" selected disabled>-- Chọn loại --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->categoryID }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên nguyên liệu</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hình ảnh</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
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
    @foreach($categories as $category)
        
        @php
            // Lọc các nguyên liệu thuộc danh mục hiện tại
            // Lưu ý: so sánh category_id của nguyên liệu với categoryID của danh mục
            $groupIngredients = $ingredients->where('category_id', $category->categoryID);
        @endphp

        @if($groupIngredients->count() > 0)
            <div class="category-group mb-5">
                
                <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                    <h3 class="text-primary m-0">{{ $category->name }}</h3>
                    <span class="badge bg-secondary ms-2 rounded-pill">{{ $groupIngredients->count() }}</span>
                </div>

                <div class="row g-4"> 
                    @foreach($groupIngredients as $ingredient)
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card selectable-card h-100 shadow-sm" id="card-{{ $ingredient->ingredientID }}">
                                <input type="checkbox" name="ingredients[]" value="{{ $ingredient->name }}">

                                <div style="height: 150px; overflow: hidden;">
                                    <img src="{{ asset($ingredient->image) }}" 
                                         class="card-img-top w-100 h-100" 
                                         style="object-fit: cover;"
                                         alt="{{ $ingredient->name }}">
                                </div>

                                <div class="card-body p-2">
                                    <h6 class="card-title fw-bold text-truncate">{{ $ingredient->name }}</h6>
                                    
                                    <div class="mt-2 row g-1">
                                        <div class="col-12">
                                            <a class="btn btn-warning btn-sm w-100 text-white"
                                               data-bs-toggle="modal"
                                               data-bs-target="#editIngredientModal{{ $ingredient->ingredientID }}">
                                               Sửa
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <form action="{{ route('ingredients.destroy', $ingredient->ingredientID) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm w-100" type="submit">Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    @endforeach

    @php
        $uncategorized = $ingredients->where('category_id', null);
    @endphp

    @if($uncategorized->count() > 0)
        <div class="category-group mb-5">
            <h3 class="text-secondary border-bottom pb-2 mb-3">Chưa phân loại</h3>
            <div class="row g-4">
                @foreach($uncategorized as $ingredient)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card selectable-card h-100">
                            <input type="checkbox" name="ingredients[]" value="{{ $ingredient->name }}">
                            <img src="{{ asset($ingredient->image) }}" class="card-img-top" style="height:150px; object-fit: cover;">
                            <div class="card-body p-2">
                                <h6 class="card-title fw-bold">{{ $ingredient->name }}</h6>
                                <div class="mt-2">
                                     <a class="btn btn-warning btn-sm w-100 text-white mb-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editIngredientModal{{ $ingredient->ingredientID }}">Sửa</a>
                                     
                                     <form action="{{ route('ingredients.destroy', $ingredient->ingredientID) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm w-100">Xóa</button>
                                     </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</section>


 @foreach ($ingredients as $ingredient)

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
            <label class="form-label fw-bold">Loại nguyên liệu</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Chọn loại --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->categoryID }}" 
                        {{-- Kiểm tra để tự động chọn đúng danh mục cũ --}}
                        {{ $ingredient->category_id == $category->categoryID ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Tên nguyên liệu</label>
            <input type="text" name="name" class="form-control"
              value="{{ $ingredient->name }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Hình ảnh hiện tại</label><br>
            <img src="{{ asset($ingredient->image) }}" width="100" class="rounded mb-2 img-fluid border">
          </div>

          <div class="mb-3">
            <label class="form-label">Chọn hình ảnh mới (nếu muốn đổi)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
          </div>
          
          <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control" rows="3">{{ $ingredient->description }}</textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn btn-warning" type="submit">Cập nhật</button>
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