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
                        <th>Mã sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên Sản phẩm</th>
                        {{-- <th>Tình trạng</th> --}}
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
        <div class="popup-modal add-product" >
            <div class="box-alert">
                <div class="form-feild">
                    <div class="form-title">
                        <h2>Thêm Sản phẩm mới</h2>
                    </div> 
                    <form id="form-add" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên Sản phẩm</label>
                            <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control name" id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control slug"  id="convert_slug" name="slug">
                            <p class="slug-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Mã sản phẩm (SKU)</label>
                            <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control product_sku"  id="product_sku" name="product_sku">
                            <p class="slug-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc_short" id="desc_short" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc" id="desc" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="" class="add-file" id="upload-file" multiple>
                            <p class="image-error text text-danger"></p>
                            <div class="form-group" id="show-file" style="width:120px;height:120px; padding-top: 8px">
                                {{-- <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/_/t_m_18.png"  alt=""> --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Thêm thuộc tính</label>
                            <table class="table">
                                <thead>
                                    <th>Tên thuộc tính ( Size - Color )</th>
                                  
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="kích thước" class="add-size">
                                            <div class="container-size">
                                                {{-- <button class="badge-2" data-id="16gb">16GB <span class="close">x</span></button> --}}
                                              
                                            </div>
                                        </td>
                                       
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" placeholder="Màu sắc" class="add-color">
                                            <div class="container-color">
                                                
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group table-price">
                            <label for="">Chỉnh sửa bảng giá</label>
                            <table class="table">
                                <thead>
                                    <th></th>
                                    <th>Tên thuộc tính</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Giá giảm</th>
                                </thead>
                                <tbody>
                                    <button>thêm</button>
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>
                                            16GB
                                            Màu trắng
                                            Da
                                        </td>
                                        <td>
                                            <input type="text" value="SKU">
                                        </td>
                                        <td>
                                            <input type="number" name="" placeholder="Giá" value="0" id="">
                                        </td>
                                        <td>
                                            <input type="number" name="" placeholder="Giá giảm" value="0" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="status" id="status" class="status" value="0" style="width:auto;"><label for="">Ẩn</label>
                            <input type="radio" name="status"  id="status" class="status" value="1"   style="width:auto;"> <label for="">Hiện</label>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn thương hiệu</label>
                            <select class="js-example-basic-single brand form-control" name="id_brand" multiple="multiple">
                                <option >Chưa chọn thương hiệu</option>
                                @if (count($getBrands) > 0)
                                    @foreach ($getBrands as $item)
                                        <option value={{$item->id_brand}}>{{$item->name_brand}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select class="js-example-basic-single category form-control" name="parent_category">
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
                            <label for="">Tên Sản phẩm</label>
                            <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control edit_name" id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control edit_slug"  id="convert_slug" name="slug">
                            <p class="slug-error text text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc edit_desc" id="desc" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh đại diện</label>
                            <input type="file" name="image" id="" class="file edit_file" id="upload-file">
                            <p class="image-error text text-danger"></p>
                            <div class="form-group" id="show-file" style="width:120px;height:120px; padding-top: 8px">
                                <img class="1"   src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/_/t_m_18.png"  alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh khác</label>
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
                                {{-- @if (count($listFilter) > 0)
                                    @foreach ($listFilter as $item)
                                        <option value={{$item->filter_id}}>{{$item->filter_name}}</option>
                                    @endforeach
                                @endif --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn Sản phẩm Cha</label>
                            <select class="js-example-basic-single edit_parent_category  form-control" name="parent_category">
                                <option value="">Chưa có</option>
                                {{-- @if (count($listCategory) > 0)
                                    @foreach ($listCategory as $item)
                                        <option value={{$item->id_category}}>{{$item->name_category}}</option>
                                    @endforeach
                                @endif --}}
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
        
        function InnerTableAttr(){
            let check_size = document.querySelectorAll(".container-size .badge-2 span");
                        let table = document.querySelector(".table-price table tbody");
                        let tr = "";
                        for (let i = 0; i < check_size.length; i++) {
                            let getValueSize = check_size[i].getAttribute("data-value")
                            let check_color = document.querySelectorAll(".container-color .badge-2 span");
                            console.log(check_color)
                            if(check_color.length > 0){
                                        for (let c = 0; c < check_color.length; c++) {
                                        let getValueColor = check_color[c].getAttribute("data-value")
                                        tr += `<tr>
                                                <td> <input type="checkbox" /> </td>
                                                <td>
                                                    <span>${getValueSize}</span>    -
                                                    <span>${getValueColor}
                                                    <input type="text" hidden value="${getValueSize}" class="size" />
                                                    <input type="text" hidden value="${getValueColor}" class="color" />
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="Mã sản phẩm" class="product_sku" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá" class="product_price" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                </td>
                                        </tr>`      
                                    }
                            }else{
                                tr += `<tr>
                                                <td> <input type="checkbox" /> </td>
                                                <td>
                                                    <span>${getValueSize}</span>    
                                                    <input type="text" hidden value="${getValueSize}" class="size" />
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="Mã sản phẩm" class="product_sku" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá" class="product_price" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                </td>
                                        </tr>`   
                            }
                           
                   
                        }
                        console.log(tr);
                        table.innerHTML = tr;
        }
        let btn_size = 1;
        createButtonSize();
        function createButtonSize(){
            let get_add_size = document.querySelector('.add-size');
            get_add_size.addEventListener("keydown",function(e){
                    let i =1
                    if(e.keyCode === 13){
                        let value = this.value;
                        console.log(value)
                        let create_button = document.createElement("div");
                        let create_span = document.createElement("span");
                        create_span.setAttribute("class",'close');
                        create_span.setAttribute("data-value",value);

                        create_span.textContent = "x";
                        setValuteSizeButton = create_button.setAttribute("class",`badge-2`)
                        setValuteSizeButton = create_button.setAttribute("id",`btn-${btn_size++}`)
                        let getValueSizeButton =create_button.getAttribute("id");
                        create_span.setAttribute("data-id",getValueSizeButton);
                        create_button.textContent = value
                        create_button.appendChild(create_span)
                        let container_size = document.querySelector('.container-size');
                        container_size.appendChild(create_button)
                        InnerTableAttr()
                        this.value = "";
                    }
            
            })
        }
        createButtonColor();

        function createButtonColor() {
            let get_add_size = document.querySelector('.add-color');
            get_add_size.addEventListener("keydown",function(e){
                    let i =1
                    if(e.keyCode === 13){
                        let value = this.value;
                        console.log(value)
                        let create_button = document.createElement("div");
                        let create_span = document.createElement("span");
                        create_span.setAttribute("class",'close');
                        create_span.setAttribute("data-value",value);

                        create_span.textContent = "x";
                        setValuteSizeButton = create_button.setAttribute("class",`badge-2`)
                        setValuteSizeButton = create_button.setAttribute("id",`btn-color-${btn_size++}`)
                        let getValueSizeButton =create_button.getAttribute("id");
                        create_span.setAttribute("data-id",getValueSizeButton);
                        create_button.textContent = value
                        create_button.appendChild(create_span)
                        let container_size = document.querySelector('.container-color');
                        container_size.appendChild(create_button)
                        this.value = ""
                        InnerTableAttr();
                    }
            
            })
        }
      



        $('body').on('click','.close',function(){
               let id = $(this).attr("data-id");
               console.log(id);
               $(`#${id}`).remove();
               InnerTableAttr();
        })
       
        // delete_size.addEventListener('click',function() {
        //     alert('1')
        // })
      
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
                        url: "{{route('admin.product.apiListProduct')}}",
                        dataSrc: 'data'
                    },
                    "columns": [
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<input type="checkbox" class='item-check' id="item-check" name="item-check[]" value="${data.id_product}">`;
                            }
                        },
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<a >${data.product_SKU}</a>`;
                            }
                        },
                        {
                            data: null,
                            render: function(data,type,row,meta){
                                return `<img src="${data.images[0].link_img}" alt="${data.name_product}" style="max-width:80px;max-height:60px;object-fit:cover"/>`
                            }
                        },
                        { 
                            data: null,
                            render: function(data,type,row,meta){
                                return `<span>${data.name_product}</span>`
                            }                    
                        },
                        {
                            data:null ,
                            render: function(data,type,row,meta){
                                return data.status == 0 ? "Hiển Thị" : "Ẩn"
                            }
                        },
                        {
                            data:null,
                            render: function(data,type,row,meta){
                                return `<a class="btn-edit"  data-name="edit-product" data-id="${data.id_product}">Chỉnh sửa</a>`
                            }
                        },
                        {
                            data:null,
                            render: function(data,type,row,meta){
                                return `<td><a  class="btn-delete"  data-id="${data.id_product}">Xoá</a></td>`
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
                let name_product = $('.form-control.name').val();
                let idBrand = [];
                $('.brand option:checked').each(function(i,item) {
                    return idBrand.push(item.value)
                })
                let slug_product = $('.slug').val();
                let desc_product = CKEDITOR.instances.desc.getData();
                let desc_short_product = CKEDITOR.instances.desc_short.getData();
                console.log(desc_product,desc_short_product);
                let product_sku = $('.product_sku').val();
                let id_category = $('.category').val();
                // let image_category =  $('input[type=file]')[0].files[0]
                let status_product = $('.status:checked').val()
                var formData = new FormData();
                formData.append('desc',desc_product)
                formData.append('desc_short',desc_short_product)
                for (let i = 0; i < $('input[type=file].add-file')[0].files.length; i++) {
                    formData.append('image[]', $('input[type=file].add-file')[0].files[i]); 
                }
                formData.append('name',name_product)
                formData.append('slug',slug_product)
                formData.append('status',status_product)
                formData.append('idBrand',idBrand)
                formData.append('product_sku',product_sku)
                formData.append('id_category',id_category)
                formData.append('_token',"{{csrf_token()}}")
                $.ajax({
                    type:"POST",
                    url: "{{route('admin.product.postAddProduct')}}",
                    data:formData,
                    success: (res) => {
                        console.log(res)
                        validator(res.status,res.message) 
                        // if(res.status == 404){
                        //     console.log(res)
                          
                        // }
                        // else{
                        //     console.log(res)
                        //     // $('#table').DataTable().destroy()
                        //     // getDataTable();
                        //     // $('.alert').toggleClass('active')
                        //     // $('.popup-modal').removeClass('active');
                        // }               
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                    // error: function(xhr) {
                    //     console.log((xhr.responseJSON.errors));
                    // }
                })
            })

    })
    </script>
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('desc', {
            filebrowserUploadUrl: "{{route('admin.uploadFile', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script>
        CKEDITOR.replace('desc_short', {
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