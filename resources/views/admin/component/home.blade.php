@extends('.admin.layout.master')
@section('title','Trang chủ')
@section('content')
<div>
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
                    <a href="{{url('admin/invoice/2')}}" class="small-box-footer">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Xem thêm </font>
                        </font><i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
                <div class="col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$unpaid}}<sup style="font-size: 20px"></sup></h3>
                            <p>Sinh viên chưa nộp học phí</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas fa-chart-pie"></i>
                        </div>
                        <a href="{{url('admin/invoice/1')}}" class="small-box-footer"> Xem thêm <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
        </div>
    </div>
    </section>
</div>
<div class="w-full card bg-gradient-success">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">September 2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="08/29/2021" class="day old weekend">29</td><td data-action="selectDay" data-day="08/30/2021" class="day old">30</td><td data-action="selectDay" data-day="08/31/2021" class="day old">31</td><td data-action="selectDay" data-day="09/01/2021" class="day">1</td><td data-action="selectDay" data-day="09/02/2021" class="day">2</td><td data-action="selectDay" data-day="09/03/2021" class="day">3</td><td data-action="selectDay" data-day="09/04/2021" class="day weekend">4</td></tr><tr><td data-action="selectDay" data-day="09/05/2021" class="day weekend">5</td><td data-action="selectDay" data-day="09/06/2021" class="day">6</td><td data-action="selectDay" data-day="09/07/2021" class="day">7</td><td data-action="selectDay" data-day="09/08/2021" class="day">8</td><td data-action="selectDay" data-day="09/09/2021" class="day">9</td><td data-action="selectDay" data-day="09/10/2021" class="day">10</td><td data-action="selectDay" data-day="09/11/2021" class="day weekend">11</td></tr><tr><td data-action="selectDay" data-day="09/12/2021" class="day weekend">12</td><td data-action="selectDay" data-day="09/13/2021" class="day">13</td><td data-action="selectDay" data-day="09/14/2021" class="day">14</td><td data-action="selectDay" data-day="09/15/2021" class="day">15</td><td data-action="selectDay" data-day="09/16/2021" class="day">16</td><td data-action="selectDay" data-day="09/17/2021" class="day">17</td><td data-action="selectDay" data-day="09/18/2021" class="day weekend">18</td></tr><tr><td data-action="selectDay" data-day="09/19/2021" class="day weekend">19</td><td data-action="selectDay" data-day="09/20/2021" class="day">20</td><td data-action="selectDay" data-day="09/21/2021" class="day">21</td><td data-action="selectDay" data-day="09/22/2021" class="day">22</td><td data-action="selectDay" data-day="09/23/2021" class="day active today">23</td><td data-action="selectDay" data-day="09/24/2021" class="day">24</td><td data-action="selectDay" data-day="09/25/2021" class="day weekend">25</td></tr><tr><td data-action="selectDay" data-day="09/26/2021" class="day weekend">26</td><td data-action="selectDay" data-day="09/27/2021" class="day">27</td><td data-action="selectDay" data-day="09/28/2021" class="day">28</td><td data-action="selectDay" data-day="09/29/2021" class="day">29</td><td data-action="selectDay" data-day="09/30/2021" class="day">30</td><td data-action="selectDay" data-day="10/01/2021" class="day new">1</td><td data-action="selectDay" data-day="10/02/2021" class="day new weekend">2</td></tr><tr><td data-action="selectDay" data-day="10/03/2021" class="day new weekend">3</td><td data-action="selectDay" data-day="10/04/2021" class="day new">4</td><td data-action="selectDay" data-day="10/05/2021" class="day new">5</td><td data-action="selectDay" data-day="10/06/2021" class="day new">6</td><td data-action="selectDay" data-day="10/07/2021" class="day new">7</td><td data-action="selectDay" data-day="10/08/2021" class="day new">8</td><td data-action="selectDay" data-day="10/09/2021" class="day new weekend">9</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month active">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#ccc').remove();
    });
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
</script>
@endsection
