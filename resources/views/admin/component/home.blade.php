@extends('.admin.layout.master')
@section('title','Trang chủ')
<!-- @section('name',\Illuminate\Support\Facades\Auth::user() -> name) -->
@section('body')

<div class="content-wrapper" style="min-height: 800px;">
            <div class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">
                                    <font style="vertical-align: inherit;"></font>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-3">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>5</h3>
                                    <p>Quản lý nhân viên</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p>Quản lý khóa</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>Quản lý ngành</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-majors"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">More info </font>
                                    </font><i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Quản lý lớp</p>
                                </div>
                                <div class="icon">
                                    <i class="ion "></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">More info </font>
                                    </font><i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>Quản lý sinh viên</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">More info </font>
                                    </font><i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>Quản lý hóa đơn</p>
                                </div>
                                <div class="icon">
                                    <i class="ion "></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">More info </font>
                                    </font><i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                </div>
            </section>
        </div>

@endsection
