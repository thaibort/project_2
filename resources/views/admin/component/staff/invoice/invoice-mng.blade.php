@extends('admin.layout.master')
@section('title','Quản lý hóa đơn')

@section('body')
        <table id="invoice" class="table table-bordered bg-white" >
            <thead>
            <tr>
                <th>Ngành</th>
                <th>Khóa</th>
                <th>Lớp</th>
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
                    <td>{{$res -> name}}</td>
                    <td>
                        <form action='{{url("admin/toindetail/{$res -> id}")}}'>
                            <button>
                                Hóa đơn
                            </button>
                        </form>
                        <form action='{{url("admin/checkinfor/{$res -> id}")}}'>
                            <button>
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