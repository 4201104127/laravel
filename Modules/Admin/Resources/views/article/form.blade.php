<form action="" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
        <label for="name">Tên bài viết:</label>
        <input type="text" class="form-control" placeholder="Tên bài viết" value="{{ old('a_name',isset($article->a_name) ? $article->a_name : '') }}" name="a_name">
        @if($errors->has('a_name'))
	        <div class="text-danger">
	            {{$errors->first('a_name')}}
	        </div>
	    @endif
    </div>
    <div class="form-group">
        <label for="name">Mô tả:</label>
        <textarea name="a_description" class="form-control" cols="30" rows="3"  placeholder="Mô tả bài viết">{{ old('a_description',isset($article->a_description) ? $article->a_description : '') }}</textarea>
        @if($errors->has('a_description'))
            <div class="text-danger">
                {{$errors->first('a_description')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Nội dung:</label>
        <textarea name="a_content" class="form-control" cols="30" rows="3"  placeholder="Nội dung bài viết">{{ old('a_content',isset($article->a_content) ? $article->a_content : '') }}</textarea>
        @if($errors->has('a_content'))
            <div class="text-danger">
                {{$errors->first('a_content')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Meta Title</label>
        <input type="text" class="form-control" placeholder="Meta title" value="{{ old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '') }}" name="a_title_seo">
    </div>
    <div class="form-group">
        <label for="name">Meta Description</label>
        <input type="text" class="form-control" placeholder="Meta description" value="{{ old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '') }}" name="a_description_seo">
    </div>
    <div class="form-group">
        <label for="p_name">Ảnh bài viết:</label>
        <input class="form-control" type="file" name="avatar">
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="hot">Nổi bật</label>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
</form>