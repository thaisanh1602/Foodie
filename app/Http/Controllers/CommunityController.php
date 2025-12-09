<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Share;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')   // ← Lấy thêm thông tin user + avatar
            ->orderBy('created_at', 'desc')
            ->get();

        $topUsers = DB::table('posts as p')
            ->leftJoin('post_likes as pl', 'p.postID', '=', 'pl.postID')
            ->select('p.userID', 'p.userName', DB::raw('COUNT(pl.postID) as likes_count'))
            ->groupBy('p.userID', 'p.userName')
            ->orderByDesc('likes_count')
            ->limit(10)
            ->get();

        return view('community', compact('posts', 'topUsers'));
    }

    public function like($postID)
    {
        $userID = Auth::id();

        $like = Like::where('postID', $postID)
            ->where('userID', $userID);

        if ($like->exists()) {
            $like->delete();
        } else {
            Like::create([
                'postID' => $postID,
                'userID' => $userID,
            ]);
        }

        return back();
    }

    public function comment(Request $request, $postID)
    {
        $request->validate([
            'content' => 'required|min:1'
        ]);

        Comment::create([
            'postID' => $postID,
            'userID' => Auth::id(),
            'content' => $request->content
        ]);

        return back();
    }

    public function share($postID)
    {
        $userID = Auth::id();


        $existing = Share::where('postID', $postID)
            ->where('userID', $userID);

        if ($existing->exists()) {
            return redirect()->back()->with('info', 'Bạn đã chia sẻ bài viết này!');
        } else {
            Share::create([
                'postID'   => $postID,
                'userID'   => $userID,
                'sharedAt' => now(),
            ]);
        }

        return redirect()->back()->with('info', 'Bạn đã chia sẻ thành công!');
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
