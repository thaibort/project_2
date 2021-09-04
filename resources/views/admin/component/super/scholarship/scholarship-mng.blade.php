@extends('admin.layout.master')
@section('title','Quản lý học bổng')

@section('body')
    <div>
        <a href="{{url('admin/crescholarship')}}">thêm niên khóa</a>
    </div>
    <table>
        <tr>
            <td>Loại</td>
            <td>Số tiền</td>
            <td colspan="2">Hành động</td>
        </tr>
        @forelse($rs as $res)
            <tr>
                <td>{{$res -> type}}</td>
                <td>{{$res -> money}}</td>
                <td>
                    <form class="w-full h-full bg-blue-200" action='{{url("admin/upscholarship/{$res->id}")}}'>
                        @csrf
                        <button type="submit" class="edit_hover">Sửa</button>
                    </form>
                </td>
                <td>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/scholarship/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="edit_hover">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4"> Không có dữ liệu </td></tr>
        @endforelse
    </table>
@endsection
