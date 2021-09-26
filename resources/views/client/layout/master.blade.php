<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <title>@yield('title')</title>
</head>
<body>
    <div class="w-full bg-blue-200 h-14 flex justify-between items-center px-5">
        <div class="w-60 h-160">
            <a href=" https://www.bkacad.com/" title="BKACAD" class="logo">
                <img class="h-10 w-55" src="https://www.bkacad.com/images/config/logo_1591255072.png" alt="logo">
            </a>
        </div>
        <div class="flex mr-5 justify-center space-x-4 ">
            @yield('menu')
        </div>
        @if($mode == 1)
            <div class="border border-black w-1/5 rounded-full flex justify-end h-10 items-center">
                <form action='{{url("/")}}' class=" h-8 flex items-center w-full ">
                    @csrf
                    <input type="text" name="kw" value="{{$kw}}" class="outline-none w-5/6 h-9 rounded-l-full pl-3">
                    <button type="submit"
                            class="bg-green-200 hover:bg-blue-200 h-8 w-10 flex justify-center items-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        @endif
        @if($mode == 0)
            <div class="w-1/5"></div>
        @endif
    </div>

    @yield('body')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
</script>
</body>

</html>
