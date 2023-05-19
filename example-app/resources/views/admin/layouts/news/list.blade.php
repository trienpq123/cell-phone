@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">

        <button class="btn btn-add"  data-name="add-product">Thêm mới</button>
        <button class="btn btn-delete delete-checkbox" id="delete-checkbox" disabled data-name="popup-delete-checkbox">Xoá</button>

        <div class="table">

            <table id="table">

                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Chủ đề</th>
                        <th>slug</th>
                        <th>Ẩn/Hiện</th>
                        <th>Tạo bởi</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            @if (count($news) > 0)
                <tfoot>

                    <tr>
                        <td><input type="checkbox" name="" id="" class="check-all"></td>
                    </tr>
                </tfoot>
            @endif


            </table>
        </div>
        <div class="popup-modal" id="popup-delete">
            <div class="box-alert">
                <div class="alert-item">
                    <span><i class="fas fa-trash-alt"></i></span>
                </div>
                <div class="alert-item">
                    <p>Bạn có chắc chắn là muốn xoá?</p>
                </div>
                <div class="alert-item">
                    <div class="flex justify-content-center align-items-center">
                        <div class="action flex justify-content-center align-items-center">
                            <div class="action-agree">
                                Chấp nhận
                            </div>
                            <div class="action-delete">
                                Huỷ bỏ
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-close">
                    <span><i class="fas fa-times"></i></span>
                </div>
            </div>

        </div>
        <div class="popup-modal popup-delete-checkbox" data-name="delete-check">
            <div class="box-alert">
                <div class="alert-item">
                    <span><i class="fas fa-trash-alt"></i></span>
                </div>
                <div class="alert-item">
                    <p>Bạn có chắc chắn là muốn xoá?</p>
                </div>
                <div class="alert-item">
                    <div class="flex justify-content-center align-items-center">
                        <div class="action flex justify-content-center align-items-center">
                            <div class="action-agree" data-name="action-check">
                                Xác nhận
                            </div>
                            <div class="action-delete">
                                Huỷ bỏ
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-close">
                    <span><i class="fas fa-times"></i></span>
                </div>
            </div>

        </div>
        <div class="popup-modal add-product" >
            <div class="box-alert">
                <div class="form-feild">
                    <div class="form-title">
                        <h2>Thêm Bài Viết mới</h2>
                    </div>
                    <form id="form-add" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên Bài Viết</label>
                            <input type="text" placeholder="Nhập tên Bài Viết" class="form-control name" id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên Bài Viết" class="form-control slug"  id="convert_slug" name="slug">
                            <p class="slug-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc" id="desc" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file"  name="file" class="file" id="file" />
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status"  id="status" class="status" value="0" style="width:auto;"><label for="">Ẩn</label>
                            <input type="radio" name="status" checked id="status" class="status" value="1"   style="width:auto;"> <label for="">Hiện</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-submit">
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
        <div class="popup-modal edit-product" >
            <div class="box-alert">
                <div class="form-feild">
                    <div class="form-title">
                        <h2>Chỉnh sửa</h2>
                    </div>
                    <form class="form-edit" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên Bài Viết</label>
                            <input type="text" placeholder="Nhập tên Bài Viết" class="form-control name_edit" id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên Bài Viết" class="form-control slug_edit"  id="convert_slug" name="slug">
                            <p class="slug-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc_edit" id="desc_edit" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file"  name="file_edit" class="file_edit" id="file_edit" />
                            <div class="list-image flex">
                                <div class="image-item">
                                    <img src="" alt="" style="width: 120px;height: 120px;object-fit:cover">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status"  id="status" class="status_edit" value="0" style="width:auto;"><label for="">Ẩn</label>
                            <input type="radio" name="status" checked id="status" class="status_edit" value="1"   style="width:auto;"> <label for="">Hiện</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-submit">
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
</div>
@endsection

@push('script-action')
    <script>

        $(document).ready(function(){


            $('body').on('change','input[type="checkbox"]',function() {
                var anyChecked = $('input[type="checkbox"]:checked').length

                // Kiểm tra xem có checkbox nào được chọn hay không
                if (anyChecked > 0) {
                // Nếu có checkbox được chọn, loại bỏ thuộc tính "disable" khỏi button (nếu có)
                $('#delete-checkbox').removeAttr('disabled');
                } else {
                // Nếu không có checkbox được chọn, thêm thuộc tính "disable" vào button (nếu chưa có)
                $('#delete-checkbox').attr('disabled', 'disabled');
                }
            });
            let array = [];
            getDataTable();
            function getDataTable() {
                    $('#table').DataTable({
                    "ajax": {
                        type: "GET",
                        url: "{{route('admin.news.apiListNews')}}",
                        dataSrc: 'data'
                    },
                    "columns": [
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<input type="checkbox" class='item-check' id="item-check" name="item-check[]" value="${data.id_new}">`
                                // console.log(row)
                            }
                        },
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<span>${data.title}</span>`
                            }
                        },
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<span>${data.slug}</span>`
                            }
                        },
                        {
                            data:null ,
                            render: function(data,type,row,meta){
                                // return `<a class="btn-edit"  data-name="edit-product" data-id="${data.id_category}">Chỉnh sửa</a>`
                                return data.status == 1 ? "Hiển Thị" : "Ẩn"
                            }
                        },
                        {
                            data:null,
                            render: function(data,type,row,meta){
                                return `<a class="btn-edit"  data-name="edit-product" data-id="${data.id_new}">Chỉnh sửa</a>`
                            }
                        },
                        {
                            data:null,
                            render: function(data,type,row,meta){
                                return `<td><a  class="btn-delete"  data-id="${data.id_new}">Xoá</a></td>`
                            }
                        }
                    ],
                    language:{
                        search: "Tìm kiếm",
                        Show: "Hiển thị"
                    },
                    paginate: {
                        first:      "Bài Viết Đầu",
                        previous:   "Bài Viết trước",
                        next:       "Bài Viết tiếp",
                        last:       "Bài Viết cuối"
                    }
                })
            }
        $('body').on('click','.btn-edit',function() {
            let name=$(this).attr('data-name');
            let id=$(this).attr('data-id');
            $('.popup-modal'+'.'+name).toggleClass('active');

            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });
            $('.btn-agree').click(function(){
                $('.popup-modal').removeClass('active');
            });

            $.ajax(
                {
                    url: "{{route('admin.news.editNews')}}",
                    dataType:"json",
                    method: "GET",
                    data: {id:id},
                    success: (res) => {
                        console.log(res)
                      let name=  $(".form-control.name_edit").val(res.data.title);

                        $(".slug_edit").val(res.data.slug);
                        CKEDITOR.instances.desc_edit.setData(res.data.description);
                        $('.list-image .image-item img').attr('src',res.data.link_img)
                        $('.status_edit').each(function(i,item) {
                            if(res.data.hide == item.value){
                                item.checked = true;
                            }
                        })
                    }
                }
            )


            $('.form-edit').submit(function(e){
                e.preventDefault();
                let title_page = $('.form-control.name_edit').val();
                let slug_page = $('.slug_edit').val();
                let desc_page = CKEDITOR.instances.desc_edit.getData();
                let status_page = $('.status_edit:checked').val()
                var formData = new FormData();
                formData.append('desc',desc_page)
                formData.append('name',title_page)
                formData.append('slug',slug_page)
                formData.append('status',status_page)
                formData.append('id',id)
                formData.append('image', $('input[type=file].file_edit')[0].files[0])
                formData.append('_token',"{{csrf_token()}}")
                $.ajax({
                    type:"POST",
                    url: "{{route('admin.news.putEditNews')}}",
                    data:formData,
                    success: (res) => {
                        if(res.status == 404){
                            validator(res.status,res.message)
                        }
                        else{
                            console.log(res)
                            // $('#table').DataTable().destroy()
                            // getDataTable();
                            // $('.alert').toggleClass('active')
                            // $('.popup-modal').removeClass('active');
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false

                })
            })
        })


        $('body').on('click','table .btn-delete',function(){
            let id = $(this).attr('data-id');
            console.log(id)
            $('#popup-delete').toggleClass('active');
            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });
            $('.action-agree').click(function(){
                $('.popup-modal').removeClass('active');
                $.ajax({
                    url: "{{route('admin.news.deleteNews')}}",
                    type:"delete",
                    data: {data:[id],_token:"{{csrf_token()}}"},
                    success: (res) => {
                        if(res.status == 200){
                            console.log(res)
                            $('#table').DataTable().destroy()
                            getDataTable();
                            $('.alert').toggleClass('active')
                        }
                    }
                })
            });
        })


        $('.check-all').change(function(){

            if($(this).is(':checked')){
                if($(this).prop('checked')){
                    $('.item-check').not(this).prop('checked',true)
                }
                // $('tr input:checkbox').attr('checked','checked');

                let getValueCheckbox = document.querySelectorAll('#item-check');

                for(let i = 0; i < getValueCheckbox.length; i++){

                    array.push(getValueCheckbox[i].value);
                    getValueCheckbox[i].addEventListener("click",function(){
                        if(this.checked){
                            array.push(getValueCheckbox[i].value)
                        }else{
                           let array_new =  array.filter(function(arr){
                                return arr != getValueCheckbox[i].value;
                            })
                            array = array_new;
                        }
                    })

                }
            }else{
                $('tr input:checkbox').removeAttr('checked');
                array = [];
            }
        })
        $('.delete-checkbox').click(function() {
            let name=$(this).attr('data-name');
            $('.popup-modal'+'.'+name).toggleClass('active');
            // $('.popup-modal').click(function(){
            //     $('.popup-modal').removeClass('active');
            // });
            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });


        })

        $('.action-delete').click(function(){
            $('.popup-modal').removeClass('active');
        })

        $('.action-agree').click(function(){
                let array = []
                let getValueCheckbox = document.querySelectorAll('#item-check');

                for(let i = 0; i < getValueCheckbox.length; i++){
                        if(getValueCheckbox[i].checked){
                            array.push(getValueCheckbox[i].value);
                        }
                }
                $.ajax({
                    type: "DELETE",
                    url: "{{route('admin.pages.deletePages')}}",
                    data: {data: array,_token:"{{csrf_token()}}"},
                    success: (res) => {
                        if(res.status == 200){
                            $('#table').DataTable().destroy()
                            getDataTable();
                            $('.alert').toggleClass('active')
                            $('.popup-modal').removeClass('active');
                        }
                    }

                })
        });

        $('#form-add').submit(function(e) {
                e.preventDefault();

                let title_page = $('.form-control.name').val();
                let slug_page = $('.slug').val();
                let desc_page = CKEDITOR.instances.desc.getData();
                let status_page = $('.status:checked').val()

                var formData = new FormData();
                formData.append('desc',desc_page)
                formData.append('name',title_page)
                formData.append('slug',slug_page)
                formData.append('status',status_page)

                formData.append('image', $('input[type=file].file')[0].files[0])
                formData.append('_token',"{{csrf_token()}}")
                $.ajax({
                    type:"POST",
                    url: "{{route('admin.news.postAddNews')}}",
                    data:formData,
                    success: (res) => {
                        if(res.status == 404){
                            console.log(res)
                            validator(res.status,res.message)

                        }
                        else{
                            console.log(res)
                            // $('#table').DataTable().destroy()
                            // getDataTable();
                            // $('.alert').toggleClass('active')
                            // $('.popup-modal').removeClass('active');
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: (errors) =>  {
                        return errors
                    }

                })
            })

    })
    </script>
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'desc', {
            filebrowserUploadUrl: "{{route('admin.uploadFile', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace( 'desc_edit', {
            filebrowserUploadUrl: "{{route('admin.uploadFile', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // SELECT 2
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
