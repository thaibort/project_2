@extends('.admin.layout.master')
@section('title','Quản lý niên khóa')
@section('body')
    <div class="w-full h-screen bg-red-200">
        <a href="{{url('admin/schyear')}}">Quay lại</a>
        <form action="{{url('admin/creschyear')}}" method="post">
            @csrf
            Niên khóa thứ
            <input type="number" name="name" min="0" maxlength="9"  required>
            <button type="submit">Thêm</button>
        </form>
    </div>
@endsection
