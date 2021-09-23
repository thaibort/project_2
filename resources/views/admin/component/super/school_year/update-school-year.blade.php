@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('content')
<div class="w-full h-screen bg-red-200 m-2">
    <div class="pt-2">
        <a href="{{url('admin/schyear')}}">
            
        <i class="fas fa-undo"></i>
                Quay lại
            
        </a>
    </div>
    <div class="pt-2">
        <form action="{{url('admin/upschyear')}}" method="post" class="flex">
            @csrf
            @method("PUT")
            @foreach($rs as $item)
            <input type="text" name="id" value="{{$item->id}}" hidden required
                class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
                tabindex="-1">
            <label class="col-4 flex mr-xl-5"> Niên khóa: <br>
                <input type="number" value="{{$item->name}}" name="name" required
                    class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
                    tabindex="-1">
            </label>
            <label class="col-4"> Đợt đóng tiền hiện tại: <br>
                <input type="number" value="{{$item->stagesPresent}}" name="stagesPresent" required
                    class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
                    tabindex="-1">
            </label>
            @endforeach
            <div class="col-12 d-flex justify-content-end ">
                   <button class=" bg-blue text-white form-control select2 select2-hidden-accessible col-1 mt-5 mr-5 "
                    data-select2-id="1" tabindex="-1">Sửa</button>
            </div>
        </form>
    </div>
</div>
@endsection