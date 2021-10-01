@extends('client.layout.master')
@section('title','Trang Chủ')
@section('menu')
<div
    class="order-last  border-red-500 border-b-2 mr-10 hover:text-blue-700 font-bold h-14 flex items-center w-20 justify-center">
    <form action="{{url('/')}}">
        @csrf
        <input type="text" hidden name="mode" value="0" class="bg-opacity-0">
        <input type="submit" value="Trang Chủ" class="bg-blue-200 text-lg">
    </form>
</div>
<div class="order-last mr-10 hover:text-blue-700 font-bold h-14 flex items-center w-20 justify-center">
    <form action="{{url('invoice')}}">
        @csrf
        <input type="text" hidden name="mode" value="1" class="bg-opacity-0">
        <input type="submit" value="Phiếu Thu" class="bg-blue-200 text-lg">
    </form>
</div>
@endsection
@section('body')
<div class="owl-item active" style="width: 1475px;">
    <div class="item">
        <a class="item-img cover hide" href=""
            style="background:url(https://www.bkacad.com/images/slideshow/2020/08/06/slideshow_large/banner-slide-1_1596680312.jpg) no-repeat center center;"
            title="Học viện uy tín nhất khu vực Châu Á - Thái Bình Dương"></a>
        <a class="item-cover " href="" title="Học viện uy tín nhất khu vực Châu Á - Thái Bình Dương">
            <img class="img-responsive"
                src="https://www.bkacad.com/images/slideshow/2020/08/06/slideshow_large/banner-slide-1_1596680312.jpg"
                alt="Học viện uy tín nhất khu vực Châu Á - Thái Bình Dương">
        </a>
    </div>
    <div class="flex justify-between">
        <div>
        <h3 class="text-xl font-semibold text-red-600 "> HỌC VIỆN CÔNG NGHỆ BKACAD</h3>
            <h1 class="text-lg font-medium text-blue-500"> Hệ chứng chỉ & Hệ chuyên gia  quốc tế</h1>
            <h1 class="text-sm">Địa chỉ: P214, Tòa nhà A17 Bách Khoa, 17 Tạ Quang Bửu, Hai Bà Trưng, Hà Nội</h1>
            <h1 class="text-sm">ĐT: 036 779 1116 - 0243 623 1023 </h1>
        </div>
        <div class="pt-6">
            <h1 class="text-lg font-medium text-blue-500"> Cơ sở TP. Hồ Chí Minh  </h1>
            <h1 class="text-sm"> Địa chỉ : Số 15, Đường Chợ Lớn, Phường 11, Quận 6, TP. Hồ Chí Minh</h1>
            <h1 class="text-sm">   ĐT: 0283 755 9979 - 0918 55 46 55 </h1>
        </div>
    </div>
    @endsection