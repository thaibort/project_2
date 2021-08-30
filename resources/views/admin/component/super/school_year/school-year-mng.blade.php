@extends('admin.layout.master')
@section('title','Quản lý niên khóa')
@section('body')
    <div>
        <a href="{{url('admin/creschyear')}}">thêm niên khóa</a>
    </div>
    <table>
        <tr>
            <th>Tên</th>
            <th>Đợt đóng tiền hiện tại</th>
            <th colspan="2">Hành động</th>
        </tr>
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
    </table>
@endsection
