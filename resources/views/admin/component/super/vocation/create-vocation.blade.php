@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('content')
<div class="container-fluid pt-2" data-select2-id="34" >
    <div data-select2-id="33">
    <a href="{{url('admin/vocation')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Quay lại
        </a>
        <form action="{{url('admin/crevoca')}}" method="post" class="col-12">
            @csrf
            <label class="col-4 flex mr-xl-5">Tên Ngành
            <input type="text" name="name" required class="m-1 form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
            </label>
            <label class="col-4">Tổng Học Phí Ngành
                <input type="text" name="money" min="0" maxlength="9" required class="m-3 form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
            </label>
            <div class="col-12 d-flex justify-content-end ">
            <button type="submit"  class=" bg-blue text-white form-control select2 select2-hidden-accessible col-1 mt-5 mr-5 "  data-select2-id="1" tabindex="-1" >Thêm</button>
            </div>
        </form>
    </div>
</div>
@endsection
