@extends('admin.layout.main')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

@endsection
@section('content')
    @include('admin.layout.arlert')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Thêm Danh Mục</strong>
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    @csrf
                    <div class="form-group">
                        <label class=" form-control-label">Tên Danh Mục:</label>
                        <input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label class=" form-control-label">Danh Mục:</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">&quot;Danh Mục Cha&quot;</option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">&quot;{{ $menu->name}}&quot;</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Mô Tả:</label>
                        <textarea name="description" placeholder="Vui lòng nhập mô tả..." class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Mô Tả Chi Tiết:</label>
                        <textarea name="content" id="content" placeholder="Vui lòng nhập mô tả chi tiết..." class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="form-control-label">Upload ảnh danh mục:</label>
                        <input class="" type="file" name="file" id="uploadfile">
                    </div>
                    <div id="img_show">

                    </div>
                    <div class="from-group">
                        <input type="hidden" name="thumb" id="file">
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2>
                            <label class=" form-control-label">Trạng Thái:</label>
                        </div>
                        <div class="col col-md-10">
                            <div class="form-check-inline form-check">
                                <input type="radio"name="active" value="1" checked class="form-check-input">
                                <label  for="active" class="form-check-label ">
                                    Bật
                                </label>
                                <input type="radio" name="active" value="0" class="form-check-input">
                                <label for="active" class="form-check-label ">
                                    Tắt
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Thêm Danh mục
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
