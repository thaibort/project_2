@extends('admin.layout.master')
@section('title','Quản lý nhân viên')
@section('body')
    <div aria-colspan="3">
        <a href="{{url('admin/crestaff')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black"> </i>
        Thêm nhân viên</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th colspan="2">Hành động</th>
        </tr>
        @forelse($rs as $res)
            <tr>
                <td>{{$res -> id}}</td>
                <td>{{$res -> name}}</td>
                <td>{{$res -> email}}</td>
                <td>{{$res -> phone}}</td>
                <td>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/staffactive/{$res->id}/1")}}' @if($res -> active == 1) hidden @endif>
                        @csrf
                        <button type="submit" class="edit_hover">Kích hoạt</button>
                    </form>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/staffactive/{$res->id}/0")}}' @if($res -> active == 0) hidden @endif>
                        @csrf
                        <button type="submit" class="edit_hover">Khóa</button>
                    </form>
                </td>
                <td>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/staff/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="edit_hover">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5"> Không có dữ liệu</td>
            </tr>
        @endforelse
    </table>
@endsection
