@extends('admin.layout.master')
@section('title','Quản lý niên khóa')
@section('content')
<div class="align-middle d-flex pt-3  justify-content-between">
    <a href="{{url('admin/creschyear')}}">
        <button aria-colspan="3" type="button" class="bg-blue text-white btn btn-primary">
            <i class="fas fa-plus-circle fa-lg "></i> Thêm Niên Khóa
        </button>
    </a>
    <div class="pb-3">
        <form action="{{url('admin/stageform')}}" method="post">
            @csrf
            <input type="text" hidden name="mode" value="0">
            <button type="submit" class="bg-blue text-white btn btn-outline-secondary">Giảm tổng đợt</button>
        </form>
    </div>
</div>
<table class="table table-bordered bg-white text-center">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Đợt đóng tiền hiện tại</th>
            <th colspan="2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rs as $res)
        <tr>
            <td>{{$res -> name}}</td>
            <td>{{$res -> stagesPresent}}</td>
            <td>
                <form class="w-full h-full -p-5" action='{{url("admin/upschyear/{$res->id}")}}'>
                    @csrf
                    <button type="submit"
                        class="w-full h-full edit_hover border-0 text-white  btn bg-gradient-primary mrt-5"
                        style="width: 100%">Sửa</button>
                </form>
            </td>
            <td class="">
                <form class="w-full h-full -p-5" action='{{url("admin/schyear/{$res->id}")}}' method="post">
                    @csrf
                    @method("DELETE")
                    <button type="button"
                        class="btn btn-primary border-0 text-white  btn bg-red mrt-5" style="width: 100%"
                        data-toggle="modal" data-target="#a{{$res->id}}">
                        Xóa
                    </button>

                    <div class="modal fade text-black-50" id="a{{$res -> id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        @endforeach
    </tbody>
</table>
@endsection