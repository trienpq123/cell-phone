<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box
    }
    body{
        /* width: 100%; */
        min-height: 100vh;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

        padding: 15px;
        background: #9053c7;
        background: -webkit-linear-gradient(-135deg,#c850c0,#4158d0);
        background: -o-linear-gradient(-135deg,#c850c0,#4158d0);
        background: -moz-linear-gradient(-135deg,#c850c0,#4158d0);
        background: linear-gradient(-135deg,#c850c0,#4158d0);
    }

    .container{
        width: 960px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        /* padding: 177px 130px 33px 95px; */
        padding: 68px;
    }
    .login-picture{
        width: 316px
    }

    .login-form{
        width: 290px;
        text-align: center;

    }

    .login-form .form-title{
        font-family: Poppins-Bold;
        font-size: 36px;
        color: #333;
        line-height: 1.2;
        text-align: center;
        width: 100%;
        display: block;
        padding-bottom: 54px;
        font-weight: 700;
    }

    .login-form input {
        background: #E6E6E6;
        color: #666666;
        font-size: 16px;
        padding: 16px;
        border: none;
        border-radius: 25px;
        width: 100%;
        margin: 4px 0;

    }

    .login-form button {
        display: block;
        border: none;
        width: 100%;
        font-size: 16px;
        background: rgb(193,81,193);
        background: -moz-linear-gradient(to right, rgba(193,81,193,1) 13%, rgba(73,88,207,1) 100%);
        background: -webkit-linear-gradient(to right, rgba(193,81,193,1) 13%, rgba(73,88,207,1) 100%);
        background: linear-gradient(to right, rgba(193,81,193,1) 13%, rgba(73,88,207,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c151c1",endColorstr="#4958cf",GradientType=1);
        color: #fff;
        padding: 12px 0;
        border-radius: 100px;
        font-weight: 500;
    }

    .login-form a {
        color: #666666;
        text-decoration: none
    }
</style>
<body>
    <div class="container">

        <div class="login-picture">
                <img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="">
        </div>

        <div class="login-form">
            <div class="form-title">Login</div>
            <form action="{{route('admin.loginPost')}}" method="post">
                @csrf
                <div class="form-group">
                    {{-- <label for="">Username</label> --}}
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    {{-- <label for="">Mật khẩu</label> --}}
                    <input type="text" name="password" class="form-control" placeholder="Mật khẩu">
                </div>
                <button type="submit" class="btn btn-submit">Đăng nhập</button>
                <br>
                <a href="#">Quên mật khẩu</a>
            </form>
            @if($errors->any())
                <span class="text text-danger" style="color: #ff4747">Tài khoản hoặc mật khẩu bạn chưa đúng</span>
            @endif
        </div>
    </div>
</body>
</html>
