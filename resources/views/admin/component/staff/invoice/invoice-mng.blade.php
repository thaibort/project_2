@extends('admin.layout.master')
@section('title','Quản lý hóa đơn')

@section('content')
    <div class="d-flex justify-content-between">
        <div class="pt-2">
            <a href='{{url("admin/stageform/{$mode}")}}'>
                <button aria-colspan="3" type="button" class="bg-blue text-white btn btn-primary">
                    <i class="far fa-arrow-alt-circle-up"></i> Tăng đợt đóng tiền hiện tại
                </button>
            </a>
        </div>
        <div class="text-center">
            <h4>Đợt đóng tiền hiện tại của các khóa</h4>
                <div>(Từ: {{date('d - m - Y',strtotime($time -> start))}}, đến: {{date('d - m - Y',strtotime($time -> end))}})</div>
            <div class="d-flex">
                @foreach($stage as $res)
                    <div class="p-2">
                        Khóa {{$res -> name}}: đợt {{$res -> stagesPresent}}
                    </div>
                @endforeach
            </div>
        </div>
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
                            <form action='{{url("admin/toindetail")}}' class="d-flex justify-content-end">
                                <input type="text" value="{{$res -> id}}" name="id" hidden>
                                <input type="text" value="{{$mode}}" name="mode" hidden>
                                <button class=" bg-blue text-white btn btn-outline-secondary m-auto">
                                    Hóa đơn
                                </button>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action='{{url("admin/checkinfor")}}' class="d-flex justify-content-end">
                                <input type="text" value="{{$res -> id}}" name="id" hidden>
                                <input type="text" value="{{$mode}}" name="mode" hidden>
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
