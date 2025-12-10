@extends('layouts.main')

@section('content')
<div class="d-flex align-items-center justify-content-center py-5" style="min-height: 80vh; background-color: #f8f9fa;">
    
    <div class="card border-0 shadow-lg overflow-hidden" style="max-width: 1000px; width: 100%; border-radius: 20px;">
        <div class="row g-0">
            
            <div class="col-md-6 d-none d-md-block position-relative">
                <img src="{{ asset('images/homepage1.jpg') }}" 
                     alt="Register Banner" 
                     class="w-100 h-100" 
                     style="object-fit: cover; position: absolute; top: 0; left: 0;">
                
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));"></div>
                
                <div class="position-absolute bottom-0 start-0 text-white w-100 p-5">
                    <h3 class="fw-bold mb-2">Tham gia cùng Foodie</h3>
                    <p class="mb-0 text-white-50">Tạo tài khoản để lưu công thức yêu thích và chia sẻ đam mê nấu nướng của bạn.</p>
                </div>
            </div>

            <div class="col-md-6 bg-white p-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark">Tạo tài khoản</h3>
                    <p class="text-muted small">Điền thông tin bên dưới để bắt đầu</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input id="name" type="text" 
                               class="form-control rounded-3 @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" 
                               placeholder="Họ và tên" required autocomplete="name" autofocus>
                        <label for="name" class="text-secondary">Họ và tên</label>
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="email" type="email" 
                               class="form-control rounded-3 @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" 
                               placeholder="name@example.com" required autocomplete="email">
                        <label for="email" class="text-secondary">Địa chỉ Email</label>
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" 
                               class="form-control rounded-3 @error('password') is-invalid @enderror" 
                               name="password" placeholder="Mật khẩu" required autocomplete="new-password">
                        <label for="password" class="text-secondary">Mật khẩu</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-4">
                        <input id="password-confirm" type="password" 
                               class="form-control rounded-3" 
                               name="password_confirmation" placeholder="Nhập lại mật khẩu" required autocomplete="new-password">
                        <label for="password-confirm" class="text-secondary">Nhập lại mật khẩu</label>
                    </div>

                    <button type="submit" class="btn w-100 py-3 rounded-pill fw-bold text-white shadow-sm mb-3" 
                            style="background-color: #ff6b6b; border: none; transition: all 0.3s;">
                        ĐĂNG KÝ NGAY
                    </button>

                    <div class="text-center mt-3">
                        <p class="small text-muted">Đã có tài khoản? 
                            <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: #ff6b6b;">Đăng nhập</a>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection