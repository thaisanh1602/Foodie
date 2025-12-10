@extends('layouts.main')

@section('title', 'Quản lý nguyên liệu')

@section('content')
<div class="container py-5">

    {{-- 1. HEADER & SEARCH --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5 gap-3">
        <div>
            <h2 class="fw-bold text-dark mb-1">Quản Lý Nguyên Liệu</h2>
            <p class="text-muted mb-0">Danh sách nguyên liệu được phân loại theo nhóm.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-list me-2"></i>Quản lý Danh mục
            </a>
            <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#addIngredientModal">
                <i class="fas fa-plus me-2"></i>Thêm Nguyên liệu
            </button>
        </div>
    </div>

    <div class="bg-light p-4 rounded-4 mb-5 shadow-sm">
        <form class="d-flex gap-2" role="search">
            <input class="form-control form-control-lg border-0 shadow-sm" type="search" placeholder="Tìm nhanh nguyên liệu..." aria-label="Search">
            <button class="btn btn-dark px-4" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    {{-- 2. HIỂN THỊ DANH SÁCH --}}
    @if($categories->isEmpty())
        <div class="text-center py-5">
            <h4>Chưa có danh mục nào!</h4>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Tạo danh mục ngay</a>
        </div>
    @else
        
        {{-- Vòng lặp Categories --}}
        @foreach($categories as $category)
            @php
                $groupIngredients = $ingredients->where('category_id', $category->categoryID);
            @endphp

            @if($groupIngredients->count() > 0)
            <div class="category-section mb-5 animate__animated animate__fadeIn">
                <div class="d-flex align-items-center mb-4">
                    <h3 class="fw-bold text-dark m-0 border-start border-4 border-warning ps-3">{{ $category->name }}</h3>
                    <span class="badge bg-light text-secondary border ms-3 rounded-pill">{{ $groupIngredients->count() }} món</span>
                </div>

                <div class="row g-4">
                    @foreach($groupIngredients as $ingredient)
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="card h-100 border-0 shadow-sm hover-card">
                                <div class="position-relative overflow-hidden rounded-top-3" style="height: 160px;">
                                    <img src="{{ asset($ingredient->image) }}" class="w-100 h-100 object-fit-cover transition-zoom" alt="{{ $ingredient->name }}">
                                </div>
                                <div class="card-body text-center p-3">
                                    <h6 class="fw-bold text-truncate mb-3" title="{{ $ingredient->name }}">{{ $ingredient->name }}</h6>
                                    <div class="d-flex gap-2 justify-content-center">
                                        {{-- Nút Sửa: Chỉ cần trỏ đúng ID --}}
                                        <button class="btn btn-sm btn-light text-warning border" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editIngredientModal{{ $ingredient->ingredientID }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        
                                        <form action="{{ route('ingredients.destroy', $ingredient->ingredientID) }}" method="POST" onsubmit="return confirm('Xóa nguyên liệu này?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger border">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr class="text-muted opacity-25 my-5">
            @endif
        @endforeach

        {{-- Phần chưa phân loại --}}
        @php $uncategorized = $ingredients->where('category_id', null); @endphp
        @if($uncategorized->count() > 0)
            <div class="category-section mb-5">
                <h3 class="fw-bold text-secondary mb-4 ps-3 border-start border-4 border-secondary">Chưa phân loại</h3>
                <div class="row g-4">
                    @foreach($uncategorized as $ingredient)
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="card h-100 border-0 shadow-sm bg-light">
                                <div class="position-relative overflow-hidden rounded-top-3" style="height: 160px;">
                                    <img src="{{ asset($ingredient->image) }}" class="w-100 h-100 object-fit-cover grayscale-img">
                                </div>
                                <div class="card-body text-center p-3">
                                    <h6 class="fw-bold text-truncate mb-3">{{ $ingredient->name }}</h6>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <button class="btn btn-sm btn-white border" data-bs-toggle="modal" data-bs-target="#editIngredientModal{{ $ingredient->ingredientID }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        {{-- Form xóa... --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
</div>

{{-- 3. KHU VỰC ĐẶT MODAL (ĐẶT NGOÀI CÙNG, KHÔNG LỒNG TRONG CARD) --}}

<div class="modal fade" id="addIngredientModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">Thêm Nguyên Liệu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('ingredients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    {{-- Nội dung form thêm --}}
                    <div class="mb-3">
                        <label>Danh mục</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Chọn danh mục</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->categoryID }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Ảnh</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($ingredients as $ingredient)
<div class="modal fade" id="editIngredientModal{{ $ingredient->ingredientID }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title">Sửa: {{ $ingredient->name }}</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('ingredients.update', $ingredient->ingredientID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Loại nguyên liệu</label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->categoryID }}" {{ $ingredient->category_id == $category->categoryID ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tên</label>
                        <input type="text" name="name" class="form-control" value="{{ $ingredient->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Ảnh hiện tại:</label>
                        <img src="{{ asset($ingredient->image) }}" width="50">
                        <input type="file" name="image" class="form-control mt-2">
                    </div>
                    <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control">{{ $ingredient->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection