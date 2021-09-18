@extends('admin.layout.master')
@section('title','Quản lý lớp')
@section('content')
    <div aria-colspan="3" class="pt-2">
        <a href="{{url('admin/creclass')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black"> </i>
        Thêm Lớp</a>
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
                    <div class="col-6 d-flex justify-content-end">
                    <form class="w-full h-full bg-blue-200" action='{{url("admin/upclass/{$res->id}")}}'>
                        @csrf
                        <button type="submit" class="edit_hover bg-blue text-white btn btn-outline-secondary mr-5">Sửa</button>
                    </form>
                    </div>
                    <div class="flex-row w-full col-6 d-flex justify-content-end">
                    <form class="w-full h-full bg-red-200" action='{{url("admin/class/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-primary bg-red text-white btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
                            Xóa
                        </button>
                    </form>
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
