<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

        $ingredients = DB::table('ingredients')->get();
         return view('suggestion', compact('ingredients'));
    }

    public function suggestByIngredients(Request $request)
{
    $request->validate([
        'ingredients' => 'required|array|min:1'
    ]);

    $selectedIngredientIds = $request->ingredients;

    // Lấy tên nguyên liệu đã chọn
    $selectedIngredients = DB::table('ingredients')
        ->whereIn('ingredientID', $selectedIngredientIds)
        ->pluck('name')
        ->map(fn($name) => strtolower(trim($name)))
        ->toArray();

    $allMeals = collect(); // Dùng collection để dễ xử lý

    // Gọi API cho từng nguyên liệu
    foreach ($selectedIngredients as $ingredient) {
        $response = Http::get('https://www.themealdb.com/api/json/v1/1/filter.php', [
            'i' => $ingredient
        ]);

        if ($response->successful() && !empty($response->json()['meals'])) {
            $meals = collect($response->json()['meals']);

            // Gắn thêm điểm số: món này có chứa nguyên liệu này
            $meals = $meals->map(function ($meal) use ($ingredient) {
                $meal['matched_ingredients'] = [$ingredient];
                $meal['match_count'] = 1;
                return $meal;
            });

            $allMeals = $allMeals->merge($meals);
        }
    }

    if ($allMeals->isEmpty()) {
        $meals = [];
        $selectedIngredientsList = $selectedIngredients;
    } else {
        // Nhóm theo idMeal để tránh trùng, và tính số nguyên liệu khớp
        $grouped = $allMeals->groupBy('idMeal');

        $meals = $grouped->map(function ($items) {
            $first = $items->first();
            $matched = $items->pluck('matched_ingredients')->flatten()->unique()->values();
            $first['match_count'] = $matched->count();
            $first['matched_ingredients'] = $matched->toArray();
            return $first;
        })->sortByDesc('match_count') // Ưu tiên món khớp nhiều nguyên liệu nhất
          ->take(12) // Lấy tối đa 12 món đẹp nhất
          ->values()
          ->all();

        $selectedIngredientsList = $selectedIngredients;
    }

    // Load lại danh sách nguyên liệu để hiển thị
    $ingredients = DB::table('ingredients')->get();

    return view('suggestion', compact('ingredients', 'meals', 'selectedIngredientsList'));
}

    // 3. Lưu món ăn vào DB
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        DB::table('foods')->insert([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description ?? '',
            'createdAt' => now()
        ]);

        return redirect()->back()->with('success', 'Đã lưu món ăn thành công!');
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
        //  DB::table('foods')->where('foodID', $id)->delete();

        // return redirect()->route('foods.index')->with('success', 'Xóa món ăn thành công');
        $ingredients = DB::table('ingredients')->get();
        return view('suggestion', compact('ingredients'));
    }
}
