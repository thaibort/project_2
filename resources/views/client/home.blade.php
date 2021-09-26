@extends('client.layout.master')
@section('title','Trang chủ')
@section('menu')
    <div class="order-last  border-red-500 border-b-2 mr-10 hover:text-blue-700 font-bold h-14 flex items-center w-20 justify-center">
        <form action="{{url('/')}}">
            @csrf
            <input type="text" hidden name="mode" value="0" class="bg-opacity-0">
            <input type="submit" value="Trang chủ" class="bg-blue-200">
        </form>
    </div>
    <div class="order-last mr-10 hover:text-blue-700 font-bold h-14 flex items-center w-20 justify-center">
        <form action="{{url('invoice')}}">
            @csrf
            <input type="text" hidden name="mode" value="1" class="bg-opacity-0">
            <input type="submit" value="Phiếu thu" class="bg-blue-200">
        </form>
    </div>
@endsection
@section('body')
    <h1>Home</h1>
@endsection
