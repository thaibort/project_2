@extends('admin.layout.master')
@section('title','Quản lý học bổng')

@section('content')
    <div aria-colspan="3" class="pt-3">
        <a href="{{url('admin/crescholarship')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black"> </i>
        Thêm Học Bổng </a>
    </div>
    <table class="table table-bordered bg-white text-center pt-5">
        <thead>
        <tr>
            <td>Loại</td>
            <td>Số tiền</td>
            <td colspan="2" style="witdh: 100px">Hành động</td>
        </tr>
        </thead>
        <tbody>
        @forelse($rs as $res)
            @if($res -> id !== 0)
                <tr>
                    <td>{{$res -> type}}</td>
                    <td>{{$res -> money}}</td>
                    <td class="bg-blue">
                        <form class="w-full h-full bg-blue-200 " action='{{url("admin/upscholarship/{$res->id}")}}'>
                            @csrf
                            <button type="submit" class="edit_hover border-0 bg-blue text-white btn btn-outline-secondary mrt-5">Sửa</button>
                        </form>
                    </td>
                    <td class="bg-red">
                        <form class="w-full h-full bg-red-200 " action='{{url("admin/scholarship/{$res->id}")}}' method="post">
                            @csrf
                            @method("DELETE")
                            <button type="button" class="btn btn-primary border-0 bg-red text-white btn btn-outline-secondary mrt-5" data-toggle="modal" data-target="#a{{$res->id}}">
                                Xóa
                            </button>

                            <div class="modal fade" id="a{{$res->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc muốn xóa
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endif
        @empty
            <tr><td colspan="4"> Không có dữ liệu </td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
