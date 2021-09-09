@extends('admin.layout.master')
@section('title','Quản lý niên khóa')
@section('body')
    <div aria-colspan="3">
        <a href="{{url('admin/creschyear')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black"> </i>thêm niên khóa</a>
    </div>
    <table class="table table-bordered bg-white">
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
                    <form class="w-full h-full bg-blue-200" action='{{url("admin/upschyear/{$res->id}")}}'>
                        @csrf
                        <button type="submit" class="edit_hover">Sửa</button>
                    </form>
                </td>
                <td>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/schyear/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="edit_hover">Xóa</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection


