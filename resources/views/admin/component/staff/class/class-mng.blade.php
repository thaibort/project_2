@extends('admin.layout.master')
@section('title','Quản lý lớp')
@section('content')
    <div aria-colspan="3">
        <a href="{{url('admin/creclass')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black"> </i>
        thêm lớp</a>
    </div>
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
                <td>
                <div class="d-flex flex-row">
                    <div>
                    <form class="w-full h-full bg-blue-200" action='{{url("admin/upclass/{$res->id}")}}'>
                        @csrf
                        <button type="submit" class="edit_hover bg-blue text-white btn btn-outline-secondary mr-5">Sửa</button>
                    </form>
                    </div>
                    <form class="w-full h-full bg-red-200" action='{{url("admin/class/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#exampleModal">
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
</div>
                </td>
            </tr>
        @endforeach
</tbody>
    </table>
@endsection
@section('script')
<script>
    $(document).ready( function () {
        $('#class').DataTable();
    } );
</script>
@endsection
