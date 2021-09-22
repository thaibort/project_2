@extends('admin.layout.master')

@section('title','Thu học phí')

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
<div class="pt-2">
    @foreach($rs as $res)
    <form action='{{url("admin/gocreinvoice")}}' method="post">
        @csrf
        <div>
            <table class="table table-bordered bg-white ">
                <tr>
                    <td>Mã sinh viên</td>
                    <td>{{$res -> id}}</td>
                </tr>
                <tr>
                    <td>Tên sinh viên: </td>
                    <td>{{$res -> studentName}}</td>
                </tr>
                <tr>
                    <td>Mã sinh viên</td>
                    <td>{{$res -> id}}</td>
                </tr>
                <tr>
                    <td>Khóa:</td>
                    <td>{{$res -> schoolYear}}</td>
                </tr>
                <tr>
                    <td>Ngành:</td>
                    <td>{{$res -> vocation}}</td>
                </tr>
                <tr>
                    <td>Lớp:</td>
                    <td>{{$res -> className}}</td>
                </tr>
                <tr>
                    <td> Phương thức thu học phí:</td>
                    <td>
                        <select name="typeOfTuition" class="col-12 border-white"
                            style="outline: 2px solid transparent; outline-offset: 2px;">
                            @foreach($type as $item)
                            <option value="{{$item -> id}}">
                                {{$item -> name}}
                            </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <input type="text" name="id" hidden value="{{$res -> id}}">
            <input type="text" name="mode" hidden value="{{$mode}}">
        </div>
        <div class="col-12 d-flex justify-content-end ">
            <button type="submit"
                class=" bg-blue text-white form-control select2 select2-hidden-accessible col-1 mt-4 mr-4 "
                data-select2-id="1" tabindex="-1">Tiếp</button>
        </div>
    </form>
    @endforeach
</div>
@endsection
