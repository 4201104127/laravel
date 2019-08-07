<form action="" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
        <label for="name">Tiêu đề:</label>
        <input type="text" class="form-control" placeholder="Tiêu đề" value="{{ old('ps_name',isset($page->ps_name) ? $page->ps_name : '') }}" name="ps_name">
    </div>
    <div class="form-group">
        <label for="name">Chọn trang:</label>
        <select class="form-control" name="ps_type" id="">
            <option value="" selected>---Select---</option>
            <option value="1">Về chúng tôi</option>
            <option value="2">Thông tin giao hàng</option>
            <option value="3">Chính sách bảo mật</option>
            <option value="4">Điều khoản</option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Nội dung:</label>
        <textarea required name="ps_content" class="form-control" cols="30" rows="3"  placeholder="Nội dung bài viết">
            {{ old('ps_content',isset($page->ps_content) ? $page->ps_content : '') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
</form>

@section('script')
    <script src="{{ asset('ckeditor_standard/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ps_content');
    </script>
@stop