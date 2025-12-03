<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $foods = DB::table('foods')
            ->join('categories', 'foods.categoryID', '=', 'categories.categoryID')
            ->select('foods.*', 'categories.name as categoryName')
            ->get();

        return view('foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $categories = DB::table('categories')->get();

        return view('foods.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'categoryID' => 'required',
        ]);

        DB::table('foods')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'categoryID' => $request->categoryID,
            'instructions' => $request->instructions,
        ]);

        return redirect()->route('foods.index')->with('success', 'Thêm món ăn thành công');
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
         $food = DB::table('foods')->where('foodID', $id)->first();
        $categories = DB::table('categories')->get();

        return view('foods.edit', compact('food', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'categoryID' => 'required',
        ]);

        DB::table('foods')
            ->where('foodID', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $request->image,
                'categoryID' => $request->categoryID,
                'instructions' => $request->instructions,
            ]);

        return redirect()->route('foods.index')->with('success', 'Cập nhật món ăn thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         DB::table('foods')->where('foodID', $id)->delete();

        return redirect()->route('foods.index')->with('success', 'Xóa món ăn thành công');
    }
}
