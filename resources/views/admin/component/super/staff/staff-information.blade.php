@extends('admin.layout.master')

@section('content')
    @foreach($rs as $res)
        <table>
            <tr>
                <th>
                    Tên
                </th>
                <td>
                    {{$res -> name}}
                </td>
            </tr>
            <tr>
                <th>
                    Email
                </th>
                <td>
                    {{$res -> email}}
                </td>
            </tr>
            <tr>
                <th>
                    Số điện thoại
                </th>
                <td>
                    {{$res -> phone}}
                </td>
            </tr>
            <tr>
                <th>
                    Địa chỉ
                </th>
                <td>
                    {{$res -> address}}
                </td>
            </tr>
        </table>

        <form action="{{url('admin/upstaff')}}">
            @csrf
            <button type="submit">Sửa thông tin</button>
        </form>
    @endforeach
@endsection
