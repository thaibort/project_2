@extends('admin.layout.master')
@section('title','Sửa lớp')

@section('body')
    <form action="" method="post">
        @csrf
        @method('PUT')
        @foreach($rs as $res)
            <a href="{{url('admin/upclass')}}">Quay lại</a>
            <div>
                Ngành:
                <select name="vocation">
                    @foreach($vocation as $voca)
                        <option value="{{$voca -> idTotal}}" @if($res -> idTotalMoney == $voca -> idTotal) selected @endif>
                            {{$voca -> name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                Khóa:
                <select name="schoolYear">
                    @foreach($SchoolYear as $year)
                        <option value="{{$year -> idYear}}" @if($res -> idSchoolYear == $year -> idYear) selected @endif>
                            {{$year -> name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="text" name="id" value="{{$res -> id}}" hidden>
            Tên lớp: <input type="text" name="name" value="{{$res -> name}}">
        @endforeach
        <button type="submit">Sửa</button>
    </form>
@endsection
