@extends('admin.layout.master')
@section('title','Quản lý lớp')
@section('content')
<div aria-colspan="3" class="pt-2">
    <a href="{{url('admin/creclass')}}">
        <button aria-colspan="3" type="button" class="bg-blue text-white btn btn-primary">
            <i class="fas fa-plus-circle fa-lg "></i> Thêm lớp
        </button>
    </a>
</div>
<div class="pt-2">
    <table id="class" class="table table-bordered bg-white  text-center">
        <thead>
            <tr>
                <td>Lớp</td>
                <td>Ngành</td>
                <td>Khóa</td>
                <td style="width: 200px">Hành động</td>
            </tr>
        </thead>
        <tbody>
            @foreach($rs as $res)
            <tr>
                <td>{{$res -> name}}</td>
                <td>{{$res -> vocation}}</td>
                <td>{{$res -> schoolYear}}</td>
                <td class="p-1">
                    <div class="d-flex flex-row col-12 ">
                        <div class="col-6 d-flex justify-content-end">
                            <form class="col-12 h-full" action='{{url("admin/upclass/{$res->id}")}}'>
                                @csrf
                                <button type="submit"
                                    class="edit_hover col-12 bg-blue text-white btn btn-outline-secondary">Sửa</button>
                            </form>
                        </div>
                        <div class="flex-row w-full col-6 d-flex justify-content-end">
                            <form class="col-12 h-full " action='{{url("admin/class/{$res->id}")}}'
                                method="post">
                                @csrf
                                @method("DELETE")
                                <button type="button"
                                    class="btn btn-primary col-12 bg-red text-white btn btn-outline-secondary "
                                    data-toggle="modal" data-target="#a{{$res->id}}">
                                    Xóa
                                </button>
                                <div class="modal fade" id="a{{$res->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc muốn xóa
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#class').DataTable();
});
</script>
@endsection