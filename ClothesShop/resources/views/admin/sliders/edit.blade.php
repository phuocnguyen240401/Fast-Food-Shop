@extends('admin.layout.main')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
@endsection
@section('content')
    @include('admin.layout.arlert')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Thêm Slider</strong>
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label class=" form-control-label">Tiêu đề:</label>
                        <input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control" value="{{$slider->name}}">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Đường dẫn:</label>
                        <input type="text" name="url" placeholder="Nhập đường dẫn " class="form-control" value="{{$slider->url}}">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="form-control-label">Upload ảnh đại diện:</label>
                        <input class="" type="file" name="file" id="uploadfile">
                    </div>
                    <div id="img_show">
                        <a href="{{ $slider->thumb }}" target="_blank">
                            <img src="{{ $slider->thumb }}" alt="Ảnh slider" width="100px" >
                        </a>
                    </div>
                    <div class="from-group">
                        <input type="hidden" name="thumb" id="file" value="{{ $slider->thumbs }}">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Sắp xếp:</label>
                        <input type="number" name="sort_by" placeholder="Nhập ...." class="form-control" value="{{ $slider->sort_by }}">
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2>
                            <label class=" form-control-label ">Trạng Thái:</label>
                        </div>
                        <div class="col col-md-10">
                            <div class="form-check-inline form-check">
                                <input type="radio"name="active" value="1" {{ $slider->active == 1 ? 'checked':'' }} class="form-check-input">
                                <label  for="active" class="form-check-label ">
                                    Bật
                                </label>
                                <input type="radio" name="active" value="0" {{ $slider->active == 0 ? 'checked':'' }}class="form-check-input">
                                <label for="active" class="form-check-label ">
                                    Tắt
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> CHỉnh sửa Slider
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
</script>
@endsection
