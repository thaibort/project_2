@extends('.admin.layout.master')
@section('title','Quản lý học bổng')
@section('body')
    <div class="w-full h-screen bg-red-200">
        <a href="{{url('admin/scholarship')}}">Quay lại</a>
        <form action="{{url('admin/crescholarship')}}" method="post">
            @csrf
            Học bổng loại
            <input type="number" name="name" min="0" maxlength="9"  required>
            Số tiền
            <input type="number" name="money" min="0" maxlength="9"  required>
            <button type="submit">Thêm</button>
        </form>
    </div>
@endsection
