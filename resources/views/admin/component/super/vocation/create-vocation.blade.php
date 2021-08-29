@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('body')
    <div class="w-full h-screen bg-red-200">
        <a href="{{url('admin/vocation')}}">Quay lại</a>
        <form action="{{url('admin/crevoca')}}" method="post">
            @csrf
            Tên ngành
            <input type="text" name="name" required>
            tổng học phí ngành
            <input type="text" name="money" maxlength="9" required>
            <button type="submit">Thêm</button>
        </form>
    </div>
@endsection
