@include('layouts.main')

@section('content')
<div class="profile">

    {{-- HEADER PROFILE --}}
    <div class="header" style="display:flex; align-items:center; gap:15px; margin-bottom:20px;">
        <img src="{{ asset($user->avatar ?? 'images/Fruits.png') }}"
            alt=""
            style="width:80px; height:80px; border-radius:50%; object-fit:cover;">

        <div>
            <h3>{{ $user->name }}</h3>
            <p>Email: {{ $user->email }}</p>
            <p>Tổng bài viết: {{ $posts->count() }}</p>
        </div>
    </div>


    <div class="body">
        <div class="left">

            @foreach($posts as $post)
            <div class="post">

                <!-- Header post -->
                <div class="header box">
                    <a href="{{ route('profile.show', $post->userID) }}">
                        <img src="{{ asset('images/Fruits.png') }}"
                            alt=""
                            style="cursor:pointer; width:50px; border-radius:50%;">
                    </a>

                    <div>
                        <h5>{{ $post->userName }}</h5>
                        <h6>{{ $post->created_at->format('d/m/Y H:i') }}</h6>
                    </div>
                </div>

                <!-- Body post -->
                <div class="community-body box">
                    <h6 style="font-weight: bold;">Tiêu đề: {{ $post->title }}</h6>
                    <p style="font-weight: bold;">Độ khó: {{ $post->level }}</p>

                    <p>{{ $post->content }}</p>

                    @if ($post->image)
                    <img src="{{ asset($post->image) }}"
                        alt=""
                        style="max-width:150px; margin-top:10px;">
                    @endif
                </div>

                <!-- Interaction -->
                <div class="interaction box">

                    {{-- LIKE --}}
                    <div class="detail">
                        <form action="{{ route('community.like', $post->postID) }}" method="POST">
                            @csrf
                            <button type="submit" style="all:unset; cursor:pointer;">
                                @if($post->isLikedByUser())
                                <i class="fa-solid fa-thumbs-up"></i>
                                @else
                                <i class="fa-regular fa-thumbs-up"></i>
                                @endif
                                {{ $post->likes->count() }} Thích
                            </button>
                        </form>
                    </div>

                    {{-- COMMENT --}}
                    <div class="detail">
                        <i class="fa-solid fa-message"></i>
                        <span>
                            {{ $post->comments->count() }}
                            <a href="{{ route('show', $post->postID) }}">Bình luận</a>
                        </span>
                    </div>

                    {{-- SHARE --}}
                    <div class="detail">
                        <form action="{{ route('community.share', $post->postID) }}" method="POST">
                            @csrf
                            <button type="submit" style="all:unset; cursor:pointer;">
                                @if ($post->isSharedByUser())
                                <i class="fa-solid fa-share"></i> Đã chia sẻ
                                @else
                                <i class="fa-regular fa-share"></i> Chia sẻ
                                @endif
                                ({{ $post->shares->count() }})
                            </button>
                        </form>
                    </div>

                </div>

                <!-- Comment form -->
                <form action="{{ route('community.comment', $post->postID) }}" method="POST">
                    @csrf
                    <textarea name="content" placeholder="Viết bình luận..." required
                        style="width:100%; height:60px;"></textarea>
                    <button type="submit" style="padding:5px 10px; border:1px solid #ccc;">Gửi</button>
                </form>

            </div>
            @endforeach

        </div>
    </div>

</div>
@endsection