@extends('admin.layout.master')
@section('title','Quản lý hóa đơn')

@section('content')
        <table id="invoice" class="table table-bordered bg-white" >
            <thead>
            <tr>
                <th>Ngành</th>
                <th>Khóa</th>
                <th>Lớp</th>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rs as $res)
                <tr>
                    <td>{{$res -> vocation}}</td>
                    <td>{{$res -> schoolYear}}</td>
                    <td>{{$res -> className}}</td>
                    <td>{{$res -> id}}</td>
                    <td>{{$res -> name}}</td>
                    <td>
                        <form action='{{url("admin/toindetail/{$res -> id}")}}' class="d-flex justify-content-end">
                            <button required class=" bg-blue text-white btn btn-outline-secondary mr-5">
                                Hóa đơn
                            </button>
                            <button required class=" bg-blue text-white btn btn-outline-secondary mr-5">
                                Thu phí
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Không có dữ liệu</td></tr>
            @endforelse
            </tbody>
        </table>
@endsection
@section('script')
<script>
    $(document).ready( function () {
        $('#invoice').DataTable();
    } );
</script>
@endsection
