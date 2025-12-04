@include('layouts.main')
@section('content')
<div class="post" style="margin:0 30px 0 76px;">
    <h5>Đăng bài</h5>

    <div class="body">
        <div class="left">
            <!-- title  -->
            <div class="title box">
                <h6>Tiêu đề</h6>
                <input type="text">
            </div>

            <!-- difficulty -->
            <div class="difficulty box">
                <h6>Độ khó</h6>

                <div class="options">

                    <label class="option">
                        <input type="radio" name="difficulty" value="khó">
                        <span>Khó</span>
                    </label>

                    <label class="option">
                        <input type="radio" name="difficulty" value="trung bình">
                        <span>Trung bình</span>
                    </label>

                    <label class="option">
                        <input type="radio" name="difficulty" value="dễ">
                        <span>Dễ</span>
                    </label>

                </div>


            </div>

            <!-- post-detail  -->
            <div class="post-detail box">
                <h6>Chi tiết bài đăng</h6>
                <textarea id="editor" name="content"></textarea>
            </div>

            <!-- privacy -->
            <div class="privacy box">
                <h6>Cài đặt quyền riêng tư</h6>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="pricacy" value="mọi người"></input>
                        <span>Mọi người</span>
                        <p>Bất kỳ ai trên hoặc ngoài Foodie đều có thể xem bài viết của bạn.</p>
                    </label><br>
                    <label class="option">
                        <input type="radio" name="pricacy" value="bạn bè"></input>
                        <span>Bạn bè</span>
                        <p>Bạn bè của bạn trên foodie</p>
                    </label>
                </div>
            </div>
        </div>

        <div class="right">
            <h3>XEM TRƯỚC BÀI VIẾT</h3>
            <div class="preview-post">
                <!-- header  -->
                <div class="header box">
                    <img src="{{asset('images\Fruits.png')}}" alt="">
                    <span>anh</span>
                </div>

                <!-- body  -->
                <div class="body box">

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
        <button class="cancel box">
            <p>HỦY</p>
        </button>
        <button class="post box">
            <P>ĐĂNG BÀI</P>
        </button>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

<script>
    $('#editor').summernote({
        height: 136,
        placeholder: 'Nhập nội dung...'
    });
</script>