@include('layouts.main')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<form class="post" style="margin:0 30px 0 76px;"
    action="{{route('post.store')}}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <h5>Đăng bài</h5>

    <div class="body">

        <div class="left">
            <!-- title  -->
            <div class="title box">
                <h6>Tiêu đề</h6>
                <input type="text" name="title" value="{{old('title')}}" class="titleInput">
                @error('title')
                <div class="text-danger">Hãy nhập tiêu đề!</div>
                @enderror
            </div>

            <div class="image-upload">
                <label>Chọn ảnh:</label>
                <input type="file" name="image" class="image">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- difficulty -->
            <div class="difficulty box">
                <h6>Độ khó</h6>

                <div class="options">

                    <label class="option">
                        <input type="radio" name="level" value="khó" {{ old('level') == 'khó' ? 'checked' : ''}} class="levelRadio">
                        <span>Khó</span>
                    </label>

                    <label class="option">
                        <input type="radio" name="level" value="trung bình" {{ old('level') == 'trung bình' ? 'checked' : ''}} class="levelRadio">
                        <span>Trung bình</span>
                    </label>

                    <label class="option">
                        <input type="radio" name="level" value="dễ" {{ old('level') == 'dễ' ? 'checked' : ''}} class="levelRadio">
                        <span>Dễ</span>
                    </label>

                </div>
                @error('level')
                <div class="text-danger">Hãy chọn độ khó</div>
                @enderror
            </div>



            <!-- post-detail  -->
            <div class="post-detail box">
                <h6>Chi tiết bài đăng</h6>
                <textarea id="editor" name="content"></textarea>
                @error('content')
                <div class="text-danger">Hãy nhập nội dung!</div>
                @enderror
            </div>

            <!-- privacy -->
            <div class="privacy box">
                <h6>Cài đặt quyền riêng tư</h6>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="privacy" value="mọi người" {{ old('privacy') == 'mọi người' ? 'checked' : '' }}></input>
                        <span>Mọi người</span>
                        <p>Bất kỳ ai trên hoặc ngoài Foodie đều có thể xem bài viết của bạn.</p>
                    </label><br>
                    <label class="option">
                        <input type="radio" name="privacy" value="bạn bè" {{ old('privacy') == 'bạn bè' ? 'checked' : '' }}></input>
                        <span>Bạn bè</span>
                        <p>Bạn bè của bạn trên foodie</p>
                    </label>
                </div>
                @error('level')
                <div class="text-danger">Hãy chọn quyền riêng tư!</div>
                @enderror
            </div>
        </div>

        <div class="right">
            <h3>XEM TRƯỚC BÀI VIẾT</h3>
            <div class="preview-post">
                <!-- header  -->
                <div class="header box">
                    <img src="{{asset('images\Fruits.png')}}" alt="">
                    <span>{{Auth::user()->name}}</span>
                </div>

                <!-- body  -->
                <div class="bodyPreview box">
                    <h6 style="font-weight: bold;">Tiêu đề: <span id="previewTitle"></span></h6>
                    <p style=" font-weight: bold;">Độ khó: <span id="previewLevel"></span></p>
                    <p id="previewContent"></p>
                    <img style="display: block; margin: 0 auto; width: 100px" src="" alt="" id="previewImage">
                </div>

                <!-- interaction -->
                <div class="interaction box">
                    <div class="detail">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>Thích</span>
                    </div>
                    <div class="detail">
                        <i class="fa-solid fa-message"></i>
                        <span>Bình luận</span>
                    </div>
                    <div class="detail">
                        <i class="fa-solid fa-share"></i>
                        <span>Chia sẻ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <button type="button" class="cancel box" onclick="history.back()">
            <p>HỦY</p>
        </button>
        <button type="submit" class="post box">
            <P>ĐĂNG BÀI</P>
        </button>
    </div>


</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

<script>
    $('#editor').summernote({
        height: 136,
        placeholder: 'Nhập nội dung...'
    });

    // Title
    const titleInput = document.querySelector('.titleInput');
    const previewTitle = document.getElementById('previewTitle');

    titleInput.addEventListener('input', () => {
        previewTitle.textContent = titleInput.value || 'Tiêu đề';
    });


    // level 
    const levelRadios = document.querySelectorAll('.levelRadio');
    const previewLevel = document.getElementById('previewLevel');
    levelRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            previewLevel.textContent = this.value;
        });
    });

    //  Content
    const editor = $('#editor');
    const previewContent = document.getElementById('previewContent');
    editor.on('summernote.change', function(we, contents, $editable) {
        previewContent.innerHTML = contents;
    });

    // Image
    const imageInput = document.querySelector('.image');
    const previewImage = document.getElementById('previewImage');
    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>