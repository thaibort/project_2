@extends('admin.layout.master')

@section('content')
@foreach($rs as $res)
<div class="pt-2">
    <table class="table table-bordered bg-white">
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
</div>
<form action="{{url('admin/upstaff')}}">
    @csrf
    <div class="col-12 d-flex justify-content-end ">
        <button type="submit" required
            class=" bg-blue text-white form-control select2 select2-hidden-accessible col-2 mt-2 mr-2 "
            data-select2-id="1" tabindex="-1">Sửa thông tin</button>
    </div>
</form>
@endforeach
@endsection