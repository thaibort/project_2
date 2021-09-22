@extends('admin.layout.master')
@section('title', 'Quản lý sinh viên')
@section('content')
<div aria-colspan="3" class="pt-2">
    <a href="{{url('admin/crestudent')}}">
        <button aria-colspan="3" type="button" class="bg-blue text-white btn btn-primary">
            <i class="fas fa-plus-circle fa-lg "></i> Thêm sinh viên
        </button>
    </a>
</div>
<div class="pt-2">
    <table id="student" class="table table-bordered bg-white text-center">
        <thead>
            <tr>
                <td>ID</td>
                <td>Tên</td>
                <td>Lớp</td>
                <td>Khóa</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <tbody>
            @forelse($rs as $res)
            <tr>
                <td>{{$res -> id}}</td>
                <td>{{$res -> studentName}}</td>
                <td>{{$res -> className}}</td>
                <td>{{$res -> schoolYear}}</td>
                <td><a href='{{url("admin/stuinfor/{$res -> id}")}}'>Chi tiết</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="6">Không có dữ liệu</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#student').DataTable();
});
</script>
@endsection