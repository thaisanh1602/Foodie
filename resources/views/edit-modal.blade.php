<div class="modal fade" id="editIngredientModal{{ $ingredient->ingredientID }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title fw-bold"><i class="fas fa-edit me-2"></i>Cập nhật Nguyên liệu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('ingredients.update', $ingredient->ingredientID) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                
                <div class="modal-body p-4">
                    <div class="text-center mb-3">
                        <img src="{{ asset($ingredient->image) }}" class="rounded shadow-sm border" style="width: 100px; height: 100px; object-fit: cover;">
                        <p class="small text-muted mt-1">Ảnh hiện tại</p>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="category_id" class="form-select" id="editCat{{ $ingredient->ingredientID }}" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->categoryID }}" {{ $ingredient->category_id == $category->categoryID ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="editCat{{ $ingredient->ingredientID }}">Danh mục</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="editName{{ $ingredient->ingredientID }}" value="{{ $ingredient->name }}" required>
                        <label for="editName{{ $ingredient->ingredientID }}">Tên nguyên liệu</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted">Đổi ảnh mới (Nếu cần)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <div class="form-floating">
                        <textarea name="description" class="form-control" id="editDesc{{ $ingredient->ingredientID }}" style="height: 100px">{{ $ingredient->description }}</textarea>
                        <label for="editDesc{{ $ingredient->ingredientID }}">Mô tả</label>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-warning px-4">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>