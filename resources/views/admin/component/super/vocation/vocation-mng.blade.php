@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('body')
   <div aria-colspan="3">
        <a href="{{url('admin/crevoca')}}" ><i class="fas fa-plus-circle fa-lg" style="color: black">Thêm ngành</a>
    </div>
    <table class="table table-bordered">
    <thead class="thead-inverse">
        <tr colspan="3"><input type="text" class="form-input w-3" id="search" style="display: inline"> 
        </tr>
        <tr >
            <th >
                Tên ngành
            </th>
            <th >
                Tổng tiền thu
            </th>
            <th colspan="2" >
                Hành động
            </th>
        </tr>
    </thead>
        @forelse($rs as $res)
        <tr>
            <td>
                {{$res->name}}
            </td>
            <td>
                {{$res->totalMoney}}
            </td>
            <td>
                <form class="w-full h-full bg-blue-200" action='{{url("admin/upvoca/{$res->id}")}}'>
                    @csrf
                    <button type="submit" class="edit_hover">Sửa</button>
                </form>
            </td>
            <td>
                <form class="w-full h-full bg-red-200" action='{{url("admin/vocation/{$res->id}")}}' method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="edit_hover">Xóa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Hiện không có dữ liệu</td>
        </tr>
        
        @endforelse
    </table>
@endsection
