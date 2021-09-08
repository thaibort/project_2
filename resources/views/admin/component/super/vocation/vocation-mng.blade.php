@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('body')
   <div aria-colspan="3">
        <a href="{{url('admin/crevoca')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black"> </i>
        Thêm ngành</a>
    </div>
    <table id="vocation" class="table table-bordered">
            <tr colspan="3">
            </tr>
            <tr >
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

        <tbody>
            @forelse($rs as $res)
            <tr>
                <td>
                    {{$res->name}}
                </td>
                <td>
                    {{$res->totalMoney}}
                </td>
                <td>
                    <form class="w-full h-full bg-blue-200" action='{{url("admin/upvoca/{$res->id}")}}'>
                        @csrf
                        <button type="submit" class="edit_hover">Sửa</button>
                    </form>
                </td>
                <td>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/vocation/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Xóa
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
