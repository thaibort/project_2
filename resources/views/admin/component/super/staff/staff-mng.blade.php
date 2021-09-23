@extends('admin.layout.master')
@section('title','Quản lý nhân viên')
@section('content')
<div aria-colspan="3" class="pt-3">
    <a href="{{url('admin/crestaff')}}">
        <button aria-colspan="3" type="button" class="bg-blue text-white btn btn-primary">
        <i class="fas fa-user-plus"></i> Thêm nhân viên
        </button></a>
</div>
<div class="pt-2">
    <table id="staff" class="table table-bordered bg-white ">
        <thead>
            <tr class=" text-center">
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th style="width: 250px">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rs as $res)
            <tr class=" text-center">
                <td>{{$res -> id}}</td>
                <td>{{$res -> name}}</td>
                <td >{{$res -> email}}</td>
                <td>{{$res -> phone}}</td>
                <td class="p-1">
                    <div class="d-flex flex-row col-12 ">
                        <div class="col-6 d-flex justify-content-end">
                            <form class="col-12 h-full " action='{{url("admin/staffactive/{$res->id}/1")}}'
                                @if($res -> active == 1) hidden @endif>
                                @csrf
                                <button type="submit"
                                    class="edit_hover col-12 bg-blue text-white btn btn-outline-secondary">Kích
                                    hoạt</button>
                            </form>
                            <form class="col-12 h-full " action='{{url("admin/staffactive/{$res->id}/0")}}'
                                @if($res -> active == 0) hidden @endif>
                                @csrf
                                <button type="submit"
                                    class="edit_hover col-12 bg-blue text-white btn btn-outline-secondary">Khóa</button>
                            </form>
                        </div>
                        <div class="flex-row col-6 d-flex justify-content-end">
                            <form class="col-12 h-full " action='{{url("admin/staff/{$res->id}")}}'
                                method="post">
                                @csrf
                                @method("DELETE")
                                <button type="button"
                                    class="btn btn-primary col-12 bg-red text-white btn btn-outline-secondary "
                                    data-toggle="modal" data-target="#a{{$res->id}}">
                                    Xóa
                                </button>
                            
                                <div class="modal fade" id="a{{$res -> id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc muốn xóa
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5"> Không có dữ liệu</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#staff').DataTable();
});
</script>
@endsection