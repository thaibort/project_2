@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('content')
   <div aria-colspan="3" class="pt-3">
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
                <td class="">
                    <form class="w-full h-full  -p-5" action='{{url("admin/upvoca/{$res->id}")}}'>
                        @csrf
                        <button
                            type="submit"
                            class=" w-full h-full edit_hover border-0 bg-blue text-white btn bg-gradient-primary mrt-5"
                            style="width: 100%"
                        >Sửa</button>
                    </form>
                </td>
                <td class="">
                    <form class="w-full h-full bg-red-200" action='{{url("admin/vocation")}}' method="post">
                        @csrf
                        <input type="text" value="{{$res -> id}}" name="id" hidden>
                        <button
                            type="button" id="del" class="btn bg-gradient-danger"
                            style="width: 100%"
                            data-toggle="modal"
                            data-target="#a{{$res -> id}}"
                        >
                            Xóa
                        </button>

                        <div class="modal fade" id="a{{$res -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xóa
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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

