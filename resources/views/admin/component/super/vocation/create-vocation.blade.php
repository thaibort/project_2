@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('body')
    <div class="w-full h-screen bg-red-200">
        <a href="{{url('admin/vocation')}}">Quay lại</a>
        <div>
            create
        </div>
        <form action="{{url('admin/crevoca')}}" method="post">
            @csrf
            Tên ngành
            <input type="text" name="name">
            tổng học phí ngành
            <input type="text" name="money">
            <button type="submit">Thêm</button>
        </form>
    </div>
@endsection
