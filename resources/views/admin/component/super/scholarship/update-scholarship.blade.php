@extends('.admin.layout.master')
@section('title','Quản Học bổng')
@section('body')
    <div class="w-full h-screen bg-red-200">
        <a href="{{url('admin/scholarship')}}">Quay lại</a>
        <div>
            create
        </div>
        <form action="{{url('admin/upscholarship')}}" method="post" class="flex">
            @csrf
            @method("PUT")
            @foreach($rs as $res)
                <input type="text" name="id" value="{{$res->id}}" hidden>
                Học bổng loại <br>
                <input type="number" value="{{$res->type}}" name="name">
                Số tiền <br>
                <input type="number" value="{{$res->money}}" name="money">
            @endforeach
            <button type="submit">Sửa</button>
        </form>
    </div>
@endsection
