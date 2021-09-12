@extends('admin.layout.master')

@section('title','Thu học phí')

@section('body')
    <a href="{{url('admin/invoice')}}">Quay lại</a>
    @foreach($rs as $res)
        <form action='{{url("admin/gocreinvoice")}}' method="post">
            @csrf
            <div>
                <input type="text" name="id" hidden value="{{$res -> id}}">
                Mã sinh viên: {{$res -> id}}<br>
                Tên sinh viên: {{$res -> studentName}}<br>
                Khóa: {{$res -> schoolYear}}<br>
                Ngành: {{$res -> vocation}}<br>
                Lớp: {{$res -> className}}<br>
                Phương thức thu học phí:
                <select name="typeOfTuition">
                    @foreach($type as $item)
                        <option value="{{$item -> id}}">
                            {{$item -> name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Tiếp</button>
        </form>
    @endforeach
@endsection
