@extends('admin.layout.master')
@section('title','Thêm nhân viên')

@section('content')
<div class="container-fluid pt-2" data-select2-id="34" >
    <div data-select2-id="33">
        <a href="{{url('admin/staff')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>Quay Lại
        </a>
        <div class="mt-3">
            <div class="card-header mb-3 w-full d-flex justify-content-center">
                <h3 class="card-title">Thêm nhân viên</h3>
            </div>
            <form action="{{url('admin/crestaff')}}" method="post" class="m-2">
                @csrf
                <label>Tên:</label>
                <input type="text" name="name" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1"><br>
                <label>Email:</label> 
                <input type="email" name="email" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1"><br>
                <label>Số điện thoại:</label> 
                <input type="text" name="phone" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1"><br>
                <label>địa chỉ:</label> 
                <input type="text" name="address" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1"><br>
                <label> mật khẩu:</label> 
                <input type="password" name="pass" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1"><br>
                <div class="col-12 d-flex justify-content-end ">
                    <button type="submit" required class=" bg-blue text-white form-control select2 select2-hidden-accessible col-1 mt-5 mr-5 "  data-select2-id="1" tabindex="-1">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
