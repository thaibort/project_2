@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('body')
    <div class="w-full h-screen bg-red-200">
        <a href="{{url('admin/vocation')}}">Quay lại</a>
        <div>
            create
        </div>
        <form action="{{url('admin/upschyear')}}" method="post" class="flex">
            @csrf
            @method("PUT")
            @foreach($rs as $item)
                <input type="text" name="id" value="{{$item->id}}" hidden>
                Niên khóa: <br>
                <input type="number" value="{{$item->name}}" name="name">
                Đợt đóng tiền hiện tại: <br>
                <input type="number" value="{{$item->stagesPresent}}" name="stagesPresent">
            @endforeach
            <button type="submit">Thêm</button>
        </form>
    </div>
@endsection
