@extends('admin.layout.master')
@section('title','Quản lý lớp')
@section('body')
    <div aria-colspan="3">
        <a href="{{url('admin/creclass')}}">
        <i class="fas fa-plus-circle fa-lg" style="color: black"> </i>
        thêm lớp</a>
    </div>
    <table id="class" class="table table-bordered bg-white">
        <thead>
        <tr>
            <td>Lớp</td>
            <td>Ngành</td>
            <td>Khóa</td>
            <td>Hành động</td>
        </tr>
        </thead>
        <tbody>
        @foreach($rs as $res)
            <tr>
                <td>{{$res -> name}}</td>
                <td>{{$res -> vocation}}</td>
                <td>{{$res -> schoolYear}}</td>
                <td>
                    <form class="w-full h-full bg-blue-200" action='{{url("admin/upclass/{$res->id}")}}'>
                        @csrf
                        <button type="submit" class="edit_hover">Sửa</button>
                    </form>
                
                    <form class="w-full h-full bg-red-200" action='{{url("admin/class/{$res->id}")}}' method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="edit_hover">Xóa</button>
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
