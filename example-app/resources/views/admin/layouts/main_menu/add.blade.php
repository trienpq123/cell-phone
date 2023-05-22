@extends('admin.index')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
@endsection
@section('articles')
    <div class="wraper-container">
        <div class="ladi-title mg-section" style="text-align: center;text-transform:uppercase">
            <h3>Thêm menu</h3>
        </div>

        <form action="{{route('admin.menu.postAddMenu')}}" method="POST" id="form-add" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên menu</label>
                <input type="text" placeholder="Nhập tên menu" class="form-control name" id="slug" onchange="ChangeToSlug()" name="name">
                <p class="name-error text text-danger"></p>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" placeholder="Đường dẫn" class="form-control slug" id="convert_slug"  name="slug">
                <p class="name-error text text-danger"></p>
            </div>
            <div class="form-group">
                <label for="">Chọn menu cha</label>
                <select type="text" class="form-control parent_menu" name="parent_menu" id="parent_menu">
                    <option value="">Chưa có</option>
                    @if (count($menu) > 0)
                        @foreach ($menu as $item)
                            <option value="{{$item->id_menu}}">{{$item->name_menu}}</option>
                        @endforeach
                    @endif
                </select>
                <p class="name-error text text-danger"></p>
            </div>
            <div class="form-group">
                <label for="">Trỏ đến</label>
                <select name="typeMenu" class="type_menu" id="">
                    <option value="">Chưa chọn</option>
                    <option value="1">Trang</option>
                    <option value="2">Danh  mục</option>
                </select>
                <select name="url" class="type_inner" id="" >
                    <option value="">Chưa chọn</option>

                </select>
                <p class="name-error text text-danger"></p>
            </div>
            <div class="form-group">
                <input type="radio" name="status"  id="status" class="status" value="0" style="width:auto;"><label for="">Ẩn</label>
                <input type="radio" name="status" checked id="status" class="status" value="1"   style="width:auto;"> <label for="">Hiện</label>
            </div>
            <div class="form-group">
                <label for="">Vị trí menu</label>
                <input type="number"  name="position" class="position" id="position" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-submit btn-add">
                    Xác nhận
                </button>
            </div>
        </form>
    </div>
@endsection

@push('script-action')
    <script src="https://sortablejs.github.io/Sortable/Sortable.js"></script>
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Nested demo
        var nestedSortables = [].slice.call(document.querySelectorAll('.nested-sortable'));

        // Loop through each nested sortable element
        for (var i = 0; i < nestedSortables.length; i++) {
            new Sortable(nestedSortables[i], {
                group: 'nested',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65
            });
        }
        const nestedQuery = '.nested-sortable';
        const identifier = 'sortableId';
        const root = document.getElementById('nestedDemo');

        function serialize(sortable) {
            var serialized = [];
            var children = [].slice.call(sortable.children);
            for (var i in children) {
                var nested = children[i].querySelector(nestedQuery);
                serialized.push({
                    id: children[i].dataset[identifier],
                    children: nested ? serialize(nested) : []
                });
            }
            return serialized
        }


        $(document).ready(function(){
            $('.btn-test').click(function(){
                console.log(serialize(root))
            })

            $('.type_menu').on('change',function(){
                let value = $(this).val();
                $.ajax({
                    type: "POST",
                    url:"{{route('admin.menu.typeMenu')}}",
                    data: {typeMenu:value,_token:"{{csrf_token()}}"},
                    success: (res) => {
                        console.log(value)
                        $('.type_inner').addClass('active')
                        $('.type_inner').html(res);
                        console.log(res);
                    }
                })
            })
        })

    </script>
@endpush
