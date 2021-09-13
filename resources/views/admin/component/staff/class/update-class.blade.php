@extends('admin.layout.master')
@section('title','Sửa lớp')

@section('content')
<form action="{{url('admin/upclass')}}" method="post" class="m-2">
        @csrf
        @method('PUT')
        @foreach($rs as $res)
            <a href="{{url('admin/class')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Quay lại</a>
           <div>
            <label  class="col-4 flex mr-xl-5"> Ngành:
                <select name="vocation" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    @foreach($vocation as $voca)
                        <option value="{{$voca -> idTotal}}" @if($res -> idTotalMoney == $voca -> idTotal) selected @endif>
                            {{$voca -> name}}
                        </option>
                    @endforeach
                </select>
            </label> 
            <label  class="col-4 flex mr-xl-5"> Khóa:
                <select name="schoolYear" required class=" form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    @foreach($SchoolYear as $year)
                        <option value="{{$year -> idYear}}" @if($res -> idSchoolYear == $year -> idYear) selected @endif>
                            {{$year -> name}}
                        </option>
                    @endforeach
                </select>
                </label>
           <label>
            <input type="text" name="id" value="{{$res -> id}}" hidden >
            </label>
            <label  class="col-4 flex mr-xl-5">Tên lớp:
            <input type="text" name="name" value="{{$res -> name}}" required class=" form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
            </label>
            </div>
        @endforeach
        <div class="col-12 d-flex justify-content-end ">
        <button type="submit" required class=" bg-blue text-white form-control select2 select2-hidden-accessible col-2 mt-5 mr-5 "  data-select2-id="1" tabindex="-1">Sửa</button>
        </div>
    </form>
@endsection