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
                <th>Hộc bổng</th>
                <td>{{$res -> scholarship}}</td>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Xóa
                        </button>

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
                </td>
            </tr>
        </table>
    @endsection
@endforeach
