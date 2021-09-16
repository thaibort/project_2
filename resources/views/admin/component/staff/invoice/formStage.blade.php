@extends('admin.layout.master')

@section('title','Tăng đợt')

@section('content')
    <form action="{{url('admin/stageform')}}" method="post">
        @csrf
        <input type="text" name="mode" value="1" hidden>
        <div>
            <div>
                Tên người tăng
            </div>
            <div>
                {{session()->get('admin.name')}}
            </div>
        </div>

        <div>
            Thời gian thu
            <div>
                <div>
                    Ngày bắt đầu
                </div>
                <div>
                    <input type="date" required name="start">
                </div>
            </div>
            <div>
                <div>
                    Ngày kết thúc
                </div>
                <div>
                    <input type="date" required name="end">
                </div>
            </div>
        </div>
        <div>
            <div>
                Đợt hiện tại của các khóa
            </div>
            <div class="d-flex">
                @foreach($rs as $res)
                    <div class="mr-5 flex">
                        Khóa : {{$res -> name}}<br>
                        Đợt : {{$res -> stagesPresent}}
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <div>
                Đợt tiếp theo của các khóa
            </div>
            <div class="d-flex">
                @foreach($rs as $res)
                    <div class="mr-5 flex">
                        Khóa : {{$res -> name}}<br>
                        Đợt : {{$res -> stagesPresent + 1}}
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit">Gửi</button>
    </form>
@endsection
