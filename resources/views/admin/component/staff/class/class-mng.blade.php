@extends('admin.layout.master')
@section('title','Quản lý lớp')
@section('body')
    <div>
        <a href="{{url('admin/creclass')}}">thêm lớp</a>
    </div>
    <table>
        <tr>
            <td>Lớp</td>
            <td>Ngành</td>
            <td>Khóa</td>
            <td colspan="2">Hành động</td>
        </tr>
        @foreach($rs as $res)
            <tr>
                <td>{{$res -> name}}</td>
                <td>{{$res -> vocation}}</td>
                <td>{{$res -> schoolYear}}</td>
                <td>
                    <form class="w-full h-full bg-blue-200" action='{{url("admin/upclass/{$res->id}")}}'>
                        @csrf
                        <button type="submit" class="edit_hover">Sửa</button>
                    </form>
                </td>
                <td>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/class/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="edit_hover">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
