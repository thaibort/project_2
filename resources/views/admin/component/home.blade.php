@extends('.admin.layout.master')
@section('title','Trang chủ')
@section('content')
<div >
            <div class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Trang chủ</h1>
                        </div>
                        <div class="col-md-3">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active col-md-3">
                                    <font style="vertical-align: inherit;"></font>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
             </div>
                <div class="container-fluid">
                    <div class="row">
                        @if(session()->get('admin.level') == 0)
                            <div class="col-md-3">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{$year}}<sup style="font-size: 20px"></sup></h3>
                                        <p>Khóa</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-chart-pie"></i>
                                    </div>
                                    <a href="{{url('admin/schyear')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-3">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{$class}}</h3>
                                        <p>Lớp</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion fas fa-school"></i>
                                    </div>
                                    <a href="{{url('admin/class')}}" class="small-box-footer">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Xem thêm </font>
                                        </font><i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$student}}</h3>
                                    <p>Sinh viên</p>
                                </div>
                                <div class="icon">
                                    <i class="ion fas fa-user-graduate"></i>
                                </div>
                                <a href="{{url('admin/student')}}" class="small-box-footer">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Xem thêm </font>
                                    </font><i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{$paid}}</h3>
                                    <p>Sinh viên đã nộp học phí</p>
                                </div>
                                <div class="icon">
                                    <i class="ion fas fa-file-invoice"></i>
                                </div>
                                <a href="{{url('admin/invoice')}}" class="small-box-footer">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Xem thêm </font>
                                    </font><i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection

@section('js')
<scipt>
        <script>
            $(document).ready( function () {
                $('#ccc').remove();
            } );
        </script>
        @if(session()->get('admin.level') == 1)
            $(document).ready( function () {
            $('#mng').remove();
            } );
        @endif
        @if(session()->get('admin.level') == 0)
            $(document).ready( function () {
            $('#stainfor').remove();
            } );
        @endif
</scipt>
@endsection
