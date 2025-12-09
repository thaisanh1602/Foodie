@include('layouts.main')
@section('content')
<div class="profile">
    <div class="header">

        <form action="{{ route('profile.updateAvatar') }}" id="avatarForm" method="post" enctype="multipart/form-data">
            @csrf
            <img id="avatarPreview"
                src="{{$user->image ? asset($user->image) : asset('images/1764752568_fruits.png')}}" alt=""
                style="width:50px; height:50px; cursor:pointer; border-radius:50%; object-fit:cover">
            <input type="file" style="display:none" id="avatarInput" name="avatar" accept="image/*">
        </form>

        <h5>{{$posts[0]->userName}}</h5>
    </div>
    <div class="body">
        <div class="left">
            @foreach($posts as $post)
            <div class="post">

                <!-- Header -->
                <div class="header box">
                    <a href="{{ route('profile.show', $post->userID) }}">
                        <img src="{{ asset($post->user->image) }}" alt="" style="cursor:pointer;">

                    </a>
                    <div>
                        <h5>{{ $post->userName }}</h5>
                        <h6>{{ $post->created_at->format('d/m/Y H:i') }}</h6>
                    </div>
                </div>

                <!-- Body -->
                <div class="profile-body box">
                    <h6 style="font-weight: bold;">Tiêu đề: {{ $post->title }}</h6>
                    <p style="font-weight: bold;">Độ khó: {{ $post->level }}</p>

                    <div>{{!! $post->content }}</div>

                    @if ($post->image)
                    <img src="{{ asset($post->image) }}"
                        alt=""
                        style="display: block; margin: 0 auto; width: 40%; height: auto;">
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
                            <a style="all:unset; cursor:pointer;" href="{{ route('show', $post->postID) }}">Bình luận</a>
                        </span>
                    </div>

                    {{-- SHARE --}}
                    <div class="detail">
                        @if ($post->isSharedByUser())
                        <form action="{{ route('community.share', $post->postID) }}" method="post">
                            @csrf
                            <button type="submit" style="all:unset; cursor:pointer; ">
                                <i class="fa-solid fa-share"></i> Đã chia sẻ ({{ $post->shares->count() }})
                            </button>
                        </form>
                        @else
                        <form action="{{ route('community.share', $post->postID) }}" method="post"
                            onsubmit=" return confirm('Bạn có chắc chắn muốn chia sẻ bài viết này không?');">
                            @csrf
                            <button type="submit" style="all:unset; cursor:pointer; ">
                                <i class="fa-solid fa-share"></i> Chia sẻ ({{ $post->shares->count() }})
                            </button>
                        </form>
                        @endif
                    </div>

                </div>

                <!-- Comment form -->
                <div class="card my-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Thêm bình luận</h5>
                        <form action="{{ route('community.comment', $post->postID) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea name="content" class="form-control" rows="3" placeholder="Viết bình luận..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Gửi bình luận
                            </button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach



        </div>
    </div>
    <script>
        const avatarForm = document.getElementById('avatarForm');
        const avatarPreview = document.getElementById('avatarPreview');
        const avatarInput = document.getElementById('avatarInput');

        avatarPreview.addEventListener('click', function() {
            avatarInput.click()
        });

        avatarInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
                avatarForm.submit();
            }
        })
    </script>