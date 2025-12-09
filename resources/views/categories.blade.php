<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
      <!--Header-->
  <div>
    @include('layouts.header')
  </div>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Danh sách Danh mục</h1>
            <div>
                <a href="{{ route('suggestion') }}" class="btn btn-secondary">Quay lại</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    + Thêm Danh mục
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th width="150">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->categoryID }}</td>
                    <td><strong>{{ $cat->name }}</strong></td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $cat->categoryID) }}" class="btn btn-sm btn-warning">Sửa</a>
                        
                        <form action="{{ route('categories.destroy', $cat->categoryID) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Danh mục mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="Ví dụ: Đồ ăn nhanh">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>