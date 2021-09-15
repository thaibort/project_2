@extends('admin.layout.master')

    @section('title',$name)
    @section('content')
    <a href='{{url("admin/toindetail/{$idstu}")}}'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short text-black hover:text-green" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Quay lại</a>
    @forelse($rs as $res)
        <div>
            <table class="table table-bordered bg-white">
                 <tr>   
           <td> Tên</td>
            <td>{{$res -> name}}</td>
            </tr>
           <tr>
                <td> Email: </td>
                <td>{{$res -> email}}</td>
            </tr>
           <tr>
                <td> Số điện thoại: </td>
                <td>{{$res -> phone}}</td>
            </tr>
           <tr>
                <td> Địa chỉ: </td>
                <td>{{$res -> address}}</td>
            </tr>
           <tr>
                <td> Giới tính: </td>
                <td>{{$res -> gender == 1 ? 'Nam' : 'Nữ'}}</td>
            </tr>
           <tr>
                 <td>Ngày sinh:</td>
                <td> {{$res -> dob}}</td>
            </tr>    
            
           <tr>
                <td> Lớp: </td>
                <td>{{$res -> className}}</td>
            </tr>
           <tr>
                 <td>Ngành học: </td>
                <td>{{$res -> vocation}}</td>
            </tr>
           <tr>
                 <td>Loại thu:</td>
                <td> {{$res -> typeOfTuition}}<br>
            </tr>
           <tr>
                 <td>Tổng tiền nộp:</td>
                <td> {{$res -> money}}<br>
            </tr>
           <tr>
                 <td>Ngày thu:</td>
                <td> {{$res -> date}}<br>
            </tr>
           <tr>
                <td> Người thu:</td>
                <td> {{$res -> admin}}
              </tr>
              </table>
            </div>

            <form action='{{url("admin/invoice")}}' method="post">
                @csrf
                @method('DELETE')
                <input hidden type="text" value="{{$res -> id}}" name="id">
                <input hidden type="text" value="{{$res -> idStudent}}" name="idStudent">
                <div class="col-12 d-flex justify-content-end ">
                <button type="submit" required class=" bg-blue text-white form-control select2 select2-hidden-accessible col-1 mt-4 mr-4 "  data-select2-id="1" tabindex="-1">Xóa</button>
                </div>
            </form>

        </div>
    @empty
        <div>Hiện chưa có hóa đơn</div>
    @endforelse
@endsection
