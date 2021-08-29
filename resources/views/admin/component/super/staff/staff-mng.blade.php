@extends('admin.layout.master')
@section('title','Quản lý nhân viên')
@section('body')
    <div>
        <a href="{{url('admin/crestaff')}}">thêm ngành</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
    </table>
@endsection
