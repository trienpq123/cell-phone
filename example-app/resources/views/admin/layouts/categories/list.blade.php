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
                        <th>Hình ảnh</th>
                        <th>Tên danh mục</th>
                        <th>Ẩn/Hiện</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($listFilter as $item)
                        <tr>
                            <td>
                                <input type="checkbox" id="item-check" name="item-check[]" value="{{$item->filter_id}}">
                            </td>
                            <td></td>
                            <td class="badge badge-soft-info">{{$item->filter_name}}</td>
                            <td>{{$item->slug}}</td>
                            <td><a class="btn-edit"  data-name="edit-product" data-id="{{$item->filter_id}}">Chỉnh sửa</a></td>
                            <td><a  class="btn-delete">Xoá</a></td>
                        </tr>

                    @endforeach
                </tbody> --}}
                @if (count($listCategory)>0)
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
                        <h2>Thêm danh mục mới</h2>
                    </div>
                    <form id="form-add" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input type="text" placeholder="Nhập tên Danh mục" class="form-control name" id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên Danh mục" class="form-control slug"  id="convert_slug" name="slug">
                            <p class="slug-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc" id="desc" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="" class="file" id="upload-file">
                            <p class="image-error text text-danger"></p>
                            <div class="form-group" id="show-file" style="width:120px;height:120px; padding-top: 8px">
                                {{-- <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/_/t_m_18.png"  alt=""> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status" id="status" class="status" value="0" style="width:auto;"><label for="">Ẩn</label>
                            <input type="radio" name="status"  id="status" class="status" value="1"   style="width:auto;"> <label for="">Hiện</label>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn bộ lọc</label>
                            <select class="js-example-basic-single filter form-control" name="id_filter" multiple="multiple">
                                <option >Chưa chọn bộ lọc</option>
                                @if (count($listFilter) > 0)
                                    @foreach ($listFilter as $item)
                                        <option value={{$item->filter_id}}>{{$item->filter_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn Danh Mục Cha</label>
                            <select class="js-example-basic-single parent_category form-control " name="parent_category">
                                <option value="">Chưa có</option>
                                @if (count($listCategory) > 0)
                                    @foreach ($listCategory as $item)
                                        <option value={{$item->id_category}}>{{$item->name_category}}</option>
                                    @endforeach
                                @endif
                            </select>
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
                            <label for="">Tên danh mục</label>
                            <input type="text" placeholder="Nhập tên Danh mục" class="form-control edit_name" id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên Danh mục" class="form-control edit_slug"  id="convert_slug" name="slug">
                            <p class="slug-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc edit_desc" id="desc" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="" class="file edit_file" id="upload-file">
                            <p class="image-error text text-danger"></p>
                            <div class="form-group" id="show-file" style="width:120px;height:120px; padding-top: 8px">
                                <img class="1"   src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/_/t_m_18.png"  alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status" id="status" class="edit_status" value="0" style="width:auto;"><label for="">Ẩn</label>
                            <input type="radio" name="status"  id="status" class="edit_status" value="1"   style="width:auto;"> <label for="">Hiện</label>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn bộ lọc</label>
                            <select class="js-example-basic-single edit_filter form-control " name="id_filter" multiple="multiple">
                                <option value="">Chưa chọn bộ lọc</option>
                                @if (count($listFilter) > 0)
                                    @foreach ($listFilter as $item)
                                        <option value={{$item->filter_id}}>{{$item->filter_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn Danh Mục Cha</label>
                            <select class="js-example-basic-single edit_parent_category  form-control" name="parent_category">
                                <option value="">Chưa có</option>
                                @if (count($listCategory) > 0)
                                    @foreach ($listCategory as $item)
                                        <option value={{$item->id_category}}>{{$item->name_category}}</option>
                                    @endforeach
                                @endif
                            </select>
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
                        url: "{{route('admin.category.apiListCategory')}}",
                        dataSrc: 'data'
                    },
                    "columns": [
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<input type="checkbox" class='item-check' id="item-check" name="item-check[]" value="${data.id_category}">`
                                // console.log(row)
                            }
                        },
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<img src="${data.image_category}" alt="${data.name_category}" style="max-width:80px;max-height:60px;object-fit:cover"/>`
                            }
                        },
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<span>${data.name_category}</span>`
                            }
                        },
                        {
                            data:null ,
                            render: function(data,type,row,meta){
                                // return `<a class="btn-edit"  data-name="edit-product" data-id="${data.id_category}">Chỉnh sửa</a>`
                                return data.hide == 1 ? `<label class="switch">
                                                            <input type="checkbox" checked>
                                                            <span class="slider"></span>
                                                        </label>` : `<label class="switch">
                                                                        <input type="checkbox">
                                                                        <span class="slider"></span>
                                                                    </label>`
                            }
                        },
                        {
                            data:null,
                            render: function(data,type,row,meta){
                                return `<a class="btn-edit"  data-name="edit-product" data-id="${data.id_category}">Chỉnh sửa</a>`
                            }
                        },
                        {
                            data:null,
                            render: function(data,type,row,meta){
                                return `<td>
                                    <button class="tooltip btn-delete"  data-id="${data.id_category}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" height="25" width="25">
                                        <path fill="#6361D9" d="M8.78842 5.03866C8.86656 4.96052 8.97254 4.91663 9.08305 4.91663H11.4164C11.5269 4.91663 11.6329 4.96052 11.711 5.03866C11.7892 5.11681 11.833 5.22279 11.833 5.33329V5.74939H8.66638V5.33329C8.66638 5.22279 8.71028 5.11681 8.78842 5.03866ZM7.16638 5.74939V5.33329C7.16638 4.82496 7.36832 4.33745 7.72776 3.978C8.08721 3.61856 8.57472 3.41663 9.08305 3.41663H11.4164C11.9247 3.41663 12.4122 3.61856 12.7717 3.978C13.1311 4.33745 13.333 4.82496 13.333 5.33329V5.74939H15.5C15.9142 5.74939 16.25 6.08518 16.25 6.49939C16.25 6.9136 15.9142 7.24939 15.5 7.24939H15.0105L14.2492 14.7095C14.2382 15.2023 14.0377 15.6726 13.6883 16.0219C13.3289 16.3814 12.8414 16.5833 12.333 16.5833H8.16638C7.65805 16.5833 7.17054 16.3814 6.81109 16.0219C6.46176 15.6726 6.2612 15.2023 6.25019 14.7095L5.48896 7.24939H5C4.58579 7.24939 4.25 6.9136 4.25 6.49939C4.25 6.08518 4.58579 5.74939 5 5.74939H6.16667H7.16638ZM7.91638 7.24996H12.583H13.5026L12.7536 14.5905C12.751 14.6158 12.7497 14.6412 12.7497 14.6666C12.7497 14.7771 12.7058 14.8831 12.6277 14.9613C12.5495 15.0394 12.4436 15.0833 12.333 15.0833H8.16638C8.05588 15.0833 7.94989 15.0394 7.87175 14.9613C7.79361 14.8831 7.74972 14.7771 7.74972 14.6666C7.74972 14.6412 7.74842 14.6158 7.74584 14.5905L6.99681 7.24996H7.91638Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                    <span class="tooltiptext">remove</span>
                                    </button>
                                </td>`
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

            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });
            $('.btn-agree').click(function(){
                $('.popup-modal').removeClass('active');
            });

            $.ajax(
                {
                    url: "{{route('admin.category.editCategory')}}",
                    dataType:"json",
                    method: "GET",
                    data: {id:id},
                    success: (res) => {
                        console.log(res)
                      let name=  $(".form-control.edit_name").val(res.data.name_category);
                        $(".edit_slug").val(res.data.slug);
                        // let link_img = `<img src="${res.data.image_category}"/>`
                        $(".1").removeAttr("src");
                        $(".1").attr("src", `${res.data.image_category}`);
                        id_filter = [];
                            for(let i = 0; i< res.listFilter.length; i++){
                                id_filter.push(res.listFilter[i].id_filter)
                            }
                        $('.edit_filter').val(id_filter);
                        $('.edit_filter').trigger('change');
                        $('.edit_desc').val(res.data.desc_category);
                        $('.edit_status').each(function(i,item) {
                            if(res.data.hide == item.value){
                                item.checked = true;
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
                let filter = $('.edit_filter :selected');
                let name_category = $('.form-control.edit_name').val();
                console.log(name_category)
                let slug_category = $('.edit_slug').val();
                let desc_category = CKEDITOR.instances.desc.getData();
                let image_category =  $('input[type=file].edit_file')[0].files[0];
                let parent_category = $('.edit_parent_category').val();
                console.log(parent_category)
                console.log(image_category)
                console.log(desc_category)
                let status_category = $('.edit_status:checked').val()
                console.log(status_category)
                var formData = new FormData();
                formData.append('desc',desc_category)
                formData.append('id',id)
                formData.append('image', $('input[type=file]')[0].files[0]);
                formData.append('name',name_category)
                formData.append('slug',slug_category)
                formData.append('status',status_category)
                formData.append('parent_category',parent_category)
                formData.append('_token',"{{csrf_token()}}")
                let status = $('.status').val();
                idFilter = [];
                filter.each(function(i,f) {
                    return idFilter.push(f.value)
                })
                console.log(idFilter)
                formData.append('idFilter',idFilter)

                $.ajax({
                    type:"POST",
                    url: "{{route('admin.category.putEditCategory')}}",
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
                    url: "{{route('admin.category.deleteCategory')}}",
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
                    url: "{{route('admin.category.deleteCategory')}}",
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
                let filter = $('.filter :selected');
                let name_category = $('.form-control.name').val();
                let slug_category = $('.slug').val();
                let desc_category = CKEDITOR.instances.desc.getData();
                let image_category =  $('input[type=file]')[0].files[0];
                let parent_category = $('.parent_category').val();
                console.log(image_category)
                let status_category = $('.status').val()
                var formData = new FormData();
                formData.append('desc',desc_category)
                formData.append('image', $('input[type=file]')[0].files[0]);
                formData.append('name',name_category)
                formData.append('slug',slug_category)
                formData.append('status',status_category)
                formData.append('parent_category',parent_category)
                formData.append('_token',"{{csrf_token()}}")
                let status = $('.status').val();
                idFilter = [];
                filter.each(function(i,f) {
                    return idFilter.push(f.value)
                })
                formData.append('idFilter',idFilter)
                $.ajax({
                    type:"POST",
                    url: "{{route('admin.category.postAddCategory')}}",
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // SELECT 2
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
