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

<div class="container py-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Dashboard</h2>
            <p class="text-muted">Tổng quan tình hình hoạt động của hệ thống Foodie.</p>
        </div>
        <button class="btn btn-light border shadow-sm"><i class="fas fa-download me-2"></i>Xuất báo cáo</button>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 stat-card border-start border-4 border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted fw-medium">Người dùng</span>
                        <div class="icon-box bg-primary-subtle text-primary rounded-circle">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">{{ number_format($totalUsers) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 stat-card border-start border-4 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted fw-medium">Món ăn</span>
                        <div class="icon-box bg-success-subtle text-success rounded-circle">
                            <i class="fas fa-utensils"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">{{ number_format($totalFoods) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 stat-card border-start border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted fw-medium">Bài viết</span>
                        <div class="icon-box bg-info-subtle text-info rounded-circle">
                            <i class="fas fa-pen-nib"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">{{ number_format($totalPosts) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 stat-card border-start border-4 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted fw-medium">Bình luận</span>
                        <div class="icon-box bg-warning-subtle text-warning rounded-circle">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">{{ number_format($totalComments) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 stat-card border-start border-4 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted fw-medium">Lượt Thích</span>
                        <div class="icon-box bg-danger-subtle text-danger rounded-circle">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">{{ number_format($totalLikes) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 stat-card border-start border-4 border-dark">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="text-muted fw-medium">Chia sẻ</span>
                        <div class="icon-box bg-dark-subtle text-dark rounded-circle">
                            <i class="fas fa-share-alt"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0">{{ number_format($totalShares) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0 text-danger"><i class="fas fa-fire me-2"></i>Top 5 Bài viết Yêu thích</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">#</th>
                                    <th>Tiêu đề bài viết</th>
                                    <th class="text-center">Lượt thích</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topLikedPosts as $index => $p)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">{{ $index + 1 }}</td>
                                    <td>
                                        <span class="d-block text-truncate" style="max-width: 250px;">{{ $p->title }}</span>
                                        <small class="text-muted">ID: #{{ $p->postID }}</small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                            {{ number_format($p->likeCount) }} <i class="fas fa-heart ms-1"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0 text-primary"><i class="fas fa-bullhorn me-2"></i>Top 5 Bài viết Chia sẻ</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">#</th>
                                    <th>Tiêu đề bài viết</th>
                                    <th class="text-center">Lượt share</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topSharedPosts as $index => $p)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">{{ $index + 1 }}</td>
                                    <td>
                                        <span class="d-block text-truncate" style="max-width: 250px;">{{ $p->title }}</span>
                                        <small class="text-muted">ID: #{{ $p->postID }}</small>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                            {{ number_format($p->shareCount) }} <i class="fas fa-share ms-1"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3">
            <h5 class="fw-bold mb-0 text-success"><i class="fas fa-chart-pie me-2"></i>Phân bố món ăn theo Danh mục</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th width="30%">Tên danh mục</th>
                            <th width="50%">Biểu đồ</th>
                            <th width="20%" class="text-end">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foodsByCategory as $c)
                        @php 
                            $percent = $totalFoods > 0 ? ($c->foodCount / $totalFoods) * 100 : 0;
                        @endphp
                        <tr>
                            <td class="fw-medium">{{ $c->name }}</td>
                            <td>
                                <div class="progress" style="height: 10px; border-radius: 10px;">
                                    <div class="progress-bar bg-success" role="progressbar" 
                                         aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">
                                <span class="fw-bold">{{ $c->foodCount }}</span> món
                                <small class="text-muted ms-1">({{ round($percent, 1) }}%)</small>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
  <!--Footer-->
  <div>
    @include('layouts.footer')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>