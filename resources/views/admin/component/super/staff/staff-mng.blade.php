@extends('admin.layout.master')
@section('title','Quản lý nhân viên')
@section('content')
    <div aria-colspan="3" class="pt-2">
        <a href="{{url('admin/crestaff')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black"> </i>
        Thêm nhân viên</a>
    </div>
    <table id="staff" class="table table-bordered bg-white">
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
                <tr>
                    <td class=" text-center">{{$res -> id}}</td>
                    <td class=" text-center">{{$res -> name}}</td>
                    <td class=" text-center">{{$res -> email}}</td>
                    <td class=" text-center">{{$res -> phone}}</td>
                    <td>
                        <div class="d-flex flex-row ">
                            <div class="col-6 d-flex justify-content-end">
                                <form class="w-full h-full bg-red-200" action='{{url("admin/staffactive/{$res->id}/1")}}' @if($res -> active == 1) hidden @endif>
                                    @csrf
                                    <button type="submit" class="edit_hover bg-blue text-white btn btn-outline-secondary mr-5">Kích hoạt</button>
                                </form>
                                <form class="w-full h-full bg-red-200" action='{{url("admin/staffactive/{$res->id}/0")}}' @if($res -> active == 0) hidden @endif>
                                    @csrf
                                    <button type="submit" class="edit_hover bg-blue text-white btn btn-outline-secondary mr-5">Khóa</button>
                                </form>
                            </div>
                            <div class="flex-row w-full col-6 d-flex justify-content-end">
                                <form class="w-full h-full bg-red-200 " action='{{url("admin/staff/{$res->id}")}}' method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="button" class="btn btn-primary bg-red text-white btn btn-outline-secondary " data-toggle="modal" data-target="#exampleModal">
                                        Xóa
                                    </button>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
@endsection
@section('script')
<script>
    $(document).ready( function () {
        $('#staff').DataTable();
    } );
</script>
@endsection
