@extends('admin.layout.master')

@section('title','Thu học phí')
@section('body')
    <a href='{{url("admin/invoice")}}'>Quay lại</a>
    @forelse($rs as $res)
        <div>
            <div class="d-flex flex-row text-lg">
                <div class="mr-5">
                    Tên: {{$res -> studentName}}<br>
                    Email: {{$res -> email}}<br>
                    Số điện thoại: {{$res -> phone}}<br>
                    Địa chỉ: {{$res -> address}}<br>
                    Giới tính: {{$res -> gender == 1 ? 'Nam' : 'Nữ'}}<br>
                    Ngày sinh: {{$res -> dob}}<br>
                </div>
                <div>
                    Lớp: {{$res -> className}}<br>
                    Ngành học: {{$res -> vocation}}<br>
                    Loại thu: @foreach($type as $item) {{$item -> name}} @endforeach<br>
                    Tổng tiền nộp: {{$total}}<br>
                    Ngày thu: {{\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y')}}<br>
                    Người thu: {{session()->get('admin.name')}}
                </div>
            </div>
            <form action='{{url("admin/creinvoice")}}' method="post">
                @csrf
                <input hidden type="text" value="{{session()->get('admin.id')}}" name="admin">
                <input hidden type="text" value="{{$res -> id}}" name="id">
                <input hidden type="text" value="{{$total}}" name="money">
                <input hidden type="text" value='@foreach($type as $item) {{$item -> id}} @endforeach' name="type">
                <input hidden type="text" value="{{\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->toDateString()}}" name="date">
                <button type="submit">Xác nhận</button>
            </form>
        </div>
    @empty
        <div colspan="6">Hiện chưa có hóa đơn</div>
    @endforelse
@endsection
