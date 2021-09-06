@extends('admin.layout.master')
@section('title','Thêm nhân viên')

@section('body')
    <div>
        <form action="{{url('admin/crestaff')}}" method="post">
            @csrf
            Tên: <input type="text" name="name" required><br>
            Email: <input type="email" name="email" required><br>
            Số điện thoại: <input type="text" name="phone" required><br>
            địa chỉ: <input type="text" name="address" required><br>
            mật khẩu: <input type="password" name="pass" required><br>
            <button type="submit">Thêm</button>
        </form>
    </div>
@endsection
