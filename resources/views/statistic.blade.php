<!doctype html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thống kê</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
    }

    .hero {
      min-height: 60vh;
      display: flex;
      align-items: center
    }

    .brand {
      font-weight: 700
    }

    footer {
      padding: 2rem 0;
      background: #f8f9fa
    }

    .card-container {
    border: 2px solid #ddd; 
    border-radius: 15px;    
    padding: 15px;          
    background-color: #f8f9fa; 
}

    .selectable-card {
    border: 2px solid #ddd;
    border-radius: 10px;
    cursor: pointer;
    background-color: #fff;
    transition: 0.2s;
}

.selectable-card.selected {
    border-color: #28a745 !important;
    background-color: #e9fbe9 !important;
}

.selectable-card input[type="checkbox"] {
    display: none;
}
  </style>
</head>

<body>

  <!--Header-->
  <div>
    @include('layouts.header')
  </div>

<div class="container">
    <h1 class="mb-4">📊 Thống kê hệ thống</h1>

    <div class="row">
        <!-- Card tổng quan -->
        <div class="col-md-4 mb-3">
            <div class="card p-3 text-center">
                <h4>Người dùng</h4>
                <h2>{{ $totalUsers }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card p-3 text-center">
                <h4>Món ăn</h4>
                <h2>{{ $totalFoods }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card p-3 text-center">
                <h4>Bài viết</h4>
                <h2>{{ $totalPosts }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card p-3 text-center">
                <h4>Bình luận</h4>
                <h2>{{ $totalComments }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card p-3 text-center">
                <h4>Lượt Like</h4>
                <h2>{{ $totalLikes }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card p-3 text-center">
                <h4>Lượt Share</h4>
                <h2>{{ $totalShares }}</h2>
            </div>
        </div>
    </div>

    <hr>

    <!-- Top bài viết được like nhiều nhất -->
    <h3 class="mt-4">🔥 Top 5 bài viết nhiều Like</h3>
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Số Like</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topLikedPosts as $p)
            <tr>
                <td>{{ $p->postID }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->likeCount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Top bài viết được share nhiều nhất -->
    <h3 class="mt-4">📣 Top 5 bài viết nhiều Share</h3>
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Số Share</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topSharedPosts as $p)
            <tr>
                <td>{{ $p->postID }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->shareCount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Món ăn theo category -->
    <h3 class="mt-4">🍽 Số lượng món ăn theo Category</h3>
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>Category</th>
                <th>Số món</th>
            </tr>
        </thead>
        <tbody>
            @foreach($foodsByCategory as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->foodCount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

  <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>