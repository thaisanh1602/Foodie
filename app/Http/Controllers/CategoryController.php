<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Nhớ dòng này để dùng DB::table
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Hiển thị danh sách danh mục
     */
    public function index()
    {
        // Lấy tất cả danh mục từ bảng categories
        $categories = DB::table('categories')->get();
        $user = User::where('id', Auth::id())->get()->first();
        // Trả về view quản lý danh mục (bạn cần tạo file view này)
        return view('categories', compact('categories', 'user'));
    }

    /**
     * Hiển thị form tạo mới (Nếu bạn dùng Modal thì hàm này có thể bỏ qua)
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Lưu danh mục mới vào database
     */
    public function store(Request $request)
    {
        // 1. Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
        ]);

        // 2. Insert vào database
        DB::table('categories')->insert([
            'name' => $request->name,
            'description' => $request->description,
            // Nếu bảng có timestamps thì thêm:
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ]);

        // 3. Quay lại trang danh sách với thông báo thành công
        return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    /**
     * Hiển thị chi tiết (Thường ít dùng)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Hiển thị form sửa danh mục
     */
    public function edit(string $id)
    {
        // Lấy thông tin danh mục cần sửa
        $category = DB::table('categories')->where('categoryID', $id)->first();

        // Kiểm tra nếu không tìm thấy
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Danh mục không tồn tại');
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Cập nhật danh mục
     */
    public function update(Request $request, string $id)
    {
        // 1. Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // 2. Update dữ liệu
        DB::table('categories')
            ->where('categoryID', $id) // Quan trọng: Khóa chính là categoryID
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                // 'updated_at' => now(),
            ]);

        return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Xóa danh mục
     */
    public function destroy(string $id)
    {
        // Xóa danh mục theo ID
        DB::table('categories')->where('categoryID', $id)->delete();

        return redirect()->route('categories.index')->with('success', 'Đã xóa danh mục!');
    }
}
