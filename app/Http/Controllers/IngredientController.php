<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hàm này của bạn ĐÃ ĐÚNG. Giữ nguyên.
        $ingredients = DB::table('ingredients')
            ->leftJoin('categories', 'ingredients.category_id', '=', 'categories.categoryID')
            ->select(
                'ingredients.*', 
                'ingredients.category_id', 
                'categories.name as category_name'
            )
            ->get();

        $categories = DB::table('categories')->get();

        return view('suggestion', compact('ingredients', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 1. THÊM VALIDATE DANH MỤC
            'category_id' => 'required|exists:categories,categoryID', 
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable',
        ]);

        $imagePath = null; // Khởi tạo biến để tránh lỗi nếu không có ảnh (dù đã validate required)

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $imagePath = 'images/' . $fileName; 
        }

        DB::table('ingredients')->insert([
            'name' => $request->name,
            // 2. QUAN TRỌNG: LƯU ID DANH MỤC VÀO DB
            'category_id' => $request->category_id, 
            'image' => $imagePath,
            'description' => $request->description
        ]);

        return redirect()->route('suggestion')->with('success', 'Thêm nguyên liệu thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ingredient = DB::table('ingredients')->where('ingredientID', $id)->first();
        // Nếu dùng view edit riêng thì cần truyền cả categories sang nữa
        $categories = DB::table('categories')->get(); 
        return view('ingredients.edit', compact('ingredient', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            // 3. THÊM VALIDATE KHI SỬA
            'category_id' => 'required|exists:categories,categoryID',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable',
        ]);

        $data = [
            'name' => $request->name,
            // 4. QUAN TRỌNG: CẬP NHẬT ID DANH MỤC MỚI
            'category_id' => $request->category_id, 
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $data['image'] = 'images/' . $fileName;
        }

        DB::table('ingredients')->where('ingredientID', $id)->update($data);

        // Đổi redirect về route suggestion để thấy ngay kết quả sau khi sửa
        return redirect()->route('suggestion')->with('success', 'Cập nhật nguyên liệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('ingredients')->where('ingredientID', $id)->delete();
        // Đổi về route suggestion cho đồng bộ
        return redirect()->route('suggestion')->with('success', 'Xóa nguyên liệu thành công');
    }
}