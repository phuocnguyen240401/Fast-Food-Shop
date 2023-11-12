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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Update</th>
                            <th>Ative</th>
                            <th>&nbsp;</th>
                            {{-- de trống --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Tạo một "Helper" để tự động upload danh sách --}}
                        {{-- $menus là biến menus mà ta truyền từ controller --}}
                        @csrf
                        {!! Helper::menu($menus) !!}

                    </tbody>

                </table>

            </div>
            <!--  END DATA TABLE -->
            <div class="container row">
                {{-- {!! $menus->links('pagination::bootstrap-4') !!} --}}
            </div>
        </div>
@endsection
@section('foot')
@endsection
