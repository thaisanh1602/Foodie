<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminStatisticController extends Controller
{
    public function index()
    {
        // ===== Tổng quan =====
        $totalUsers = DB::table('users')->count();
        $totalFoods = DB::table('foods')->count();
        $totalPosts = DB::table('posts')->count();
        $totalComments = DB::table('comments')->count();
        $totalLikes = DB::table('post_likes')->count();
        $totalShares = DB::table('post_shares')->count();

        // ===== Top bài viết theo lượt like =====
        $topLikedPosts = DB::table('posts')
            ->leftJoin('post_likes', 'posts.postID', '=', 'post_likes.postID')
            ->select('posts.postID', 'posts.title', DB::raw('COUNT(post_likes.userID) as likeCount'))
            ->groupBy('posts.postID', 'posts.title')
            ->orderByDesc('likeCount')
            ->limit(5)
            ->get();

        // ===== Top bài viết theo lượt share =====
        $topSharedPosts = DB::table('posts')
            ->leftJoin('post_shares', 'posts.postID', '=', 'post_shares.postID')
            ->select('posts.postID', 'posts.title', DB::raw('COUNT(post_shares.userID) as shareCount'))
            ->groupBy('posts.postID', 'posts.title')
            ->orderByDesc('shareCount')
            ->limit(5)
            ->get();

        // ===== Số lượng món theo category =====
        $foodsByCategory = DB::table('categories')
            ->leftJoin('foods', 'categories.categoryID', '=', 'foods.categoryID')
            ->select('categories.name', DB::raw('COUNT(foods.foodID) as foodCount'))
            ->groupBy('categories.name')
            ->get();

        return view('statistic', compact(
            'totalUsers',
            'totalFoods',
            'totalPosts',
            'totalComments',
            'totalLikes',
            'totalShares',
            'topLikedPosts',
            'topSharedPosts',
            'foodsByCategory'
        ));
    }
}
