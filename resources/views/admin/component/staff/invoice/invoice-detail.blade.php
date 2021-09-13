@extends('admin.layout.master')

    @section('title',$name)
    @section('content')
    <a href='{{url("admin/toindetail/{$idstu}")}}'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Quay lại</a>
    @forelse($rs as $res)
        <div>
            <div class="d-flex flex-row text-lg">
                <div class="mr-5" >
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
