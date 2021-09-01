@extends('admin.layout.master')
@section('title','Thêm lớp')

@section('body')
    <a href="{{url('admin/class')}}">Quay lại</a>
    <form action="{{url('admin/creclass')}}" method="post">
        @csrf
        <div>
            Ngành:
            <select name="vocation">
                @foreach($vocation as $voca)
                <option value="{{$voca -> idTotal}}">
                    {{$voca -> name}}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            Khóa:
            <select name="schoolYear">
                @foreach($schoolYear as $year)
                    <option value="{{$year -> idYear}}">
                        {{$year -> name}}
                    </option>
                @endforeach
            </select>
        </div>
        Tên lớp: <input type="text" name="name">

        <button type="submit">Thêm</button>
    </form>
@endsection
