@extends('admin.layout.master')
@section('title','Thêm sinh viên')

@section('content')
<div class="pt-2">
    <a href="{{url('admin/student')}}">
        <button aria-colspan="3" type="button" class="bg-blue text-white btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
            Quay lại
        </button>
    </a>
</div>
    <div class="pt-2">
        <form action="{{url('admin/crestudent')}}" method="post">
            @csrf
            <div>
                <label class="col-4 flex mr-xl-5">
                    Chọn Lớp
                    <select name="class"  class="border-1  btn btn-outline-secondary mrt-5">
                        @forelse($class as $resclass)
                            <option value="{{$resclass -> id}}" >
                                {{$resclass -> name}}
                            </option>
                        @empty
                            <option>Không có dữ liệu</option>
                        @endforelse
                    </select>
                </label>
            </div>
            <div>
                <label  class="col-4">
                    Chọn Loại Học Bổng
                    <select name="scholarship" class="border-1 btn btn-outline-secondary mrt-5">
                        @forelse($scholarship as $resscholarship)
                            <option value="{{$resscholarship -> id}}" >
                                {{$resscholarship -> id == 0 ? 'Không có học bổng' : $resscholarship -> type}}
                            </option>
                        @empty
                            <option>Không Có Dữ Liệu</option>
                        @endforelse
                    </select>
                </label>
            </div>
            <div>
                    <label class="col-4 flex mr-xl-5">
                        Tên: <input type="text" name="name" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <label class="col-4">
                        Số điện thoại: <input type="tel" name="phone" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <label class="col-4 flex mr-xl-5">
                        Email: <input type="email" name="email" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <label class="col-4 ">
                        Địa chỉ: <input type="text" name="address" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <label class="col-4 flex mr-xl-5">
                        Ngày sinh: <input type="date" name="dob" required class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1">
                    </label>
                    <b>Giới Tính:&nbsp;</b>
                    <label class="col-2">
                        <input type="radio" value="1" name="gender" checked> Nam
                    </label>
                    <label class="col-2">
                        <input type="radio" value="0" name="gender"> Nữ
                    </label>
            </div>
            <div class="col-12 d-flex justify-content-end">
            <button type="submit" required class=" bg-blue text-white form-control select2 select2-hidden-accessible col-1 mt-5 mr-5 "  data-select2-id="1" tabindex="-1" >Thêm</button>
            </div>
        </form>
    </div>
@endsection
