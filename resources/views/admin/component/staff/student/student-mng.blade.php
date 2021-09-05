@extends('admin.layout.master')
@section('title', 'Quản lý sinh viên')

@section('body')
    <div>
        <a href="{{url('admin/crestudent')}}">thêm sinh viên</a>
    </div>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Tên</td>
                <td>Lớp</td>
                <td>Khóa</td>
                <td>Tinh trạng</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <tbody>
            @forelse($rs as $res)
                <tr>
                    <td>{{$res -> id}}</td>
                    <td>{{$res -> studentName}}</td>
                    <td>{{$res -> className}}</td>
                    <td>{{$res -> schoolYear}}</td>
                    <td>
                        {{$res -> stagesPresent <= $res -> totalStages
                            ? 'Đã nộp'
                            : 'Nợ '.($res -> stagesPresent - $res -> totalStages).' tháng'
                        }}
                    </td>
                    <td><a href='{{url("admin/stuinfor/{$res -> id}")}}'>Chi tiết</a></td>
                </tr>
            @empty
                <tr><td colspan="6">Không có dữ liệu</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
