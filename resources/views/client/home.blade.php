<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bkacad</title>
</head>
<body>
    <div>
        <form action='{{url("/")}}'>
            @csrf
            <input type="text" name="kw" value="{{$kw}}">
            <button type="submit">search</button>
        </form>
    </div>
    <table>
        <tr>
            <th>Mã sinh viên</th>
            <th>Ngành</th>
            <th>Khóa</th>
            <th>Lớp</th>
            <th>Họ và tên</th>
            <th>Tình trạng học phí</th>
            <th>Hành động</th>
        </tr>
        @forelse($rs as $res)
            <tr>
                <td>{{$res -> id}}</td>
                <td>{{$res -> vocation}}</td>
                <td>{{$res -> schoolYear}}</td>
                <td>{{$res -> className}}</td>
                <td>{{$res -> name}}</td>
                <td>
                    {{$res -> stagesPresent <= $res -> totalStages
                        ? 'Đã nộp'
                        : 'Nợ '.($res -> stagesPresent - $res -> totalStages).' tháng'
                    }}
                </td>
                <td>
                    <a href='{{url("/invoice/{$res -> id}")}}'>Tổng phiếu thu</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="">Không có dữ liệu sinh viên</td>
            </tr>
        @endforelse
    </table>
</body>
</html>
