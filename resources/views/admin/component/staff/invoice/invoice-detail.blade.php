@extends('admin.layout.master')

    @section('title',$name)
@section('body')
    <a href='{{url("admin/toindetail/{$idstu}")}}'>Quay lại</a>
    @forelse($rs as $res)
        <div>
            <div class="d-flex flex-row text-lg">
                <div class="mr-5">
                    Tên: {{$res -> name}}<br>
                    Email: {{$res -> email}}<br>
                    Số điện thoại: {{$res -> phone}}<br>
                    Địa chỉ: {{$res -> address}}<br>
                    Giới tính: {{$res -> gender == 1 ? 'Nam' : 'Nữ'}}<br>
                    Ngày sinh: {{$res -> dob}}<br>
                </div>
                <div>
                    Lớp: {{$res -> className}}<br>
                    Ngành học: {{$res -> vocation}}<br>
                    Loại thu: {{$res -> typeOfTuition}}<br>
                    Tổng tiền nộp: {{$res -> money}}<br>
                    Ngày thu: {{$res -> date}}<br>
                    Người thu: {{$res -> admin}}
                </div>
            </div>
            <form action='{{url("admin/invoice")}}' method="post">
                @csrf
                @method('DELETE')
                <input hidden type="text" value="{{$res -> id}}" name="id">
                <input hidden type="text" value="{{$res -> idStudent}}" name="idStudent">
                <button>Xóa</button>
            </form>
        </div>
    @empty
        <div>Hiện chưa có hóa đơn</div>
    @endforelse
@endsection
