<form action="" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="p_name">Tên sản phẩm:</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm" value="{{ old('p_name',isset($product->p_name) ? $product->p_name : '') }}" name="p_name">
                @if($errors->has('p_name'))
                    <div class="text-danger">
                        {{$errors->first('p_name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="p_name">Mô tả:</label>
                <textarea name="p_description" class="form-control" cols="30" rows="3"  placeholder="Mô tả sản phẩm">{{ old('p_description',isset($product->p_description) ? $product->p_description : '') }}</textarea>
                @if($errors->has('p_description'))
                    <div class="text-danger">
                        {{$errors->first('p_description')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="p_name">Nội dung:</label>
                <textarea id="" name="p_content" class="form-control" cols="30" rows="3"  placeholder="Nội dung sản phẩm">{{ old('p_content',isset($product->p_content) ? $product->p_content : '') }}</textarea>
                @if($errors->has('p_content'))
                    <div class="text-danger">
                        {{$errors->first('p_content')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label name="p_name">Meta Description</label>
                <input type="text" name="p_description_seo" class="form-control" value="{{ old('p_description_seo',isset($product->p_description_seo) ? $product->p_description_seo : '') }}">
            </div>
            <div class="form-group">
                <label name="p_name">Meta Title</label>
                <input type="text" name="p_title_seo" class="form-control" value="{{ old('p_title_seo',isset($product->p_title_seo) ? $product->p_title_seo : '') }}">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="hot">Nổi bật</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="p_name">Loại sản phẩm:</label>
                <select name="p_category_id" class="form-control">
                    <option value="">---Chọn loại sản phẩm---</option>
                    @if (isset($categories))
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('p_category_id', isset($product->p_category_id) ? $product->p_category_id : '') == $category->id ? "selected = 'selected'" : "" }}>{{ $category->c_name }}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('p_category_id'))
                    <div class="text-danger">
                        {{$errors->first('p_category_id')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="p_name">Giá sản phẩm:</label>
                <input name="p_price" class="form-control" type="number" placeholder="Giá sản phẩm" value="{{ old('p_price',isset($product->p_price) ? $product->p_price : '') }}">
                @if($errors->has('p_price'))
                    <div class="text-danger">
                        {{$errors->first('p_price')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="p_name">Số lượng:</label>
                <input name="p_number" class="form-control" type="number" placeholder="Số lượng" value="{{ old('p_number',isset($product->p_number) ? $product->p_number : '') }}">
                @if($errors->has('p_number'))
                    <div class="text-danger">
                        {{$errors->first('p_number')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="p_name">% Khuyến mãi:</label>
                <input name="p_sale" class="form-control" type="number" value="{{ old('p_sale',isset($product->p_sale) ? $product->p_sale : '') }}" placeholder="%">
                @if($errors->has('p_sale'))
                    <div class="text-danger">
                        {{$errors->first('p_sale')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="p_name">Ảnh sản phẩm:</label>
                <input id="input_img" class="form-control" type="file" name="avatar" onchange="loadFile(event)">
            </div>
            <div class="form-group">
                <img id="output_img" src="{{ asset(old('p_avatar',isset($product->p_avatar) ? pare_url_file($product->p_avatar) : 'img/No_Image_Available.jpg')) }}" alt="" width="55%" height="55%">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
</form>

@section('script')
    <script src="{{ asset('ckeditor_standard/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('p_content');
    </script>
@stop