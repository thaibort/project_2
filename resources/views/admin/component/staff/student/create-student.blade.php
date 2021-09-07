@extends('admin.layout.master')
@section('title','Thêm sinh viên')

@section('body')
    <a href="{{url('admin/student')}}">Quay lại</a>
    <div>
        <form action="{{url('admin/crestudent')}}" method="post">
            @csrf
            <div>
                <label>
                    chọn lớp
                    <select name="class">
                        @forelse($class as $resclass)
                            <option value="{{$resclass -> id}}">
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
                            <option value="{{$resscholarship -> id}}">
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
                        Tên: <input type="text" name="name" required>
                    </label>
                </div>
                <div>
                    <label>
                        Số điện thoại: <input type="tel" name="phone" required>
                    </label>
                </div>
                <div>
                    <label>
                        Email: <input type="email" name="email" required>
                    </label>
                </div>
                <div>
                    <label>
                        Địa chỉ: <input type="text" name="address" required>
                    </label>
                </div>
                <div>
                    <label>
                        Ngày sinh: <input type="date" name="dob" required>
                    </label>
                </div>
                <div>
                    <b>gender:&nbsp;</b>
                    <label>
                        <input type="radio" value="1" name="gender" checked> Nam
                    </label>
                    <label>
                        <input type="radio" value="0" name="gender"> Nữ
                    </label>
                </div>
            </div>
            <button type="submit">Thêm</button>
        </form>
    </div>
@endsection
