<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FoodController extends Controller
{
    // Hiển thị danh sách nguyên liệu và view suggestion
    public function index(Request $request)
    {
        $ingredients = DB::table('ingredients')->get();
        $selectedIngredients = [];

        if ($request->wantsJson()) {
            return response()->json([
                'ingredients' => $ingredients,
            ]);
        }

        return view('goiy', compact('ingredients'));
    }

    // Gợi ý món ăn từ nguyên liệu
    public function suggestByIngredients(Request $request)
    {
        $request->validate([
            'ingredients' => 'required|array|min:1'
        ]);

        $selected = $request->ingredients;
        $mealSets = [];  // danh sách món theo từng nguyên liệu

        foreach ($selected as $ingredient) {
            $response = Http::get('https://www.themealdb.com/api/json/v1/1/filter.php', [
                'i' => $ingredient
            ]);

            if (!isset($response['meals'])) {
                return view('result', ['meals' => []]);
            }

            $mealIDs = array_column($response['meals'], 'idMeal');
            $mealSets[] = $mealIDs;
        }

        $intersection = array_shift($mealSets);

        foreach ($mealSets as $set) {
            $intersection = array_intersect($intersection, $set);
        }

        if (count($intersection) == 0) {
            return view('result', ['meals' => []]);
        }

        // Lấy chi tiết món ăn, tách nguyên liệu + hướng dẫn
        $finalMeals = [];

        foreach ($intersection as $mealId) {
            $detail = Http::get('https://www.themealdb.com/api/json/v1/1/lookup.php', [
                'i' => $mealId
            ]);

            if (isset($detail['meals'][0])) {
                $meal = $detail['meals'][0];

                // Tách danh sách nguyên liệu
                $ingredientsList = [];
                for ($i = 1; $i <= 20; $i++) {
                    $ing = $meal['strIngredient' . $i];
                    $measure = $meal['strMeasure' . $i];

                    if ($ing && trim($ing) != '') {
                        $ingredientsList[] = trim($ing . ' - ' . $measure);
                    }
                }

                $meal['ingredientsList'] = $ingredientsList;

                $finalMeals[] = $meal;
            }
        }

        return view('result', ['meals' => $finalMeals]);
    }
}
