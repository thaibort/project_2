@extends('admin.layout.master')
@section('title','Quản lý hóa đơn')

@section('content')
<div class="pt-2">
    <a href="{{url('admin/stageform')}}">
        <button aria-colspan="3" type="button" class="bg-blue text-white btn btn-primary">
            <i class="far fa-arrow-alt-circle-up"></i> Tăng đợt đóng tiền hiện tại
        </button>
    </a>
</div>
<div class="pt-2">
    <table id="invoice" class="table table-bordered bg-white ">
        <thead>
            <tr class=" text-center">
                <th>Ngành</th>
                <th>Khóa</th>
                <th>Lớp</th>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Tình trạng</th>
                <th style="width: 250px">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rs as $res)
            <tr class=" text-center">
                <td>{{$res -> vocation}}</td>
                <td>{{$res -> schoolYear}}</td>
                <td>{{$res -> className}}</td>
                <td>{{$res -> id}}</td>
                <td>{{$res -> name}}</td>
                <td>
                    {{$res -> stagesPresent <= $res -> totalStages
                            ? 'Đã nộp'
                            : 'Nợ '.($res -> stagesPresent - $res -> totalStages).' tháng'
                        }}
                </td>
                <td class=" pt-2">
                    <div class="d-flex flex-row w-full  ">
                        <div class="col-6">
                            <form action='{{url("admin/toindetail/{$res -> id}")}}' class="d-flex justify-content-end">
                                <button class=" bg-blue text-white btn btn-outline-secondary m-auto">
                                    Hóa đơn
                                </button>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action='{{url("admin/checkinfor/{$res -> id}")}}' class="d-flex justify-content-end">
                                <button class=" bg-red text-white btn btn-outline-secondary m-auto">
                                    Thu phí
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Không có dữ liệu</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#invoice').DataTable();
});
</script>
@endsection