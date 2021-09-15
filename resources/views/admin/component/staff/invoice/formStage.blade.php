@extends('admin.layout.master')

@section('title','Tăng đợt')

@section('content')
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
                    <input type="date">
                </div>
            </div>
            <div>
                <div>
                    Ngày kết thúc
                </div>
                <div>
                    <input type="date">
                </div>
            </div>
        </div>
        <div>
            <div>

            </div>
            <div>
                <input type="date">
            </div>
        </div>
@endsection
