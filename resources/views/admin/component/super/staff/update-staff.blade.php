@extends('admin.layout.master')
@section('title','Sửa thông tin')

@section('body')
    <div>
        <form action="{{url('admin/poststaff')}}" method="post">
            @csrf
            @method('PUT')
            @foreach($rs as $res)
                <div>
                    <label>
                        Họ và tên <br>
                        <input type="text" name="name" value="{{$res -> name}}">
                    </label>
                    <label>
                        Email <br>
                        <input type="text" name="email" value="{{$res -> email}}">
                    </label>
                    <label>
                        Số điện thoại  <br>
                        <input type="text" name="phone" value="{{$res -> phone}}">
                    </label>
                    <label>
                        Địa chỉ <br>
                        <input type="text" name="address" value="{{$res -> address}}">
                    </label>
                </div>
                <div class="border-0" id="change">Đổi mật khẩu</div>
                <div id="pas">
                    <label>
                        Mật khẩu cũ <br>
                        <input type="password" name="oldPass">
                    </label>
                    @if(\Illuminate\Support\Facades\Session::has('err'))
                        <div style="color: red" class="fadeIn fourth">{{\Illuminate\Support\Facades\Session::get('err')}}</div>
                    @endif
                    <label>
                        Mật khẩu mới <br>
                        <input type="password" name="newPass">
                    </label>
                </div>
            @endforeach
            <button type="submit">Lưu</button>
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
