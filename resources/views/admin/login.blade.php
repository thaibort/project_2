<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-gray-300">
<form action="{{url("/admin")}}" method="post" class="flex-coll">
    @method('POST')
    @csrf
    <lable>
        <h1>Tài khoản</h1>
        <input type="text" name="name">
    </lable>
    <lable>
        <h1>Mật khẩu</h1>
        <input type="password" name="pass">
    </lable>
    <button type="submit">Đăng nhập</button>
</form>
</body>
</html>
