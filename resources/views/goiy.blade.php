@extends('layouts.suggestion')

@section('content')

{{-- 1. CSS TÙY CHỈNH --}}
<style>
    /* Ẩn checkbox mặc định */
    .ingredient-check-input {
        display: none;
    }

    /* Style cho Card nguyên liệu */
    .ingredient-card {
        border: 2px solid transparent; /* Viền trong suốt mặc định */
        background: #fff;
        transition: all 0.25s ease;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    /* Hiệu ứng khi hover */
    .ingredient-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }

    /* TRẠNG THÁI ĐƯỢC CHỌN (Quan trọng) */
    .ingredient-check-input:checked + .ingredient-card {
        border-color: #198754; /* Viền xanh lá */
        background-color: #f0fdf4; /* Nền xanh nhạt */
        box-shadow: 0 4px 12px rgba(25, 135, 84, 0.2) !important;
    }

    /* Dấu tích xanh */
    .check-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #198754;
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        opacity: 0; /* Ẩn mặc định */
        transform: scale(0.5);
        transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    /* Hiện dấu tích khi chọn */
    .ingredient-check-input:checked + .ingredient-card .check-icon {
        opacity: 1;
        transform: scale(1);
    }

    /* Ảnh nguyên liệu */
    .ing-img-container {
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .ing-img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }
</style>

<div class="container py-5">
    
    {{-- HEADER --}}
    <div class="text-center mb-5 animate__animated animate__fadeInDown">
        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2 mb-3">
            <i class="fas fa-carrot me-1"></i> Bếp thông minh
        </span>
        <h2 class="fw-bolder display-6 text-dark mb-3">Hôm nay tủ lạnh có gì?</h2>
        <p class="text-muted fs-5" style="max-width: 600px; margin: 0 auto;">
            Chọn những nguyên liệu bạn đang có sẵn, chúng tôi sẽ gợi ý những món ngon tuyệt vời dành cho bạn!
        </p>

        {{-- Thanh tìm kiếm nhanh --}}
        <div class="mt-4 mx-auto" style="max-width: 500px;">
            <div class="input-group shadow-sm rounded-pill overflow-hidden border">
                <span class="input-group-text bg-white border-0 ps-4"><i class="fas fa-search text-muted"></i></span>
                <input type="text" id="quickSearch" class="form-control border-0 py-3" placeholder="Tìm nhanh (ví dụ: Trứng, Thịt...)" autocomplete="off">
            </div>
        </div>
    </div>

    <form action="{{ route('foods.suggest') }}" method="POST">
        @csrf

        {{-- DANH SÁCH NGUYÊN LIỆU --}}
        <div id="ingredientsList">
            @foreach ($ingredients->groupBy('category_name') as $categoryName => $items)
                
                <div class="category-section mb-5 animate__animated animate__fadeInUp">
                    {{-- Tên danh mục --}}
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success rounded-circle me-3" style="width: 8px; height: 8px;"></div>
                        <h4 class="fw-bold text-dark m-0">{{ $categoryName ?: 'Nguyên liệu khác' }}</h4>
                        <span class="ms-3 badge bg-light text-secondary rounded-pill border">{{ count($items) }} loại</span>
                    </div>

                    <div class="row g-3">
                        @foreach ($items as $ing)
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2 search-item" data-name="{{ strtolower($ing->name) }}">
                                
                                {{-- INPUT CHECKBOX ẨN --}}
                                <input type="checkbox" 
                                       class="ingredient-check-input" 
                                       name="ingredients[]" 
                                       value="{{ $ing->name }}" 
                                       id="ing-{{ $ing->ingredientID }}">

                                {{-- LABEL ĐÓNG VAI TRÒ LÀ CARD --}}
                                <label class="card h-100 shadow-sm ingredient-card rounded-4 p-2" for="ing-{{ $ing->ingredientID }}">
                                    
                                    {{-- Dấu tích V (Tuyệt đối) --}}
                                    <div class="check-icon"><i class="fas fa-check"></i></div>

                                    <div class="card-body p-2 text-center">
                                        {{-- Ảnh --}}
                                        <div class="ing-img-container mb-3">
                                            <img src="{{ asset($ing->image) }}" class="ing-img" alt="{{ $ing->name }}">
                                        </div>
                                        
                                        {{-- Tên --}}
                                        <h6 class="fw-bold text-dark mb-0 text-capitalize">{{ $ing->name }}</h6>
                                    </div>
                                </label>

                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        {{-- NÚT SUBMIT NỔI (GLASSMORPHISM) --}}
        <div class="fixed-bottom p-3 text-center" style="background: rgba(255,255,255,0.9); backdrop-filter: blur(10px); border-top: 1px solid rgba(0,0,0,0.05); z-index: 1000;">
            <div class="container d-flex justify-content-between align-items-center" style="max-width: 800px;">
                <div class="text-start d-none d-md-block">
                    <small class="text-muted d-block">Đã chọn</small>
                    <span class="fw-bold text-success fs-5" id="countDisplay">0 nguyên liệu</span>
                </div>
                
                <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 fw-bold shadow-lg hover-scale">
                    Gợi ý món ăn <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
        </div>
        
        {{-- Khoảng trống để không bị nút che mất nội dung cuối --}}
        <div style="height: 100px;"></div>

    </form>
</div>

{{-- JAVASCRIPT XỬ LÝ TÌM KIẾM & ĐẾM SỐ LƯỢNG --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Xử lý tìm kiếm nhanh
        const searchInput = document.getElementById('quickSearch');
        const items = document.querySelectorAll('.search-item');

        searchInput.addEventListener('keyup', function(e) {
            const term = e.target.value.toLowerCase();

            items.forEach(item => {
                const name = item.getAttribute('data-name');
                if(name.includes(term)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });

            // Ẩn tiêu đề danh mục nếu không còn item nào bên trong (Optional - nâng cao)
        });

        // 2. Đếm số lượng đã chọn
        const checkboxes = document.querySelectorAll('.ingredient-check-input');
        const countDisplay = document.getElementById('countDisplay');

        function updateCount() {
            const checkedCount = document.querySelectorAll('.ingredient-check-input:checked').length;
            countDisplay.textContent = checkedCount + " nguyên liệu";
        }

        checkboxes.forEach(box => {
            box.addEventListener('change', updateCount);
        });
    });
</script>

@endsection