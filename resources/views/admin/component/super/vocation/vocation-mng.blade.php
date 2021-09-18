@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('content')
   <div aria-colspan="3" class="pt-2">
        <a href="{{url('admin/crevoca')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black" > </i>
        Thêm ngành</a>
    </div>
    <table id="vocation" class="table table-bordered bg-white text-center">
        <thead>
            <tr colspan="3">
            </tr>
            <tr class=" text-center" style="width: 200px">
                <th >
                    Tên ngành
                </th>
                <th >
                    Tổng tiền thu
                </th>
                <th colspan="2" >
                    Hành động
                </th>
            </tr>
            </thead>
        <tbody>
            @forelse($rs as $res)
            <tr>
                <td class=" text-center">
                    {{$res->name}}
                </td>
                <td class=" text-center">
                    {{$res->totalMoney}}
                </td>
                <td class="bg-blue">
                    <form class="w-full h-full  -p-5" action='{{url("admin/upvoca/{$res->id}")}}'>
                        @csrf
                        <button
                            type="submit"
                            class=" w-full h-full edit_hover border-0 bg-blue text-white btn btn-outline-secondary mrt-5"
                            style="width: 100%"
                        >Sửa</button>
                    </form>
                </td>
                <td class="btn-danger">
                    <form class="w-full h-full bg-red-200" action='{{url("admin/vocation")}}' method="post">
                        @csrf
                        <input type="text" value="{{$res -> id}}" name="id" hidden>
                        <button type="submit" id="del" class="btn btn-danger"
                        style="width: 100%">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Hiện không có dữ liệu</td>
            </tr>

            @endforelse
        </tbody>
    </table>
@endsection

