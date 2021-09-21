<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <title>Bkacad</title>
</head>
<body class="relative min-h-screen p-5">
<div></div>
    <div class="border border-black w-1/5 rounded-full">
        <form action='{{url("/")}}' class="w-full h-8 flex items-center justify-between">
            @csrf
            <input type="text" name="kw" value="{{$kw}}" class="outline-none w-5/6 h-8 rounded-l-full pl-3">
            <button type="submit" class="bg-green-200 hover:bg-blue-200 h-8 w-8 flex justify-center items-center rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
    </div>
    <table class="table-auto w-full bg-gray-100 mt-10" cellpadding="0" cellspacing="0">
        <tr>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Mã sinh viên</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Ngành</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Khóa</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Lớp</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Họ và tên</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Tình trạng học phí</th>
            <th class="h-14 bg-blue-700 border-2 border-black text-white">Hành động</th>
        </tr>
        @forelse($rs as $res)
            <tr class="hover:bg-gray-300">
                <td class="h-8 border-2 border-black text-center">{{$res -> id}}</td>
                <td class="h-8 border-2 border-black text-center">{{$res -> vocation}}</td>
                <td class="h-8 border-2 border-black text-center">{{$res -> schoolYear}}</td>
                <td class="h-8 border-2 border-black text-center">{{$res -> className}}</td>
                <td class="h-8 border-2 border-black text-center">{{$res -> name}}</td>
                <td class="h-8 border-2 border-black text-center">
                    {{$res -> stagesPresent <= $res -> totalStages
                        ? 'Đã nộp'
                        : 'Nợ '.($res -> stagesPresent - $res -> totalStages).' tháng'
                    }}
                </td>
                <td class="h-8 border-2 border-black text-center">
                    <a href='{{url("/invoice/{$res -> id}")}}'>Tổng phiếu thu</a>
                </td>
            </tr>
        @empty
            <tr class="h-8 border-2 border-black text-center">
                <td colspan="8" class="">Không có dữ liệu sinh viên</td>
            </tr>
        @endforelse
    </table>
    <div class="w-full pl-20 absolute bottom-10 right-10">
        {{$rs->links()}}
    </div>
</body>
</html>
