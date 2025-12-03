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
        $ingredients = DB::table('ingredients')->get();
        return view('suggestion', compact('ingredients'));
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
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'nullable',
    ]);

    if ($request->hasFile('image')) {

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Lưu vào public/images
        $file->move(public_path('images'), $fileName);

        $imagePath = 'images/' . $fileName;   // Lưu đường dẫn vào DB
    }

    DB::table('ingredients')->insert([
        'name' => $request->name,
        'image' => $imagePath,
        'description' => $request->description
    ]);

    return redirect()->back()->with('success', 'Thêm nguyên liệu thành công!');
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
        return view('ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
        'name' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'nullable',
    ]);

    $data = [
        'name' => $request->name,
        'description' => $request->description,
    ];

    if ($request->hasFile('image')) {

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Lưu ảnh mới
        $file->move(public_path('images'), $fileName);

        $data['image'] = 'images/' . $fileName;
    }

    DB::table('ingredients')->where('ingredientID', $id)->update($data);

    return redirect()->back()->with('success', 'Cập nhật nguyên liệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('ingredients')->where('ingredientID', $id)->delete();

        return redirect()->route('ingredients.index')->with('success', 'Xóa nguyên liệu thành công');
    }
}
