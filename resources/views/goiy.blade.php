<form action="{{ route('foods.suggest') }}" method="POST">
    @csrf
    <h3>Chọn nguyên liệu:</h3>

    <div class="card-container row g-4">
    @foreach ($ingredients as $ing)
        <div class="col-2 col-md-4 col-lg-2">
            <div class="card h-100 text-center p-2">

                <!-- Hình minh họa -->
                <img src="{{ asset($ing->image) }}"
                     class="card-img-top img-fluid rounded"
                     style="height: 100px; object-fit: cover;"
                     alt="{{ $ing->name }}">

                <div class="card-body p-2">
                    <h6 class="card-title mb-2">{{ $ing->name }}</h6>

                    <!-- Checkbox Bootstrap -->
                    <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox"
                               name="ingredients[]" value="{{ $ing->name }}"
                               id="i{{ $ing->ingredientID }}">
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

    <button class="btn btn-success mt-3">Gợi ý món ăn</button>
</form>
 <div>
    @include('layouts.footer')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>