@extends('client.layout.master')
@section('title','Phiếu thu')
@section('menu')
    <div class="order-last mr-10 hover:text-blue-700 font-bold h-14 flex items-center w-20 justify-center">
        <form action="{{url('/')}}">
            @csrf
            <input type="text" hidden name="mode" value="0" class="bg-opacity-0">
            <input type="submit" value="Trang chủ" class="bg-blue-200">
        </form>
    </div>
    <div class="order-last mr-10 border-red-500 border-b-2 hover:text-blue-700 font-bold h-14 flex items-center w-20 justify-center">
        <form action="{{url('invoice')}}">
            @csrf
            <input type="text" hidden name="mode" value="1" class="bg-opacity-0">
            <input type="submit" value="Phiếu thu" class="bg-blue-200">
        </form>
    </div>
@endsection
@section('body')
    <div class="pt-2">
        <form action="{{url("invoice")}}">
            <input type="text" name="mode" value="1" hidden>
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                </svg>
                <input type="submit" class="bg-white" value="Quay lại">
            </div>
        </form>
    </div>
    <h2 class="text-center">
        @foreach($name as $res)
            Danh sách hóa đơn sinh viên {{$res->name}}
        @endforeach</h2>
    <table class="w-5/6 mx-auto text-center">
        <tr>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">ID</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Tên</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Loại thu</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Ngày thu</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Số tiền</th>
        </tr>
        @forelse($rs as $res)
            <tr class="hover:bg-gray-300">
                <td class="h-8 border-2 border-black text-center">{{$res -> id}}</td>
                <td class="h-8 border-2 border-black text-center">{{$res -> name}}</td>
                <td class="h-8 border-2 border-black text-center">{{$res -> typeOfTuition}}</td>
                <td class="h-8 border-2 border-black text-center">{{$res -> date}}</td>
                <td class="h-8 border-2 border-black text-center">{{number_format($res -> money)}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Hiện chưa có hóa đơn</td>
            </tr>
        @endforelse
    </table>
@endsection
