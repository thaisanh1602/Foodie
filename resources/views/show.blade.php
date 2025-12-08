@include('layouts.main')
@section('content')
<div class="container my-4">

    {{-- Bài viết --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{{ $post->content }}</p>
            <p class="text-muted mb-0">Đăng bởi: <strong>{{ $post->user->name }}</strong></p>
        </div>
    </div>

    {{-- Bình luận --}}
    <h3 class="mb-3">Bình luận</h3>

    @if($post->comments->isEmpty())
    <div class="alert alert-secondary">Chưa có bình luận nào.</div>
    @else
    <div class="list-group mb-4">
        @foreach ($post->comments as $cm)
        <div class="list-group-item list-group-item-action d-flex align-items-start">
            <img src="{{ $cm->user->avatar ?? asset('images/1764752568_fruits.png') }}"
                alt="{{ $cm->user->name }}"
                class="rounded-circle me-3"
                style="width:40px; height:40px; object-fit:cover;">
            <div>
                <strong>{{ $cm->user->name }}</strong>
                <p class="mb-0">{{ $cm->content }}</p>
                <small class="text-muted">{{ $cm->created_at->diffForHumans() }}</small>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- Form thêm bình luận --}}
    @auth
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Thêm bình luận</h5>
            <form action="{{ route('community.comment', $post->postID) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control" rows="3" placeholder="Viết bình luận..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>
        </div>
    </div>
    @endauth

</div>