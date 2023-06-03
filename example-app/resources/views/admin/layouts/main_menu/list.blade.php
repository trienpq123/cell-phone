@extends('admin.index')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
@endsection
@section('articles')
<style>
    .block {
	margin: 5px 0;
	border: 1px solid #f1e8e2;
	background: #fff;
}
.block-title {
    font-family: Arial;
	font-size: 12px;
	color: #4c4743;
	padding: 0 10px;
	height: 33px;
	line-height: 33px;
	position: relative;
}
.sortable {
    list-style: none;
    padding-left: 0;
}
.sortable ul {
    margin-left: 25px;
}
.ui-sortable-helper {
	box-shadow: rgba(0,0,0,0.15) 0 3px 5px 0;
	width: 300px!important;
	height: 33px!important;
}
.sortable-placeholder {
	height: 35px;
	background: #e3dcd7;
	margin-bottom: 5px;
	margin-top: 5px;
}
</style>
    <div class="wraper-container">
        <div class="action-link">
            <a href="{{route('admin.menu.addMenu')}}" class="btn btn-add btn-success">Thêm menu</a>
        </div>
        <br>


            <ul class="sortable list-unstyled" id="sortable">
            @if (count($menu) > 0)
                @foreach ($menu as $m)
                        <li style="position: relative" id="sortableId" data-position-menu="{{$m->position}}" data-id-menu="{{$m->id_menu}}" data-parent-menu="{{$m->parent_menu}}" >
                            <a  class="btn btn-edit" data-name="edit-menu" data-id="{{$m->id_menu}}" style="position:absolute; z-index: 99999; right: 35px; " ><i class="fas fa-edit"></i></a>
                            <a  class="btn btn-delete" data-name="edit-menu" data-id="{{$m->id_menu}}" style="position:absolute; z-index: 99999; right: 0; " ><i class="fas fa-close"></i></a>
                            <div class="block block-title">{{$m->name_menu}}</div>
                            <ul class="sortable list-unstyled">
                            @if (count($m->chirendMenu) > 0)
                            @foreach ($m->chirendMenu as $cm)
                                    <li  style="position: relative" id="sortableId" data-position-menu="{{$cm->position}}" data-name="edit-product" data-id="{{$m->id_menu}}" data-id-menu="{{$cm->id_menu}}" data-parent-menu="{{$cm->parent_menu}}">
                                        <a class="btn btn-edit"  data-name="edit-menu" data-id="{{$cm->id_menu}}"  style="position:absolute; z-index: 99999; right: 35px; " ><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-delete"  data-name="edit-menu" data-id="{{$cm->id_menu}}"   style="position:absolute; z-index: 99999; right: 0; " ><i class="fas fa-close"></i></a>
                                        <div style="position: relative" class="block block-title" data-position-menu="{{$cm->position}}" data-id-menu="{{$cm->id_menu}}" data-parent-menu="{{$cm->parent_menu}}">{{$cm->name_menu}}</div>
                                        <ul class="sortable list-unstyled"></ul>
                                    </li>
                                    @endforeach
                            @endif
                        </ul>
                        </li>
                @endforeach
            @endif

            </ul>
            <button class="btn-test">SAVE</button>

            <div class="popup-modal edit-menu" >
                <div class="box-alert">
                    <div class="form-feild">
                        <div class="form-title">
                            <h2>Chỉnh sửa</h2>
                        </div>
                            <form id="form-edit" class="edit-menu" enctype="multipart/form-data">
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
                    <div class="btn-close">
                        <span><i class="fas fa-times"></i></span>
                    </div>
                </div>
            </div>
    </div>
@endsection

@push('script-action')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script>
        // Nested demo
        var nestedSortables = [].slice.call(document.querySelectorAll('.nested-sortable'));

        // Loop through each nested sortable element
        for (var i = 0; i < nestedSortables.length; i++) {
            new Sortable(nestedSortables[i], {
                group: 'nested',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,

            });
        }



        const nestedQuery = '.sortable';
        const identifier = '#sortableId';
        const root = document.getElementById('sortable');

        function serialize(sortable) {
            var serialized = [];
            var children = [].slice.call(sortable.children);

            for (var i in children) {
                console.log(children)
                var nested = children[i].querySelector(nestedQuery);
                var data_position = children[i].getAttribute('data-position-menu');
                var data_id = children[i].getAttribute('data-id-menu');
                var data_parent_menu = children[i].getAttribute('data-parent-menu')
                serialized.push({
                    children: nested ? serialize(nested) : [],
                    id_menu: data_id,
                    position: data_position,
                    parent_menu: data_parent_menu
                });
            }
            return serialized
        }
        $(document).ready(function(){
            $('.sortable').sortable({
                connectWith:    '.sortable',
                cursor:         'move',
                placeholder:    'sortable-placeholder',
                handle:         '.block-title',
                cursorAt:       { left: 150, top: 17 },
                tolerance:      'pointer',
                scroll:         false,
                zIndex:         9999,
                update:function(event,ui){
                    console.log(event,ui)
                        let data = serialize(root) // serialize the clicked button's form data
                        console.log(data);
                    $.ajax({
                        method:"POST",
                        url:"{{route('admin.menu.putEditMenu')}}",
                        data:{data:data, _token:"{{csrf_token()}}"},
                        success: (res) => {
                            console.log(res)
                        }
                    })
                }
            });
            $('.sortable').disableSelection();

        })
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-edit').click(function(){
                let name = $(this).attr('data-name');
                let id = $(this).attr('data-id');
                $('.popup-modal'+'.'+name).toggleClass('active');

                $('.btn-close').click(function(){
                    $('.popup-modal').removeClass('active');
                });
                $('.btn-agree').click(function(){
                    $('.popup-modal').removeClass('active');
                });



                $.ajax({
                    url: "{{route('admin.menu.editEditMenu')}}",
                    dataType:"json",
                    method: "GET",
                    data: {id:id},
                    success: (res) => {
                        console.log(res)
                        let name = $(".form-control.name").val(res.data.name_menu);
                        $(".slug").val(res.data.slug)
                        $('.status').each(function(i,item) {
                            if(res.data.hide == item.value){
                                item.checked = true;
                            }
                        })
                        // Loop through each option element in the parent_menu select element
                        $('.parent_menu option').each(function(i, data) {
                            // Check if the value of the option matches the id_category property of res.category
                            if (data.value == res.data.parent_menu) {
                                // If it does, set the selected attribute on the option element
                                $(data).prop('selected', true);
                            }
                        });
                        // Check if res.data.type equals 'category'
                        if (res.data.type === 'category') {
                            // If it does, select the first option if its value equals 1
                            $('.type_menu option[value="2"]').prop('selected', true);
                        } else {
                            $('.type_menu option[value="1"]').prop('selected', true);
                        }
                        let value = $('.type_menu').val();
                        let position = $('.position').val(res.data.position)
                        $.ajax({
                            type: "POST",
                            url:"{{route('admin.menu.typeMenu')}}",
                            data: {typeMenu:value,_token:"{{csrf_token()}}"},
                            success: (res) => {

                                $('.type_inner').addClass('active')
                                $('.type_inner').html(res);
                                console.log(res);
                            }
                        })
                        $('.edit_parent_category option').each(function(i,item) {
                            console.log(item.value,res.data.parent_category)
                            if(parseInt(item.value) == res.data.parent_category){
                                item.selected = true
                                console.log(item.value)
                                $('.edit_parent_category').val(item.value);
                                $('.edit_parent_category').trigger('change');
                            }
                        })

                        $('#form-edit').submit(function(e){
                            e.preventDefault();
                            let name = $('.form-control.name').val();
                            let slug = $('.slug').val();
                            let parent_menu = $('.parent_menu').val();
                            let status = $('.status:checked').val()
                            let typeMenu = $('.type_menu').val();
                            let url = $('.type_inner').val();
                            let position = $('.position').val();
                            var formData = new FormData();
                            formData.append('name',name)
                            formData.append('slug',slug)
                            formData.append('id',id)
                            formData.append('status',status)
                            formData.append('parent_menu', parent_menu);
                            formData.append('typeMenu',typeMenu)
                            formData.append('url',url)
                            formData.append('id',id)
                            formData.append('_token',"{{csrf_token()}}")
                            $.ajax({
                                type:"POST",
                                url: "{{route('admin.menu.apiPutEditMenu')}}",
                                data:formData,
                                success: (res) => {
                                    if(res.status == 404){
                                        console.log(res)
                                        validator(res.status,res.message)

                                    }
                                    else{
                                        console.log(res)
                                        window.location.reaload()
                                    }
                                },
                                cache: false,
                                contentType: false,
                                processData: false

                            })
                        })


                    } // Missing closing parenthesis here
                });
            });

            $('.btn-delete').click(function() {
                let id = $(this).attr('data-id');
                formData = new FormData();
                formData.append('id',id)
                $.ajax({
                    type:"DELETE",
                    dataType:"json",
                    url: "{{route('admin.menu.deleteMenu')}}",
                    data: formData,
                    success: (res) => {
                        console.log(res);
                    }
                })
            })
        });
</script>

@endpush


