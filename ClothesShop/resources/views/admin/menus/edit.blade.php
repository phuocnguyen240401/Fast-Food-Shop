@extends('admin.layout.main')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

@endsection
@section('content')
    @include('admin.layout.arlert')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Chỉnh Sửa Danh Mục</strong>
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    @csrf
                    <div class="form-group">
                        <label class=" form-control-label">Tên Danh Mục:</label>
                        <input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control" value="{{ $menu->name }}">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label class=" form-control-label">Danh Mục:</label>
                        <select name="parent_id" class="form-control">
                            <option value="0" {{ $menu->parent_id ==0 ? 'selected':'' }}>&quot;Danh Mục Cha&quot;</option>
                            @foreach ($menus as $menuParent)
                            <option value="{{ $menuParent->id }}" {{ ($menu->parent_id == $menuParent->id)  ? 'selected':''}}{{ $menuParent->id == $menu->id ? 'hidden':''}}>&quot;{{ $menuParent->name}}&quot;</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Mô Tả:</label>
                        <textarea name="description" placeholder="Vui lòng nhập mô tả..." class="form-control">{{ $menu->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Mô Tả Chi Tiết:</label>
                        <textarea name="content" id="content" placeholder="Vui lòng nhập mô tả chi tiết..." class="form-control">{{ $menu->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="form-control-label">Upload ảnh sản phẩm:</label>
                        <input class="" type="file" name="file" id="uploadfile">
                    </div>
                    <div id="img_show">
                        <a href="{{ $menu->thumb }}" target="_blank">
                            <img src="{{ $menu->thumb }}" alt="Ảnh đại diện" width="100px">
                        </a>
                    </div>
                    <div class="from-group">
                        <input type="hidden" value="{{ $menu->thumb }}" name="thumb" id="file">
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2>
                            <label class=" form-control-label">Trạng Thái:</label>
                        </div>
                        <div class="col col-md-10">
                            <div class="form-check-inline form-check">
                                <input type="radio"name="active" value="1" {{ $menu->active == 1 ? 'checked':'' }} class="form-check-input">
                                <label  for="active" class="form-check-label ">
                                    Bật
                                </label>
                                <input type="radio" name="active" value="0" {{ $menu->active == 0 ? 'checked':'' }} class="form-check-input">
                                <label for="active" class="form-check-label ">
                                    Tắt
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Chỉnh sửa danh mục
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i>Làm lại
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('foot')
<script>
	ClassicEditor
		.create( document.querySelector( '#content' ) )
		.catch( error => {
			console.error( error );
		} );
</script>
@endsection

