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
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá Gốc</th>
                            <th>Giá Khuyến mãi</th>
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
                        @foreach ($products as $item=>$product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->menu->name }}</td>
                            {{-- từ product truy xuất sang bảng menu bằng function trong model và xuất tên --}}
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->price_sale }}</td>
                            <td class="item">{!!Helper::active($product->active) !!}</td>
                            <td>{{$product->updated_at}}</td>
                            <td>
                            <div class="table-data-feature">
                                <a href="/admin/products/edit/{{ $product->id }}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>

                                <a href="#" onclick="removeRow({{ $product->id }},'destroy/')"class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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
                {!! $products->links('pagination::bootstrap-4') !!}
            </div>

        </div>
@endsection
@section('foot')
@endsection
