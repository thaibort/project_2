@extends('admin.layout.master')

@foreach($name as $res)
    @section('title',$res->name)
@endforeach
@section('content')
        <a href="{{url('admin/invoice')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Quay lại</a>
        <h1>
            @foreach($name as $res)
                Danh sách hóa đơn sinh viên {{$res->name}}
            @endforeach</h1>
        <table class="table table-bordered bg-white">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Loại thu</th>
                <th>Ngày thu</th>
                <th>Số tiền</th>
                <th>Hành động</th>
            </tr>
            @forelse($rs as $res)
                <tr>
                    <td>{{$res -> id}}</td>
                    <td>{{$res -> name}}</td>
                    <td>{{$res -> typeOfTuition}}</td>
                    <td>{{$res -> date}}</td>
                    <td>{{$res -> money}}</td>
                    <td>
                        <form action='{{url("admin/detailinvoice/{$res -> id}")}}'>
                            <button>Chi tiết</button>
                        </form>
                        <form action="{{url("admin/invoice")}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input hidden type="text" value="{{$res -> id}}" name="id">
                            <input hidden type="text" value="{{$res -> idStudent}}" name="idStudent">
                            <button>Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Hiện chưa có hóa đơn</td></tr>
            @endforelse
        </table>
    @endsection
