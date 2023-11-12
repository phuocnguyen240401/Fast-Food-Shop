@extends('admin.layout.main')
@section('head')
@endsection
@section('content')
    @include('admin.layout.arlert')
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Danh sách danh mục</h3>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu Đề</th>
                            <th>Ảnh</th>
                            <th>Đường Dẫn </th>
                            <th>Sắp Xếp</th>
                            <th>Trạng thái</th>
                            <th>Cập nhật</th>
                            <th>&nbsp;</th>
                            {{-- de trống --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Tạo một "Helper" để tự động upload danh sách --}}
                        {{-- $menus là biến menus mà ta truyền từ controller --}}
                        @csrf
                        @foreach ($sliders as $item=>$slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->name }}</td>
                            <td><a href="{{ $slider->thumb }}" target="_blank"><img src="{{ $slider->thumb }}" alt="" width="100px"></a></td>
                            {{-- từ product truy xuất sang bảng menu bằng function trong model và xuất tên --}}
                            <td>{{ $slider->url }}</td>
                            <td>{{ $slider->sort_by }}</td>
                            <td class="item">{!!Helper::active($slider->active) !!}</td>
                            <td>{{$slider->updated_at}}</td>
                            <td>
                            <div class="table-data-feature">
                                <a href="/admin/sliders/edit/{{ $slider->id }}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>

                                <a href="#" onclick="removeRow({{ $slider->id }},'destroy/')"class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                            </div>
                        </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>


            </div>
            <!-- END DATA TABLE -->
            <div class="row">
                {!! $sliders->links('pagination::bootstrap-4') !!}
            </div>

        </div>
@endsection
@section('foot')
@endsection
