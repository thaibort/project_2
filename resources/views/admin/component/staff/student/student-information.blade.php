@extends('admin.layout.master')

@foreach($rs as $res)
    @section('title',$res->studentName)
    @section('body')
        <a href="{{url('admin/student')}}">Quay lại</a>
        <table>
            <tr>
                <th>Tên sinh viên</th>
                <td>{{$res -> studentName}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$res -> email}}</td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td>{{$res -> phone}}</td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td>{{$res -> address}}</td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td>{{$res -> gender == 1 ? 'Nam' : 'Nữ'}}</td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td>{{$res -> dob}}</td>
            </tr>
            <tr>
                <th>Lớp</th>
                <td>{{$res -> className}}</td>
            </tr>
            <tr>
                <th>Khóa</th>
                <td>{{$res -> schoolYear}}</td>
            </tr>
            <tr>
                <th>Ngành</th>
                <td>{{$res -> vocation}}</td>
            </tr>
            <tr>
                <th>Tình trạng học phí</th>
                <td>
                    {{$res -> stagesPresent <= $res -> totalStages
                        ? 'Đã nộp'
                        : 'Nợ '.($res -> stagesPresent - $res -> totalStages).' tháng'
                    }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <form class="w-full h-full bg-blue-200" action='{{url("admin/upstudent/{$res->id}")}}'>
                        @csrf
                        <button type="submit" class="edit_hover">Sửa</button>
                    </form>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/student/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="edit_hover">Xóa</button>
                    </form>
                </td>
            </tr>
        </table>
    @endsection
@endforeach
