@extends('admin.layout.master')

@foreach($rs as $res)
@section('title',$res->studentName)
@section('content')
<div class="pt-2">
    <a href="{{url('admin/student')}}">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
            Quay lại

    </a>
</div>
<div class="pt-2">
    <table class="table table-bordered bg-white text-center">
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
            <td>{{$res -> scholarship == 0 ? 'Không có học bổng' : $res -> scholarship}}</td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="d-flex flex-row mr-5 d-flex justify-content-end">
                    <div>
                        <form class="w-full h-full bg-blue-200" action='{{url("admin/upstudent/{$res->id}")}}'>
                            @csrf
                            <button type="submit"
                                class="edit_hover bg-blue text-white btn btn-outline-secondary mr-5">Sửa</button>
                        </form>
                    </div>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/student/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Xóa
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
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
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</div>
@endsection
@endforeach
