@extends('admin.layout.master')
@section('title','Thêm lớp')

@section('content')
<div class="container-fluid pt-2" data-select2-id="34">
    <div data-select2-id="33">
        <a href="{{url('admin/class')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
            Quay lại

        </a>
        <form action="{{url('admin/creclass')}}" method="post">
            @csrf
            <div class="pt-2">
                <label class="col-4 flex mr-xl-5">
                    Ngành:

                    <select name="vocation" required class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="-1">
                        @foreach($vocation as $voca)
                        <option value="{{$voca -> idTotal}}">
                            {{$voca -> name}}
                        </option>
                        @endforeach
                    </select>
                </label>
                <label class="col-4 flex mr-xl-5">
                    Tên lớp:
                    <input type="text" name="name" required class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="-1">
                </label>
                <label class="col=5">Khóa:
                    <select name="schoolYear" required class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="-1">
                        @foreach($schoolYear as $year)
                        <option value="{{$year -> idYear}}">
                            {{$year -> name}}
                        </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="col-12 d-flex justify-content-end ">
                <button type="submit" required
                    class=" bg-blue text-white form-control select2 select2-hidden-accessible col-2 mt-5 mr-5 "
                    data-select2-id="1" tabindex="-1">Thêm</button>
            </div>
        </form>
    </div>
</div>
@endsection