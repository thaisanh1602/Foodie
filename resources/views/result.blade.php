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


@if(!empty($meals))
    <div class="result-section py-4">
        <h4 class="mb-4 fw-bold text-dark border-start border-4 border-warning ps-3">
            <i class="fas fa-utensils me-2 text-warning"></i> Kết quả dành cho bạn
        </h4>

        <div class="row g-4">
            @foreach($meals as $meal)
                <div class="col-md-6 col-lg-4 fade-in-up">
                    <div class="card h-100 border-0 shadow-sm card-meal">
                        
                        <div class="position-relative overflow-hidden rounded-top-3">
                            <img src="{{ $meal['strMealThumb'] }}" 
                                 class="card-img-top meal-img transition-zoom" 
                                 alt="{{ $meal['strMeal'] }}">
                            <div class="overlay-action d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-light rounded-circle shadow btn-lg text-warning" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#mealModal{{ $meal['idMeal'] }}"
                                        title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title fw-bold text-truncate mb-3" title="{{ $meal['strMeal'] }}">
                                {{ $meal['strMeal'] }}
                            </h5>
                            
                            <button type="button" 
                                    class="btn btn-outline-warning rounded-pill mt-auto fw-medium w-100" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#mealModal{{ $meal['idMeal'] }}">
                                Xem công thức <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="mealModal{{ $meal['idMeal'] }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content border-0 overflow-hidden rounded-4">
                            
                            <div class="modal-header border-0 pb-0 absolute-close">
                                <button type="button" class="btn-close bg-white p-2 rounded-circle shadow-sm opacity-100" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body p-0">
                                <div class="row g-0 h-100">
                                    <div class="col-lg-5 bg-light border-end">
                                        <div class="p-0 position-relative">
                                            <img src="{{ $meal['strMealThumb'] }}" class="w-100 object-fit-cover" style="height: 300px;" alt="{{ $meal['strMeal'] }}">
                                            <div class="p-4">
                                                <h3 class="fw-bold text-dark mb-3">{{ $meal['strMeal'] }}</h3>
                                                <h6 class="text-uppercase text-warning fw-bold mb-3">
                                                    <i class="fas fa-carrot me-2"></i> Nguyên liệu
                                                </h6>
                                                
                                                <ul class="list-group list-group-flush rounded-3">
                                                    @foreach($meal['ingredientsList'] as $item)
                                                        <li class="list-group-item bg-transparent d-flex align-items-center px-0 py-2 border-bottom-dashed">
                                                            <i class="fas fa-check-circle text-success me-3"></i>
                                                            <span class="fw-medium text-secondary">{{ $item }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-7">
                                        <div class="p-4 h-100 overflow-auto">
                                            <h6 class="text-uppercase text-warning fw-bold mb-3 sticky-top bg-white py-2">
                                                <i class="fas fa-book-open me-2"></i> Hướng dẫn chế biến
                                            </h6>
                                            
                                            <div class="instruction-text text-secondary lh-lg" style="text-align: justify;">
                                                {!! nl2br(e($meal['strInstructions'])) !!}
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p class="text-muted fst-italic small">Chúc bạn thành công với món ăn này!</p>
                                                <button type="button" class="btn btn-dark rounded-pill px-4" data-bs-dismiss="modal">Đóng cửa sổ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="text-center py-5 animate__animated animate__fadeIn">
        <div class="mb-3">
            <i class="fas fa-search fa-4x text-muted opacity-25"></i>
        </div>
        <h4 class="fw-bold text-secondary">Rất tiếc, không tìm thấy món phù hợp!</h4>
        <p class="text-muted">Hãy thử chọn lại các nguyên liệu khác xem sao nhé.</p>
        <a href="{{ route('suggest.ingredient') }}" class="btn btn-warning rounded-pill px-4 text-white">
            <i class="fas fa-redo me-2"></i> Chọn lại
        </a>
    </div>
@endif


  <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>