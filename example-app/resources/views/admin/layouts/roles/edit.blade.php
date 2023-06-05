@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">



        <div class="container">
            <form action="{{route('admin.roles.role.update',['id' => $role->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Chức vụ</label>
                    <input type="text" name="role_name" id="" class="form-control" placeholder="Chức vụ" value="{{$role->name}}">
                </div>
                <div class="form-group">
                    <label for="">Cấp Quyền</label>
                    <select class="js-example-basic-single" name="permission[]" id="" multiple>
                        @foreach ($permission as $item)
                        <option value="{{$item->id}}" {{$role->hasPermissionTo($item) ? 'selected' : ''}} >{{$item->name}}</option>
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
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
