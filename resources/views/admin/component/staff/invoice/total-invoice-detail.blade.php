@extends('admin.layout.master')

@foreach($name as $res)
    @section('title',$res->name)
@endforeach
    @section('body')
        <a href="{{url('admin/invoice')}}">Quay lại</a>
        <h1>
            @foreach($name as $res)
                Danh sách hóa đơn sinh viên {{$res->name}}
            @endforeach</h1>
        <table>
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
