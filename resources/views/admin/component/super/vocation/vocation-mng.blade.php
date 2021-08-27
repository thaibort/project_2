@extends('.admin.layout.master')
@section('title','Quản lý ngành')
@section('body')
    <div>
        <a href="{{url('admin/crevoca')}}">thêm ngành</a>
    </div>

    <table>
        <tr>
            <th>
                tên ngành
            </th>
        </tr>
        @foreach($rs as $res)
        <tr>
            <td>
                {{$res->vocation.name}}
            </td>
        </tr>
        @endforeach
    </table>
@endsection
