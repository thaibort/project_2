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
    <div class="container mx-auto">
        <table class=" mr-10 table-auto w-full bg-gray-100 mt-10 text-center" cellpadding="0" cellspacing="0">
            <tr>
                <th class="h-14 bg-blue-700 border-2 border-black text-white">Mã sinh viên</th>
                <th class="h-14 bg-blue-700 border-2 border-black text-white">Ngành</th>
                <th class="h-14 bg-blue-700 border-2 border-black text-white">Khóa</th>
                <th class="h-14 bg-blue-700 border-2 border-black text-white">Lớp</th>
                <th class="h-14 bg-blue-700 border-2 border-black text-white">Họ và tên</th>
                <th class="h-14 bg-blue-700 border-2 border-black text-white">Tình trạng học phí</th>
                <th class="h-14 bg-blue-700 border-2 border-black text-white">Hành động</th>
            </tr>
            @forelse($rs as $res)
                <tr class="hover:bg-gray-300">
                    <td class="h-8 border-2 border-black text-center">{{$res -> id}}</td>
                    <td class="h-8 border-2 border-black text-center">{{$res -> vocation}}</td>
                    <td class="h-8 border-2 border-black text-center">{{$res -> schoolYear}}</td>
                    <td class="h-8 border-2 border-black text-center">{{$res -> className}}</td>
                    <td class="h-8 border-2 border-black text-center">{{$res -> name}}</td>
                    <td class="h-8 border-2 border-black text-center">
                        {{$res -> stagesPresent <= $res -> totalStages
                            ? 'Đã nộp'
                            : 'Nợ '.($res -> stagesPresent - $res -> totalStages).' tháng'
                        }}
                    </td>
                    <td class="h-8 border-2 border-black text-center">
                        <form action="{{url("toinvoice")}}">
                            <input type="text" name="id" value="{{$res -> id}}" hidden>
                            <input type="text" name="mode" value="{{$mode}}" hidden>
                            <input type="submit" value="Tổng phiếu thu" class="bg-transparent">
                        </form>
                    </td>
                </tr>
            @empty
                <tr class="h-8 border-2 border-black text-center">
                    <td colspan="8" class="">Không có dữ liệu sinh viên</td>
                </tr>
            @endforelse
        </table>
        <div class="w-full pl-20 absolute bottom-10 right-10">
            {{$rs->links()}}
        </div>
    </div>
@endsection
