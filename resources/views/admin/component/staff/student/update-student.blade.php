@extends('admin.layout.master')
@section('title','Thêm sinh viên')

@section('body')
    <a href="{{url('admin/student')}}">Quay lại</a>
    <div>
        @foreach($rs as $res)
            <form action="{{url('admin/upstudent')}}" method="post">
                @csrf
                @method('PUT')
                <input type="text" value="{{$res -> id}}" hidden name="id">
                <div>
                    <label>
                        chọn lớp
                        <select name="class">
                            @forelse($class as $resclass)
                                <option value="{{$resclass -> id}}" @if($res -> idClass == $resclass -> id) selected @endif>
                                    {{$resclass -> name}}
                                </option>
                            @empty
                                <option>Không có dữ liệu</option>
                            @endforelse
                        </select>
                    </label>
                </div>
                <div>
                    <label>
                        chọn loại học bổng
                        <select name="scholarship">
                            @forelse($scholarship as $resscholarship)
                                <option value="{{$resscholarship -> id}}" @if($res -> idScholarship == $resscholarship -> id) selected @endif>
                                    {{$resscholarship -> type}}
                                </option>
                            @empty
                                <option>Không có dữ liệu</option>
                            @endforelse
                        </select>
                    </label>
                </div>
                <div>
                    <div>
                        <label>
                            Tên: <input type="text" name="name" value="{{$res -> name}}" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            Số điện thoại: <input type="tel" name="phone"  value="{{$res -> phone}}" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            Email: <input type="email" name="email" value="{{$res -> email}}" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            Địa chỉ: <input type="text" name="address" value="{{$res -> address}}" required>
                        </label>
                    </div>
                    <div>
                        <label>
                            Ngày sinh: <input type="date" name="dob" value="{{$res -> dob}}" required>
                        </label>
                    </div>
                    <div>
                        <b>gender:&nbsp;</b>
                        <label>
                            <input type="radio" value="1" name="gender" @if($res -> gender == 1) checked @endif> Nam
                        </label>
                        <label>
                            <input type="radio" value="0" name="gender" @if($res -> gender == 0) checked @endif> Nữ
                        </label>
                    </div>
                </div>
                <button type="submit">Lưu</button>
            </form>
        @endforeach
    </div>
@endsection
