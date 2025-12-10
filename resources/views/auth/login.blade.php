@extends('layouts.main')

@section('content')
<div class="d-flex align-items-center justify-content-center py-5" style="min-height: 80vh; background-color: #f8f9fa;">
    
    <div class="card border-0 shadow-lg overflow-hidden" style="max-width: 900px; width: 100%; border-radius: 20px;">
        <div class="row g-0">
            
            <div class="col-md-6 d-none d-md-block position-relative">
                <img src="{{ asset('images/homepage2.jpg') }}" 
                     alt="Login Banner" 
                     class="w-100 h-100" 
                     style="object-fit: cover; position: absolute; top: 0; left: 0;">
                
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.4);"></div>
                
                <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-3">
                    <h3 class="fw-bold mb-2">Foodie</h3>
                    <p class="mb-0">Khám phá thế giới ẩm thực bất tận.</p>
                </div>
            </div>

            <div class="col-md-6 bg-white p-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark">Đăng nhập</h3>
                    <p class="text-muted small">Chào mừng bạn quay trở lại!</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input id="email" type="email" 
                               class="form-control rounded-3 @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" 
                               placeholder="name@example.com" required autofocus>
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
                               name="password" placeholder="Password" required>
                        <label for="password" class="text-secondary">Mật khẩu</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted small" style="cursor: pointer;" for="remember">
                                Ghi nhớ tôi
                            </label>
                        </div>
                        
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none small fw-bold" style="color: #ff6b6b;" href="{{ route('password.request') }}">
                                Quên mật khẩu?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn w-100 py-3 rounded-pill fw-bold text-white shadow-sm mb-3" 
                            style="background-color: #ff6b6b; border: none; transition: all 0.3s;">
                        ĐĂNG NHẬP
                    </button>

                    <div class="text-center mt-3">
                        <p class="small text-muted">Chưa có tài khoản? 
                            <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: #ff6b6b;">Đăng ký ngay</a>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection