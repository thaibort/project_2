@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('body')
    <div class="w-full h-screen bg-red-200">
        <a href="{{url('admin/vocation')}}">Quay lại</a>
        <div>
            create
        </div>
        <form action="{{url('admin/upvoca')}}" method="post">
            @csrf
            @method("PUT")
            @foreach($rs as $item)
                <input type="text" name="id" value="{{$item->id}}" hidden>
                Tên ngành: {{$item->name}}
                tổng học phí ngành
                <input type="text" name="money" value="{{$item->totalMoney}}">
            @endforeach
            <button type="submit">Thêm</button>
        </form>
    </div>
@endsection
