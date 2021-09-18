@extends('admin.layout.master')
@section('title','Sửa thông tin')

@section('content')
<div class="container-fluid" data-select2-id="34" >
    <a href="{{url('admin/staffinfor')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Quay Lại
    </a>
    <div class="card card-default" data-select2-id="33">
        <form action="{{url('admin/poststaff')}}" method="post" class="m-2">
            @csrf
            @method('PUT')
            @foreach($rs as $res)
                <div>
                    <label class="m-3">
                        Họ và tên <br>
                        <input type="text" name="name" value="{{$res -> name}}" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <label class="m-3">
                        Email <br>
                        <input type="text" name="email" value="{{$res -> email}}" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <label class="m-3">
                        Số điện thoại  <br>
                        <input type="text" name="phone" value="{{$res -> phone}}" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <label class="m-3">
                        Địa chỉ <br>
                        <input type="text" name="address" value="{{$res -> address}}" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                </div>
                <div class="border-0" id="change">Đổi mật khẩu</div>
                <div id="pas">
                    <label class="m-3">
                        Mật khẩu cũ <br>
                        <input type="password" name="oldPass" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <label>
                        Mật khẩu mới <br>
                        <input type="password" name="newPass" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                </div>
            @endforeach
            <div class="col-12 d-flex justify-content-end">
            <button type="submit"  required class=" bg-blue text-white form-control select2 select2-hidden-accessible col-1 mt-5 mr-5 "  data-select2-id="1" tabindex="-1" ">Lưu</button>
            </div>
        </form>

        @if(\Illuminate\Support\Facades\Session::has('mes'))
            <div class="fadeIn fourth">{{\Illuminate\Support\Facades\Session::get('mes')}}</div>
        @endif
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#pas").toggle();
            $("#change").click(function(){
                $("#pas").toggle();
            });
        });
    </script>
@endsection
