<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
</head>
<body>
    <form action="{{route('admin.loginPost')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="email" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="text" name="password" id="" class="form-control">
        </div>
        <a href="#">Quên mật khẩu</a>

        <button type="submit" class="btn btn-submit">Đăng nhập</button>
    </form>
</body>
</html>
