@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">



        <div class="container">
            <form action="{{route('admin.User.User.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <input type="text" name="fullName" id="" class="form-control" placeholder="Nhập tên quyền" >
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control" placeholder="Nhập email. vd:abc@gmail.com" >
                </div>
                <div class="form-group">
                    <label for="">Sđt</label>
                    <input type="text" name="password" id="" class="form-control" placeholder="Nhập sdt. vd: 0123456789" >
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Nhập mật khẩu: trên 8 ký tự" >
                </div>
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" name="re_password" id="" class="form-control" placeholder="Nhập lại mật khẩu" >
                </div>
                <div class="form-group">
                    <label for="">Chức vụ</label>
                    <select class="js-example-basic-multiple-1" name="role" id="" multiple="multiple">
                        @foreach ($role as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Cấp Quyền</label>
                    <select class="js-example-basic-multiple-2" name="permission" id="" multiple="multiple">
                        @foreach ($permission as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-submit">Xác nhận</button>
                </div>
            </form>
        </div>



    </div>
</div>
@endsection

@push('script-action')
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // SELECT 2
            $('.js-example-basic-multiple-1').select2();
            $('.js-example-basic-multiple-2').select2();
        });
    </script>
@endpush
