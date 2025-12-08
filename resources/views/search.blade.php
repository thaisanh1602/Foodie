@include('layouts.main')
@section('content')
<h3 class="mb-3">Kết quả tìm kiếm cho: "{{ $query }}"</h3>

@if($users->isEmpty())
<div class="alert alert-warning">Không tìm thấy người dùng nào.</div>
@else
<div class="list-group">
    @foreach($users as $user)
    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center mb-2">
        <img src="{{ $user->avatar ?? asset('images/1764752568_fruits.png') }}"
            alt="{{ $user->userName }}"
            class="rounded-circle me-3"
            style="width:50px; height:50px; object-fit:cover;">
        <span>{{ $user->name }}</span>
    </a>
    @endforeach
</div>
@endif