<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Share;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        // Bài viết do user đăng
        $userPosts = Post::where('userID',  Auth::id())->get();

        $sharedPosts = Share::where('userID', Auth::id())
            ->with('post') // liên kết để lấy post gốc
            ->get()
            ->map(function ($share) {
                $share->post->shared_at = $share->created_at;
                return $share->post;
            });

        // Gộp 2 danh sách và sắp theo ngày mới nhất
        $posts = $userPosts
            ->merge($sharedPosts)
            ->sortByDesc(function ($post) {
                return $post->shared_at ?? $post->created_at;
            });

        return view('profile', compact('posts'));
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

        // Bài viết do user đăng
        $userPosts = Post::where('userID', $id)->get();

        // Bài viết user đã share
        $sharedPosts = Share::where('userID', $id)
            ->with('post') // liên kết để lấy post gốc
            ->get()
            ->map(function ($share) {
                $share->post->shared_at = $share->created_at;
                return $share->post;
            });

        // Gộp 2 danh sách và sắp theo ngày mới nhất
        $posts = $userPosts
            ->merge($sharedPosts)
            ->sortByDesc(function ($post) {
                return $post->shared_at ?? $post->created_at;
            });

        return view('profile', compact('user', 'posts'));
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
