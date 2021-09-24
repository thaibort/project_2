@extends('admin.layout.master')

@section('title','Thu học phí')
@section('content')
@foreach($rs as $res)
<div class="pt-2">
    <form action='{{url("admin/checkinfor")}}' class="d-flex justify-content-end">
        <input type="text" value="{{$res -> id}}" name="id" hidden>
        <input type="text" value="{{$mode}}" name="mode" hidden>
        <button class=" bg-red text-white btn btn-outline-secondary m-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                 class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
            Quay lại
        </button>
    </form>
    <a href='{{url("admin/checkinfor/{$res -> id}")}}'>

    </a>
</div>
@endforeach
@forelse($rs as $res)
<div class="pt-2">
    <div class="d-flex flex-row text-lg text-center">
        <table class="table table-bordered bg-white">
            <tr>
                <td> Tên: </td>
                <td>{{$res -> studentName}}</td>
            </tr>
            <tr>
                <td> Email: </td>
                <td>{{$res -> email}}</td>
            </tr>
            <tr>
                <td> Số điện thoại: </td>
                <td>{{$res -> phone}}</td>
            </tr>
            <tr>
                <td> Địa chỉ: </td>
                <td> {{$res -> address}}</td>
            <tr>
                <td> Giới tính:</td>
                <td>{{$res -> gender == 1 ? 'Nam' : 'Nữ'}}</td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td> {{$res -> dob}}</td>
            </tr>

            <tr>
                <td> Lớp: </td>
                <td> {{$res -> className}}</td>
            </tr>
            <tr>
                <td> Ngành học: </td>
                <td> {{$res -> vocation}}</td>
            </tr>
            <tr>
                <td>Loại thu: </td>
                <td>@foreach($type as $item) {{$item -> name}} @endforeach</td>
            </tr>
            <tr>
                <td> Tổng tiền nộp: </td>
                <td> {{$total}}</td>
            </tr>
            <tr>
                <td> Ngày thu: </td>
                <td> {{\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <td> Người thu: </td>
                <td> {{session()->get('admin.name')}}</td>
            </tr>

        </table>
    </div>

    <form action='{{url("admin/creinvoice")}}' method="post">
        @csrf
        <input hidden type="text" value="{{session()->get('admin.id')}}" name="admin">
        <input hidden type="text" value="{{$res -> id}}" name="id">
        <input hidden type="text" value="{{$mode}}" name="mode">
        <input hidden type="text" value="{{$total}}" name="money">
        <input hidden type="text" value='@foreach($type as $item) {{$item -> id}} @endforeach' name="type">
        <input hidden type="text" value="{{\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->toDateString()}}"
            name="date">
        <div class="col-12 d-flex justify-content-end ">
            <button type="submit" required
                class=" bg-blue text-white form-control select2 select2-hidden-accessible col-1 mt-4 mr-4 "
                data-select2-id="1" tabindex="-1">Xác nhận</button>
        </div>
    </form>
</div>
@empty
<div colspan="6">Hiện chưa có hóa đơn</div>
@endforelse
@endsection
