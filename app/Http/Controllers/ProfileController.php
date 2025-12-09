<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Share;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $userPosts = Post::where('userID', Auth::id())
            ->with('user')  // load avatar, name
            ->get();

        // Bài bạn share
        $sharedPosts = Share::where('userID', Auth::id())
            ->with(['post.user']) // load user của chủ bài
            ->get()
            ->map(function ($share) {
                $post = $share->post;
                $post->shared_at = $share->sharedAt;  // thời gian share
                return $post;
            });

        // Gộp & sort theo ngày mới nhất
        $posts = $userPosts
            ->merge($sharedPosts)
            ->sortByDesc(fn($p) => $p->shared_at ?? $p->created_at)
            ->values(); // reset lại key cho an toàn

        // thông tin user đang xem profile
        $user = User::find(Auth::id());

        return view('profile', compact('posts', 'user'));
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

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = 'uploads/' . $imageName;
            User::where('id', Auth::id())->update(['image' => $path]);
        }
        return redirect()->back();
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
