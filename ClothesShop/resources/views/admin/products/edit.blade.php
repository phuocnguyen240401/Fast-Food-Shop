@extends('admin.layout.main')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
@endsection
@section('content')
    @include('admin.layout.arlert')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Thêm Sản Phẩm</strong>
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label class=" form-control-label">Tên Sản Phẩm:</label>
                        <input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control" value="{{$product->name}}">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label class=" form-control-label">Danh Mục:</label>
                        <select name="menu_id" class="form-control">
                            {{-- <option value="0">&quot;Danh Mục Cha&quot;</option> --}}
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}"{{ $product->menu->id ==$menu->id ? 'selected':'' }}>&quot;{{ $menu->name}}&quot;</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Giá gốc:</label>
                        <input type="number" name="price" placeholder="Nhập giá sản phẩm" class="form-control" value="{{$product->price}}">

                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Giá Khuyến mãi:</label>
                        <input type="number" name="price_sale" placeholder="Nhập giá sản phẩm" class="form-control" value="{{ $product->price_sale }}">
                    </div>
                    <div class="form-group">
                        <label for="form-control-label">Upload ảnh sản phẩm:</label>
                        <input class="" type="file" name="file" id="uploadfile">
                    </div>
                    <div id="img_show">
                        <a href="{{ $product->thumb }}" target="_blank">
                            <img src="{{ $product->thumb }}" alt="Ảnh đại diện" width="100px">
                        </a>
                    </div>
                    <div class="from-group">
                        <input type="hidden" value="{{ $product->thumb }}" name="thumb" id="file">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Mô Tả:</label>
                        <textarea name="description" placeholder="Vui lòng nhập mô tả..." class="form-control">{{ $product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Mô Tả Chi Tiết:</label>
                        <textarea name="content" id="content" placeholder="Vui lòng nhập mô tả chi tiết..." class="form-control">{{$product->content }}</textarea>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2>
                            <label class=" form-control-label ">Trạng Thái:</label>
                        </div>
                        <div class="col col-md-10">
                            <div class="form-check-inline form-check">
                                <input type="radio"name="active" value="1" {{ $product->active == 1? 'checked':'' }} class="form-check-input">
                                <label  for="active" class="form-check-label ">
                                    Bật
                                </label>
                                <input type="radio" name="active" value="0" {{ $product->active == 0? 'checked':'' }} class="form-check-input">
                                <label for="active" class="form-check-label ">
                                    Tắt
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Thêm Sản Phẩm
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
