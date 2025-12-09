@include('layouts.main')
@section('content')
<div class="community">
  <!-- header  -->
  <div class="header">
    <h4>Cộng đồng ẩm thực Foodie</h4>
  </div>

  <!-- body  -->
  <div class="body">


    <div class="left">
      @foreach($posts as $post)
      <div class="post">
        <!-- header  -->
        <div class="header box">
          <a href="{{ route('profile.show', $post->userID) }}">
            <img src="{{ asset($post->user->image) }}" alt="" style="cursor:pointer;">
          </a>
          <div>
            <h5>{{$post->userName}}</h5>
            <h6>{{$post->created_at}}</h6>
          </div>
        </div>

        <!-- body  -->
        <div class="community-body box">
          <h6 style="font-weight: bold;">Tiêu đề :{{$post->title}}</h6>
          <p style=" font-weight: bold;">Độ khó: {{$post->level}}</p>
          <div>{!! $post->content !!}</div>
          <img src="{{asset($post->image)}}" alt="" id="previewImage" style="display: block; margin: 0 auto; width: 40%; height: auto;">
        </div>

        <!-- interaction -->
        <div class="interaction box">
          <div class="detail">
            <form action="{{route('community.like', $post->postID)}}" method="post">
              @csrf
              <button type="submit" style="all:unset; cursor:pointer;">
                @if($post->isLikedByUser())
                <i class="fa-solid fa-thumbs-up"></i>{{ $post->likes->count() }} <span>Thích</span>
                @else
                <i class="fa-regular fa-thumbs-up"></i>{{ $post->likes->count() }} <span>Thích</span>
                @endif
              </button>
            </form>
          </div>
          <div class="detail">
            <i class="fa-solid fa-message"></i>
            <span>{{ $post->comments->count() }} <a style="all:unset; cursor:pointer;" href="{{ route('show', $post->postID) }}">Bình luận</a></span>

          </div>
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


      </div>
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


      @endforeach
    </div>


    <!-- right  -->
    <div class="right">
      <h3>Bảng xếp hạng</h3>
      <div class="leaderboard">
        <ul>
          @foreach($topUsers as $index => $user)
          <li>
            <div class="first">
              @if($index < 3)
                <img src="{{ asset('images/Vector_'.($index + 1).'.svg') }}" alt="">
                @endif
            </div>

            <div class="middle">
              <span>{{ $user->userName }}</span>
            </div>

            <div class="third">
              {{ $user->likes_count }}
              <i class="fa-solid fa-thumbs-up"></i>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

  </div>
</div>