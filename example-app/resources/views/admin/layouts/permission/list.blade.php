@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">

        <a href="{{route('admin.permisson.permisson.create')}}" class="btn btn-add"  data-name="add-product">Thêm mới</a>
        <button class="btn btn-delete delete-checkbox" id="delete-checkbox" disabled data-name="popup-delete-checkbox">Xoá</button>

        <div class="table">

            <table id="table">

                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Quyền</th>
                        <th>Chức vụ</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($permission as $item)
                        <tr>
                            <td>
                                <input type="checkbox" id="item-check" name="item-check[]" value="{{$item->id}}">
                            </td>
                            <td>{{$item->name}}</td>
                            <td class="badge badge-soft-info">
                                @foreach ($item->roles as $r)
                                    <span class="badge badge-soft-info">{{$r->name}}</span>
                                @endforeach
                            </td>
                            <td><a href="{{route('admin.permisson.permisson.edit',['id' => $item->id])}}"  class="btn-edit" data-name="edit-product" data-id="{{$item->id}}">Chỉnh sửa</a></td>
                            {{-- class="btn-edit"  --}}
                            <td><a href="{{route('admin.permisson.permisson.delete',['id' => $item->id])}}" class="btn-delete">Xoá</a></td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>

                    <tr>
                        <td><input type="checkbox" name="" id="" class="check-all"></td>
                    </tr>


                </tfoot>

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
        {{-- <div class="popup-modal edit-product" >
            <div class="box-alert">
                <div class="form-feild">
                    <div class="form-title">
                        <h2>Chỉnh sửa</h2>
                    </div>
                    <form class="form-edit" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên Thương Hiệu</label>
                            <input type="text" placeholder="Nhập tên Thương Hiệu" class="form-control edit_name" id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên Thương Hiệu" class="form-control edit_slug"  id="convert_slug" name="slug">
                            <p class="slug-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh đại diện</label>
                            <input type="file" name="image" id="" class="file edit_file" id="upload-file">
                            <p class="image-error text text-danger"></p>
                            <div class="form-group" id="show-file" style="width:120px;height:120px; padding-top: 8px">
                                <img src="https://www.apple.com/ac/structured-data/images/knowledge_graph_logo.png?202209082218" class="1"  alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status" id="status" class="edit_status" value="0" style="width:auto;"><label for="">Ẩn</label>
                            <input type="radio" name="status"  id="status" class="edit_status" value="1"   style="width:auto;"> <label for="">Hiện</label>
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

        </div> --}}

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
                        url: "{{route('admin.brand.apiListBrand')}}",
                        dataSrc: 'data'
                    },
                    "columns": [
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<input type="checkbox" class='item-check' id="item-check" name="item-check[]" value="${data.id_brand}">`
                                // console.log(row)
                            }
                        },
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<img src="${data.logo_brand}" alt="${data.name_band}" style="max-width:80px;max-height:60px;object-fit:cover"/>`
                            }
                        },
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<span>${data.name_brand}</span>`
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
                                return `<a class="btn-edit"  data-name="edit-product" data-id="${data.id_brand}">Chỉnh sửa</a>`
                            }
                        },
                        {
                            data:null,
                            render: function(data,type,row,meta){
                                return `<td><a  class="btn-delete"  data-id="${data.id_brand}">Xoá</a></td>`
                            }
                        }
                    ],
                    language:{
                        search: "Tìm kiếm",
                        Show: "Hiển thị"
                    },
                    paginate: {
                        first:      "Trang Đầu",
                        previous:   "Trang trước",
                        next:       "Trang tiếp",
                        last:       "Trang cuối"
                    }
                })
            }
        $('body').on('click','.btn-edit',function() {
            let name=$(this).attr('data-name');
            let id=$(this).attr('data-id');
            $('.popup-modal'+'.'+name).toggleClass('active');
            // $('.popup-modal').click(function(){
            //     $('.popup-modal').removeClass('active');
            // });
            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });
            $('.btn-agree').click(function(){
                $('.popup-modal').removeClass('active');
            });

            $.ajax(
                {
                    url: "{{route('admin.brand.editBrand')}}",
                    dataType:"json",
                    method: "GET",
                    data: {id:id},
                    success: (res) => {
                        console.log(res)
                        let name=  $(".form-control.edit_name").val(res.data.name_brand);
                        $(".edit_slug").val(res.data.slug);
                        // let link_img = `<img src="${res.data.image_category}"/>`
                        $(".1").removeAttr("src");
                        $(".1").attr("src", `${res.data.logo_brand}`);
                        $('.edit_status').each(function(i,item) {
                            if(res.data.status == item.value){
                                item.checked = true;
                            }
                        })
                    }
                }
            )


            $('.form-edit').submit(function(e){
            //  ).val();
                // let slug = $(".edit   // e.preventDefault();
                // var token =  $('input[name="_token"]').attr('value');
                // console.log(token);
                // let name = $(".edit_names"_slug").val();
                // let _parent = $(".edit_parent option:selected").val();
                // $.ajax({
                //     type:"POST",
                //     dataType:"JSON",
                //     url: "{{route('admin.filter.putEditFilter')}}",
                //     data: {id:id,_token:"{{csrf_token()}}",name:name,slug:slug,_parent:_parent},
                //     success: (res) => {
                //         // window.location.reload();
                //         // $('.table').html(res);
                //        console.log(res)

                //         if(res.status == 200 ){
                //             $('#table').DataTable().destroy()
                //             getDataTable();
                //             $('.alert').toggleClass('active')
                //             validator(res.status,res.message)
                //         }
                //         if(res.status == 404){
                //             validator(res.status,res.message)
                //         }
                //     }
                // })
                e.preventDefault();

                let name_brand = $('.form-control.edit_name').val();

                let slug_brand = $('.form-control.edit_slug').val();
                let image_brand =  $('input[type=file].edit_file')[0].files[0];
                console.log(image_brand)
                let status_brand = $('input[type=radio].edit_status:checked').val()
                console.log(status_brand)
                var formData = new FormData();
                formData.append('id',id)
                formData.append('image', $('input[type=file].edit_file')[0].files[0]);
                formData.append('name',name_brand)
                formData.append('slug',slug_brand)
                formData.append('status',status_brand)
                formData.append('_token',"{{csrf_token()}}")

                $.ajax({
                    type:"POST",
                    url: "{{route('admin.brand.putEditBrand')}}",
                    data:formData,
                    success: (res) => {
                        if(res.status == 404){
                            console.log(res)
                            validator(res.status,res.message)

                        }
                        else{
                            validator(res.status,res.message)
                            console.log(res)
                            $('#table').DataTable().destroy()
                            getDataTable();
                            $('.alert').toggleClass('active')
                            $('.popup-modal').removeClass('active');
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
                    url: "{{route('admin.brand.deleteBrand')}}",
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
                    url: "{{route('admin.brand.deleteBrand')}}",
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
                let name_brand = $('.form-control.name').val();
                console.log(name_brand)
                let slug_brand = $('.slug').val();
                let image_brand =  $('input[type=file]')[0].files[0];
                console.log(image_brand)
                let status_brand = $('input[type="radio"].status:checked').val()
                console.log(status_brand);
                var formData = new FormData();

                formData.append('image', $('input[type=file]')[0].files[0]);
                formData.append('name',name_brand)
                formData.append('slug',slug_brand)
                formData.append('status',status_brand)
                formData.append('_token',"{{csrf_token()}}")
                $.ajax({
                    type:"POST",
                    url: "{{route('admin.brand.postAddBrand')}}",
                    data:formData,
                    success: (res) => {
                        if(res.status == 404){
                            console.log(res)
                            validator(res.status,res.message)

                        }
                        else{
                            console.log(res)
                            $('#table').DataTable().destroy()
                            getDataTable();
                            $('.alert').toggleClass('active')
                            $('.popup-modal').removeClass('active');
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function(xhr) {
                        console.log((xhr.responseJSON.errors));
                    }
                })
            })

    })
    </script>
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // SELECT 2
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
