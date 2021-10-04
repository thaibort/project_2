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

    <style type="text/css">
        #id{

        }
    </style>
    <!-- Tieu de -->
    <div style="width: 100%">
        <div style="width: 100%">
            <div style="display:inline-block; width : 65%; float:left">
                <a href=" https://www.bkacad.com/" title="BKACAD" class="logo ">
                    <img style="max-width:200px; max-height:100px" src="https://www.bkacad.com/images/config/logo_1591255072.png"
                        alt="logo">
                </a>
            </div>

            <div style="display:inline-block; width : 25%; float:left; text-align: center">
                Mã số 01 - TT
                <p span style="font-style: italic"> (Ban hành theo Thông tư số 200/2014/TT-BTC Ngày 22/12/2014 của Bộ Tài chính) </p>

            </div>
        </div>
        <div style="width: 100%; display: flex; flex-direction: row; justify-content: space-between;">
            <div style="display:inline-block; width : 33%;  " >

            </div>
            <div style="display:inline-block; width : 33%;  text-align: center; font-weight: bold ;">
               <h2 style=" font-weight: bold"> PHIẾU THU </h2>
                <p style="text-align:center ;font-style: italic ">{{ "Ngày ".\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->format('d')." Tháng ".\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->format('m')." Năm ".\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->format('Y')}} </p>
            </div>

            <div style="display:inline-block; width : 33%; ">
               Quyển số :................................
               <p>Số :PT210309450</p>
               <p>Nợ : 1111.3</p>
               <p>Có : 1313</p>
            </div>
        </div>
    </div>

    <!-- Noi dung -->
    <div style="width: 100% ;margin-left: 50px;">
        <div>
            Họ và tên : {{$res -> studentName}}
        </div>
        <div>
            Địa chỉ : {{$res -> address}}
        </div>
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

        </div>
    </div>
    <div style="text-align: right;font-style: italic; height:50px">
        Ngày.......tháng.........năm.........
    </div>

    <style type="text/css">
        .bill-kyten{
            display:inline-block; width : 20%;  text-align: center;
        }
    </style>
    <!-- Phan ky ten -->
    <div style="width: 100%; ">
        <div  style="width: 100%;  display: flex; flex-direction: row; ">
                <div class="bill-kyten ">
                   Giám đốc
                   <p>(Ký , họ tên , đóng dấu)</p>
                </div>
                <div  class="bill-kyten">
                    Kế toán trưởng
                    <p>(Ký , họ tên)</p>
                </div>
                <div class="bill-kyten">
                   Người nộp tiền
                    <p>(Ký , họ tên)</p>
                </div>
                <div class="bill-kyten">
                    Người lập phiếu
                    <p>(Ký , họ tên)</p>
                </div>
                <div class="bill-kyten">
                    Người thủ Quỹ
                    <p>(Ký , họ tên)</p>
                </div>

        </div>
        <div  style="width: 100%;  display: flex; flex-direction: row;  text-align: center; margin-top:60px ">
            <div style = "display:inline-block; width : 20%  ">

            </div>
            <div style = "display:inline-block; width : 20%;  ">

            </div>
            <div style = "display:inline-block; width : 20%; ">
                {{$res -> studentName}}
            </div>
            <div style = "display:inline-block; width : 20%  ">
                {{session()->get('admin.name')}}
            </div>
            <div style = "display:inline-block; width : 20%;  ">

            </div>
        </div>
    </div>

    {{-- Phan so tien da nhan --}}
    <div>Đã nhận đủ số tiền ( Viết  bằng chữ ) :</div>
</div>


<div class="col-12 d-flex justify-content-end pb-3 no-print">
    <button class=" bg-blue text-white form-control select2 select2-hidden-accessible col-2 mt-3 mr-3 "
        onclick="window.print()">In Hóa đơn
    </button>
    <form action='{{url("admin/creinvoice")}}' method="post">
        @csrf
        <input hidden type="text" value="{{session()->get('admin.id')}}" name="admin">
        <input hidden type="text" value="{{$res -> id}}" name="id">
        <input hidden type="text" value="{{$mode}}" name="mode">
        <input hidden type="text" value="{{$total}}" name="money">
        <input hidden type="text" value='@foreach($type as $item) {{$item -> id}} @endforeach' name="type">
        <input hidden type="text"
            value="{{\Illuminate\Support\Carbon::now('Asia/Ho_Chi_Minh')->toDateString()}}" name="date">
        <button type="submit"
            class=" bg-blue text-white form-control select2 select2-hidden-accessible mt-3 mr-3 "
            data-select2-id="1" tabindex="-1">Xác nhận</button>
    </form>
</div>
@empty
<div>Hiện chưa có hóa đơn</div>
@endforelse
@endsection
