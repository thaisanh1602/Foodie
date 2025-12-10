<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = DB::table('ingredients')
            ->leftJoin('categories', 'ingredients.category_id', '=', 'categories.categoryID')
            ->select('ingredients.*', 'categories.name as category_name')
            ->get();

        // 2. Lấy danh sách danh mục (ĐÂY LÀ DÒNG BẠN ĐANG THIẾU)
        // Biến này để hiển thị trong <select> modal
        $categories = DB::table('categories')->get();

        // 3. Truyền cả 2 biến sang view
        $user = User::where('id', Auth::id())->get()->first();
        return view('ingredientmanage', compact('ingredients', 'categories', 'user'));
    }

    public function suggestingredient()
    {
        $ingredients = DB::table('ingredients')
            ->leftJoin('categories', 'ingredients.category_id', '=', 'categories.categoryID')
            ->select('ingredients.*', 'categories.name as category_name')
            ->get();

        // 2. Lấy danh sách danh mục (ĐÂY LÀ DÒNG BẠN ĐANG THIẾU)
        // Biến này để hiển thị trong <select> modal
        $categories = DB::table('categories')->get();

        // 3. Truyền cả 2 biến sang view
        $user = User::where('id', Auth::id())->get()->first();
        return view('goiy', compact('ingredients', 'categories', 'user'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
