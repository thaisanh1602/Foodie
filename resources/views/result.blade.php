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


<h3>Kết quả gợi ý</h3>
@if(!empty($meals))
    <div class="row g-3">
        @foreach($meals as $meal)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $meal['strMealThumb'] }}" class="card-img-top" alt="{{ $meal['strMeal'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $meal['strMeal'] }}</h5>

                        <!-- Nút mở modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mealModal{{ $meal['idMeal'] }}">
                            Xem công thức
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="mealModal{{ $meal['idMeal'] }}" tabindex="-1" aria-labelledby="mealModalLabel{{ $meal['idMeal'] }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mealModalLabel{{ $meal['idMeal'] }}">{{ $meal['strMeal'] }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Nguyên liệu:</h6>
                            <ul>
                                @foreach($meal['ingredientsList'] as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>

                            <h6>Hướng dẫn:</h6>
                            <p style="white-space: pre-line;">{{ $meal['strInstructions'] }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Không tìm thấy món nào phù hợp!</p>
@endif


  <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>