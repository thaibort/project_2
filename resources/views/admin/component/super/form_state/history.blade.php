@extends('.admin.layout.master')
@section('title','Lịch sử tăng giảm đợt đóng')
@section('content')
    <table class="table table-bordered bg-white text-center">
        <thead>
            <tr>
                <td>Tên</td>
                <td>Ngày tăng</td>
                <td>Ngày bắt đầu đợt đóng</td>
                <td>Ngày kết thúc đợt đóng</td>
            </tr>
        </thead>
        <tbody>
        @forelse($rs as $res)
            @if($res -> id !== 0)
                <tr>
                    <td>{{$res -> nameAdmin}}</td>
                    <td>{{date('d - m - Y',strtotime($res -> date))}}</td>
                    <td>{{date('d - m - Y',strtotime($res -> start))}}</td>
                    <td>{{date('d - m - Y',strtotime($res -> end))}}</td>
                </tr>
            @endif
        @empty
            <tr>
                <td colspan="4"> Không có dữ liệu </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
