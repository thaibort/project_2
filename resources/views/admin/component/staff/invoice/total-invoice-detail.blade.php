@extends('admin.layout.master')

@foreach($name as $res)
@section('title',$res->name)
@endforeach
@section('content')
<div class="pt-2">
    <a href='{{url("admin/invoice/{$mode}")}}'>

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
        </svg>
        Quay lại

    </a>
</div>
<h2 class="text-center">
    @foreach($name as $res)
    Danh sách hóa đơn sinh viên {{$res->name}}
    @endforeach</h2>
<table class="table table-bordered bg-white text-center">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Loại thu</th>
        <th>Ngày thu</th>
        <th>Số tiền</th>
        <th style="width: 250px">Hành động</th>
    </tr>
    @forelse($rs as $res)
    <tr>
        <td>{{$res -> id}}</td>
        <td>{{$res -> name}}</td>
        <td>{{$res -> typeOfTuition}}</td>
        <td>{{date('d - m - Y',strtotime($res -> date))}}</td>
        <td>{{number_format($res -> money)}}</td>
        <td class=" pt-2">
            <div class="d-flex flex-row w-full  ">
                <div class="col-6">
                    <form action='{{url("admin/detailinvoice")}}'>
                        <input type="text" name="id" value="{{$res -> id}}" hidden>
                        <input type="text" name="mode" value="{{$mode}}" hidden>
                        <button class=" bg-blue text-white form-control">Chi tiết</button>
                    </form>
                </div>
                <div class="col-6">
                    <form action="{{url("admin/invoice")}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="text" name="mode" value="{{$mode}}" hidden>
                        <input hidden type="text" value="{{$res -> id}}" name="id">
                        <input hidden type="text" value="{{$res -> idStudent}}" name="idStudent">
                        <button class=" bg-red text-white form-control">Xóa</button>
                    </form>
                </div>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">Hiện chưa có hóa đơn</td>
    </tr>
    @endforelse
</table>
@endsection
