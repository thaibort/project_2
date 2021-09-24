@extends('admin.layout.master')

@section('title','Tăng đợt')

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
<form action='{{url("admin/stageform/{$mode}")}}' method="post" class="mr-5">
    @csrf
    <input type="text" name="mode" value="1" hidden class="mr-5">
    <div class="row">
        <div class="col-md-6">

            <label>
                Tên người tăng :
            </label>

            {{session()->get('admin.name')}}

        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 text-center">
                    <label>
                        Thời gian thu
                    </label>
                </div>
                <div class="col-md-6 text-center border-right">
                    <label>
                        Ngày bắt đầu: <br>
                    </label>
                    <input type="date" required name="start" class=" form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="-1">
                </div>
                <div class="col-md-6 text-center border-right">
                    <label>
                        Ngày kết thúc: <br>
                    </label>
                    <input type="date" required name="end" class=" form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="-1">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 text-center border-bottom border-right">
            <label>
                Đợt hiện tại của các khóa
            </label>
        </div>
        <div class="col-md-6 text-center border-bottom ">
            <label>
                Đợt tiếp theo của các khóa
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center border-right">
            @foreach($rs as $res)
            <div class="mr-5 flex">
                Khóa : {{$res -> name}}<br>
                Đợt : {{$res -> stagesPresent}}
            </div>
            @endforeach
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            @foreach($rs as $res)
            <div class="mr-5 flex">
                Khóa : {{$res -> name}}<br>
                Đợt : {{$res -> stagesPresent + 1}}
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-end ">
            <button type="submit"
                class="bg-blue text-white form-control select2 select2-hidden-accessible col-2 mt-4 mr-4">Xác Nhận
                Tăng</button>
        </div>
    </div>

</form>
</div>
@endsection
