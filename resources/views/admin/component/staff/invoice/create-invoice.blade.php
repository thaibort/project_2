@extends('admin.layout.master')

@section('title','Thu học phí')


@section('css')
    <link rel="stylesheet" href="/css/general.css">
@stop

@section('content')
@foreach($rs as $res)
<div class="pt-2 no-print">
    <form action='{{url("admin/checkinfor")}}'>
        <input type="text" value="{{$res -> id}}" name="id" hidden>
        <input type="text" value="{{$mode}}" name="mode" hidden>
        <button class="bg-light border-0 hover:none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
            Quay lại
        </button>
    </form>
</div>
@endforeach
@forelse($rs as $res)
<div class="pt-2">
    <h1 class="d-flex justify-content-center">Phiếu thu</h1>
    <div class="col-12">
        <div class="d-flex col-12 flex-row text-lg text-center ">
            <div class="d-flex col-12">
                <div class="col-6">
                    <div>
                        Họ và tên : {{$res -> studentName}}
                    </div>
                    <div>
                        Email : {{$res -> email}}
                    </div>
                    <div>
                        Số điện thoại : {{$res -> phone}}
                    </div>
                    <div>
                        Địa chỉ : {{$res -> address}}
                    </div>
                    <div>
                        Giới tính : {{$res -> gender == 1 ? 'Nam' : 'Nữ'}}
                    </div>
                    <div>
                        Ngày sinh : {{date('d - m - Y',strtotime($res -> dob))}}
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        Lớp : {{$res -> className}}
                    </div>
                    <div>
                        Ngành học : {{$res -> vocation}}
                    </div>
                    <div>
                        Loại thu : @foreach($type as $item) {{$item -> name}} @endforeach
                    </div>
                    <div>
                        Tổng tiền nộp : {{number_format($total)}}
                    </div>
                    <div>
                        Ngày thu : {{\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y')}}
                    </div>
                    <div>
                        Người thu : {{session()->get('admin.name')}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-end pb-3 no-print">
            <button
                class=" bg-blue text-white form-control select2 select2-hidden-accessible col-2 mt-3 mr-3 "
                onclick="window.print()">In Hóa đơn
            </button>
            <form action='{{url("admin/creinvoice")}}' method="post">
                @csrf
                <input hidden type="text" value="{{session()->get('admin.id')}}" name="admin">
                <input hidden type="text" value="{{$res -> id}}" name="id">
                <input hidden type="text" value="{{$mode}}" name="mode">
                <input hidden type="text" value="{{$total}}" name="money">
                <input hidden type="text" value='@foreach($type as $item) {{$item -> id}} @endforeach' name="type">
                <input hidden type="text" value="{{\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->toDateString()}}"
                    name="date">
                    <button
                        type="submit"
                        class=" bg-blue text-white form-control select2 select2-hidden-accessible mt-3 mr-3 "
                        data-select2-id="1" tabindex="-1">Xác nhận</button>
            </form>
        </div>
    </div>
</div>
@empty
<div>Hiện chưa có hóa đơn</div>
@endforelse
@endsection
