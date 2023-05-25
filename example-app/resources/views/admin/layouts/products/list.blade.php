@extends('admin.index')
@section('articles')
    <div class="list-table">
        <div class="wrap-container">

            <button class="btn btn-add" data-name="add-product">Thêm mới</button>
            <button class="btn btn-delete delete-checkbox" id="delete-checkbox" disabled
                data-name="popup-delete-checkbox">Xoá</button>

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
            <div class="popup-modal add-product">
                <div class="box-alert">
                    <div class="form-feild">
                        <div class="form-title">
                            <h2>Thêm Sản phẩm mới</h2>
                        </div>
                        <form id="form-add" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên Sản phẩm</label>
                                <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control name"
                                    id="slug" onchange="ChangeToSlug()" name="name">
                                <p class="name-error text text-danger"></p>
                            </div>

                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control slug"
                                    id="convert_slug" name="slug">
                                <p class="slug-error text text-danger"></p>
                            </div>
                            <div class="form-group">
                                        <label for="parent_category">Danh mục</label>
                                        <select class="category " id="parent_category" name="parent_category">
                                            <option value="">Chưa có</option>
                                            @if (count($listCategory) > 0)
                                                @foreach ($listCategory as $item)
                                                    <option value={{ $item->id_category }}>{{ $item->name_category }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <select class="child-category-1" id="child-category-1" name="child-category-1">
                                            <option value="">Chưa có</option>
                                            <div class="list-child-category-1">

                                            </div>
                                        </select>
                                        <select class="child-category-2" id="child-category-2" name="child-category-2">
                                            <option value="">Chưa có</option>
                                            <div class="list-child-category-2">

                                            </div>
                                        </select>
                            </div>
                            <div class="form-group">
                                <label for="">Mã sản phẩm (SKU)</label>
                                <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control product_sku"
                                    id="product_sku" name="product_sku">
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
                                <input type="file" name="image" id="" class="add-file" id="upload-file"
                                    multiple>
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
                                        <th>Hàng tồn kho</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="status" id="status" class="status" value="0"
                                    style="width:auto;"><label for="">Ẩn</label>
                                <input type="radio" name="status" id="status" class="status" value="1"
                                    style="width:auto;"> <label for="">Hiện</label>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn thương hiệu</label>
                                <select class="js-example-basic-single brand form-control" name="id_brand"
                                    multiple="multiple">
                                    <option>Chưa chọn thương hiệu</option>
                                    @if (count($getBrands) > 0)
                                        @foreach ($getBrands as $item)
                                            <option value={{ $item->id_brand }}>{{ $item->name_brand }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="product-option">
                                <label for="">Chọn bộ lọc cho sản phẩm</label>
                                <div class="product-option__inner"></div>
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
            <div class="popup-modal edit-product">
                <div class="box-alert">
                    <div class="form-feild">
                        <div class="form-title">
                            <h2>Chỉnh sửa</h2>
                        </div>
                        <form class="form-edit" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên Sản phẩm</label>
                                <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control name_edit"
                                    id="slug" onchange="ChangeToSlug()" name="name">
                                <p class="name-error text text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control slug_edit"
                                    id="convert_slug" name="slug">
                                <p class="slug-error text text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Mã sản phẩm (SKU)</label>
                                <input type="text" placeholder="Nhập tên Sản phẩm"
                                    class="form-control product_sku_edit" id="product_sku" name="product_sku">
                                <p class="slug-error text text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <textarea name="desc" class="desc_short_edit" id="desc_short_edit" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="desc" class="desc_edit" id="desc_edit" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hình ảnh</label>
                                <input type="file" name="image" id="" class="add-file-edit"
                                    id="upload-file" multiple>
                                <p class="image-error text text-danger"></p>
                                <div class="form-group" id="show-file" style="padding-top: 8px">
                                    <div class="list-image flex align-items-center flex-wrap">

                                    </div>
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
                                                <input type="text" placeholder="kích thước" class="add-size-edit">
                                                <div class="container-size-edit">
                                                    {{-- <button class="badge-2" data-id="16gb">16GB <span class="close">x</span></button> --}}

                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" placeholder="Màu sắc" class="add-color-edit">
                                                <div class="container-color-edit">

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group table-price-edit">
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
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group table-price-edit-choose">
                                <label for="">Các thuộc tính đã chọn</label>
                                <table class="table">
                                    <thead>
                                        <th></th>
                                        <th>Tên thuộc tính</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Giá giảm</th>
                                        <th>Hàng tồn kho</th>
                                        <th></th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="status_edit" id="status_edit" class="status_edit"
                                    value="0" style="width:auto;"><label for="">Ẩn</label>
                                <input type="radio" name="status_edit" id="status_edit" class="status_edit"
                                    value="1" style="width:auto;"> <label for="">Hiện</label>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn thương hiệu</label>
                                <select class="js-example-basic-single brand_edit form-control" name="id_brand"
                                    multiple="multiple">
                                    <option>Chưa chọn thương hiệu</option>
                                    @if (count($getBrands) > 0)
                                        @foreach ($getBrands as $item)
                                            <option value={{ $item->id_brand }}>{{ $item->name_brand }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select class="js-example-basic-single category_edit form-control" name="parent_category">
                                    <option value="">Chưa có</option>
                                    @if (count($listCategory) > 0)
                                        @foreach ($listCategory as $item)
                                            <option value={{ $item->id_category }}>{{ $item->name_category }}</option>
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
        function InnerTableAttr() {
            let check_size = document.querySelectorAll(".container-size .badge-2 span");
            let check_color = document.querySelectorAll(".container-color .badge-2 span");

            let table = document.querySelector(".table-price table tbody");
            let tr = "";
            if (check_size.length > 0) {
                for (let i = 0; i < check_size.length; i++) {
                    let getValueSize = check_size[i].getAttribute("data-value")
                    let check_color = document.querySelectorAll(".container-color .badge-2 span");
                    if (check_color.length > 0) {

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
                                                    <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá" class="product_price" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Số lượng" class="product_stock" value="" />
                                                </td>
                                        </tr>`
                        }
                    } else {
                        tr += `<tr>
                                                <td> <input type="checkbox" /> </td>
                                                <td>
                                                    <span>${getValueSize}</span>
                                                    <input type="text" hidden value="${getValueSize}" class="size" />
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá" class="product_price" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Số lượng" class="product_stock" value="" />
                                                </td>
                                        </tr>`
                    }


                }
            } else if (check_color.length > 0) {
                for (let i = 0; i < check_color.length; i++) {
                    let getValueColor = check_color[i].getAttribute("data-value")
                    let check_size = document.querySelectorAll(".container-size .badge-2 span");
                    if (check_size.length > 0) {

                        for (let c = 0; c < check_size.length; c++) {
                            let getValueSize = check_size[c].getAttribute("data-value")
                            tr += `<tr>
                                                <td> <input type="checkbox" /> </td>
                                                <td>
                                                    <span>${getValueSize}
                                                    <span>${getValueColor}
                                                    <input type="text" hidden value="${getValueColor}" class="color" />
                                                    <input type="text" hidden value="${getValueSize}" class="size" />
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá" class="product_price" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Số lượng" class="product_stock" value="" />
                                                </td>
                                        </tr>`
                        }
                    } else {
                        tr += `<tr>
                                                <td> <input type="checkbox" /> </td>
                                                <td>
                                                    <span>${getValueColor}</span>
                                                    <input type="text" hidden value="${getValueColor}" class="color" />
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá" class="product_price" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="Số lượng" class="product_stock" value="" />
                                                </td>
                                        </tr>`
                    }


                }
            }
            table.innerHTML = tr;
        }
        let btn_size = 1;
        createButtonSize();

        function createButtonSize() {
            let get_add_size = document.querySelector('.add-size');
            get_add_size.addEventListener("keydown", function(e) {
                let i = 1
                if (e.keyCode === 13) {
                    let value = this.value;
                    let create_button = document.createElement("div");
                    let create_span = document.createElement("span");
                    create_span.setAttribute("class", 'close');
                    create_span.setAttribute("data-value", value);

                    create_span.textContent = "x";
                    setValuteSizeButton = create_button.setAttribute("class", `badge-2`)
                    setValuteSizeButton = create_button.setAttribute("id", `btn-${btn_size++}`)
                    let getValueSizeButton = create_button.getAttribute("id");
                    create_span.setAttribute("data-id", getValueSizeButton);
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
            get_add_size.addEventListener("keydown", function(e) {
                let i = 1
                if (e.keyCode === 13) {
                    let value = this.value;
                    let create_button = document.createElement("div");
                    let create_span = document.createElement("span");
                    create_span.setAttribute("class", 'close');
                    create_span.setAttribute("data-value", value);

                    create_span.textContent = "x";
                    setValuteSizeButton = create_button.setAttribute("class", `badge-2`)
                    setValuteSizeButton = create_button.setAttribute("id", `btn-color-${btn_size++}`)
                    let getValueSizeButton = create_button.getAttribute("id");
                    create_span.setAttribute("data-id", getValueSizeButton);
                    create_button.textContent = value
                    create_button.appendChild(create_span)
                    let container_size = document.querySelector('.container-color');
                    container_size.appendChild(create_button)
                    this.value = ""
                    InnerTableAttr();
                }

            })
        }





        $(document).ready(function() {
            $('.select-option').change(function(){
                alert($(this).val())
            })
            $('.category').change(function(){
                let value = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{route('admin.category.getChildCategory')}}",
                    data:{id:value},
                    success: (res) => {
                        if(res.status == 200){
                            console.log(res)
                            let child_category = ''
                            res.data.forEach(function(data, i){
                                child_category+=`<option value="${data.id_category}">${data.name_category}</option>`;
                            });
                            $('.child-category-1').html(child_category);
                            let filter = ''
                            let i = 1;
                            res.filter.forEach(function(f,i){
                                console.log(f)
                                f.filter.forEach(function(fp,i){
                                    filter += `<div class="form-group">
                                                 <label>${fp.filter_name}</label>
                                                <select data-id="${fp.filter_id}" class="select-option"  class="select-option-${i++}">
                                            `
                                    f.child_filter.forEach(function(fc,l){
                                        filter += `<option value="${fc.filter_id}">${fc.filter_name}</option>`
                                    })
                                    filter +=`</select>
                                         </div>`
                                })


                            })
                            console.log(filter)
                            $('.product-option__inner').html(filter)
                        }

                    }
                })

            })
            $('.child-category-1').change(function(){
                let value = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{route('admin.category.getChildCategory')}}",
                    data:{id:value},
                    success: (res) => {
                        console.log(res)
                        let child_category = ''
                        res.data.forEach(function(data, i){
                            child_category+=`<option value="${data.id_category}">${data.name_category}</option>`;
                        });
                        $('.child-category-2').html(child_category);
                    }
                })

            })

            $('body').on('click', '.close', function() {
                let id = $(this).attr("data-id");
                console.log(id);
                $(`#${id}`).remove();
                InnerTableAttr();
            })
            $('body').on('click', '.close', function() {
                let id = $(this).attr("data-id");
                console.log(id);
                $(`#${id}`).remove();
                InnerTableAttrEdit();
                alert(1)
            })
            $('body').on('change', 'input[type="checkbox"]', function() {
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
                        url: "{{ route('admin.product.apiListProduct') }}",
                        dataSrc: 'data'
                    },
                    "columns": [{
                            data: null,
                            render: function(data, type, row, meta) {
                                return `<input type="checkbox" class='item-check' id="item-check" name="item-check[]" value="${data.id_product}">`;
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                if (data.product_SKU != null) {

                                    return `<a >${data.product_SKU}</a>`;
                                }
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                if (data.images.length > 0) {
                                    return `<img src="${data.images[0].link_img}" alt="${data.name_product}" style="max-width:80px;max-height:60px;object-fit:cover"/>`
                                }
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                return `<span>${data.name_product}</span>`
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                return data.status == 1 ? "Hiển Thị" : "Ẩn"
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                return `<a class="btn-edit"  data-name="edit-product" data-id="${data.id_product}">Chỉnh sửa</a>`
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                return `<td><a  class="btn-delete"  data-id="${data.id_product}">Xoá</a></td>`
                            }
                        }
                    ],
                    language: {
                        search: "Tìm kiếm",
                        Show: "Hiển thị"
                    },
                    paginate: {
                        first: "Trang Đầu",
                        previous: "Trang trước",
                        next: "Trang tiếp",
                        last: "Trang cuối"
                    }
                })
            }
            $('body').on('click', '.btn-edit', function() {
                let name = $(this).attr('data-name');
                let id = $(this).attr('data-id');
                $('.popup-modal' + '.' + name).toggleClass('active');
                $('.btn-close').click(function() {
                    $('.popup-modal').removeClass('active');
                });
                $('.btn-agree').click(function() {
                    $('.popup-modal').removeClass('active');
                });

                $.ajax({
                    url: "{{ route('admin.product.editProduct') }}",
                    dataType: "json",
                    method: "GET",
                    data: {
                        id: id
                    },
                    success: (res) => {
                        let name = $(".form-control.name_edit").val(res.data.name_product);

                        $(".slug_edit").val(res.data.slug);
                        $(".product_sku_edit").val(res.data.product_SKU);
                        CKEDITOR.instances.desc_short_edit.setData(res.data.p_desc_short)
                        CKEDITOR.instances.desc_edit.setData(res.data.p_desc)
                        console.log(res.data.images.length)
                        if (res.data.images.length > 0) {


                            let list_img = $('.list-image');
                            let img = ''
                            console.log(res.data.images)
                            $.each(res.data.images, function(i, image) {
                                img += `<div class="image-item" style="padding:8px;">
                                        <img src="${image.link_img}" alt="${res.data.name_product}" style="width:80px;height:80px">
                                        <span class="close" data-id="${image.id_product_image}"><i class="fas fa-close"></i></span>
                                    </div>`;

                            });
                            list_img.html(img)
                        }

                        $('.status_edit').each(function(i, status) {
                            if (res.data.status && res.data.status == status.value) {
                                status.checked = true;
                            }
                        })
                        $('.brand_edit').val(res.data.id_brand);
                        $('.brand_edit').trigger('change');

                        if (res.data.product_detail.length > 0) {
                            let product_detail = res.data.product_detail;
                            $table = $('.table-price-edit-choose table tbody');
                            let tr = '';
                            $.each(product_detail, function(i, PD) {
                                tr += `<tr>
                                                                            <td> <input type="checkbox" /> </td>
                                                                            <td>
                                                                                <span>${PD.size}</span>    -
                                                                                <span>${PD.color}
                                                                                <input type="text" hidden value="${PD.size}" class="size" />
                                                                                <input type="text" hidden value="${PD.color}" class="color" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="${PD.product_sku}" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="number" placeholder="Giá" class="product_price" value="${PD.price}" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="number" placeholder="Giá giảm" class="product_price_old" value="${PD.price_sale}" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="number" placeholder="Số lượng" class="product_stock" value="${PD.quanlity}" />
                                                                            </td>
                                                                            <td><span class="delete-product-detail-choose" data-id ="${PD.id_product_detail}"><i class="fas fa-close"></i></span></td>
                                            </tr>`
                            })
                            $table.html(tr)
                        }






                        $('body').on('click', '.list-image .image-item .close', function() {
                            let id = $(this).attr("data-id");
                            console.log(id);
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('admin.product.deleteImageProduct') }}",
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: (res) => {
                                    console.log(res);
                                    $(this).parent().remove();
                                }
                            })
                        })

                        $('body').on('click', '.delete-product-detail-choose', function() {
                            let id = $(this).attr("data-id");
                            console.log(id);
                            $(this).parent().parent().remove();
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('admin.product.deleteProductDetail') }}",
                                data: {
                                    id: id,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: (res) => {
                                    console.log(res);
                                }
                            })
                        })

                    }
                })

                createButtonSizeEdit();

                function createButtonSizeEdit() {
                    let get_add_size = document.querySelector('.add-size-edit');
                    get_add_size.addEventListener("keydown", function(e) {
                        let i = 1
                        if (e.keyCode === 13) {
                            let value = this.value;
                            let create_button = document.createElement("div");
                            let create_span = document.createElement("span");
                            create_span.setAttribute("class", 'close');
                            create_span.setAttribute("data-value", value);

                            create_span.textContent = "x";
                            setValuteSizeButton = create_button.setAttribute(
                                "class", `badge-2`)
                            setValuteSizeButton = create_button.setAttribute(
                                "id", `btn-${btn_size++}`)
                            let getValueSizeButton = create_button.getAttribute(
                                "id");
                            create_span.setAttribute("data-id",
                                getValueSizeButton);
                            create_button.textContent = value
                            create_button.appendChild(create_span)
                            let container_size = document.querySelector(
                                '.container-size-edit');
                            container_size.appendChild(create_button)
                            InnerTableAttrEdit()
                            this.value = "";
                        }

                    })
                }

                function InnerTableAttrEdit() {
                    let check_size = document.querySelectorAll(
                        ".container-size-edit .badge-2 span");
                    let check_color = document.querySelectorAll(
                        ".container-color-edit .badge-2 span");

                    let table = document.querySelector(".table-price-edit table tbody");
                    let tr = "";
                    if (check_size.length > 0) {
                        for (let i = 0; i < check_size.length; i++) {
                            let getValueSize = check_size[i].getAttribute("data-value")
                            let check_color = document.querySelectorAll(
                                ".container-color-edit .badge-2 span");
                            if (check_color.length > 0) {

                                for (let c = 0; c < check_color.length; c++) {
                                    let getValueColor = check_color[c].getAttribute(
                                        "data-value")
                                    tr += `<tr>
                                                    <td> <input type="checkbox" /> </td>
                                                    <td>
                                                        <span>${getValueSize}</span>    -
                                                        <span>${getValueColor}
                                                        <input type="text" hidden value="${getValueSize}" class="size" />
                                                        <input type="text" hidden value="${getValueColor}" class="color" />
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Giá" class="product_price" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Số lượng" class="product_stock" value="" />
                                                    </td>
                                            </tr>`
                                }
                            } else {
                                tr += `<tr>
                                                    <td> <input type="checkbox" /> </td>
                                                    <td>
                                                        <span>${getValueSize}</span>
                                                        <input type="text" hidden value="${getValueSize}" class="size" />
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Giá" class="product_price" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Số lượng" class="product_stock" value="" />
                                                    </td>
                                            </tr>`
                            }


                        }
                    } else if (check_color.length > 0) {
                        for (let i = 0; i < check_color.length; i++) {
                            let getValueColor = check_color[i].getAttribute(
                                "data-value")
                            let check_size = document.querySelectorAll(
                                ".container-size-edit .badge-2 span");
                            if (check_size.length > 0) {

                                for (let c = 0; c < check_size.length; c++) {
                                    let getValueSize = check_size[c].getAttribute(
                                        "data-value")
                                    tr += `<tr>
                                                    <td> <input type="checkbox" /> </td>
                                                    <td>
                                                        <span>${getValueSize}
                                                        <span>${getValueColor}
                                                        <input type="text" hidden value="${getValueColor}" class="color" />
                                                        <input type="text" hidden value="${getValueSize}" class="size" />
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Giá" class="product_price" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Số lượng" class="product_stock" value="" />
                                                    </td>
                                            </tr>`
                                }
                            } else {
                                tr += `<tr>
                                                    <td> <input type="checkbox" /> </td>
                                                    <td>
                                                        <span>${getValueColor}</span>
                                                        <input type="text" hidden value="${getValueColor}" class="color" />
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="Mã sản phẩm" class="product_type_sku" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Giá" class="product_price" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Giá giảm" class="product_price_old" value="" />
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Số lượng" class="product_stock" value="" />
                                                    </td>
                                            </tr>`
                            }


                        }
                    }
                    table.innerHTML = tr;
                }
                createButtonColorEdit();

                function createButtonColorEdit() {
                    let get_add_size = document.querySelector('.add-color-edit');
                    get_add_size.addEventListener("keydown", function(e) {
                        let i = 1
                        if (e.keyCode === 13) {
                            let value = this.value;
                            let create_button = document.createElement("div");
                            let create_span = document.createElement("span");
                            create_span.setAttribute("class", 'close');
                            create_span.setAttribute("data-value", value);

                            create_span.textContent = "x";
                            setValuteSizeButton = create_button.setAttribute(
                                "class", `badge-2`)
                            setValuteSizeButton = create_button.setAttribute(
                                "id", `btn-color-${btn_size++}`)
                            let getValueSizeButton = create_button.getAttribute(
                                "id");
                            create_span.setAttribute("data-id",
                                getValueSizeButton);
                            create_button.textContent = value
                            create_button.appendChild(create_span)
                            let container_size = document.querySelector(
                                '.container-color-edit');
                            container_size.appendChild(create_button)
                            this.value = ""
                            InnerTableAttrEdit();
                        }

                    })
                }

                $('.form-edit').submit(function(e) {
                    e.preventDefault();
                    let name = $(".form-control.name_edit").val();
                    let slug = $(".form-control.slug_edit").val();
                    let product_sku = $(".product_sku_edit").val();
                    let status = $('.status_edit:checked').val();
                    let desc_short = CKEDITOR.instances.desc_short_edit.getData()
                    let desc = CKEDITOR.instances.desc_edit.getData()
                    let idBrand = [];
                    $('.brand_edit option:checked').each(function(i, item) {
                        return idBrand.push(item.value)
                    })
                    let id_category = $(".category_edit").val();
                    let product_detail = [];

                    $('.table-price-edit table tbody tr').each(function(i, tr) {


                        let SizeOfProductValue = '';
                        let colorOfProductValue = '';
                        let product_stock = '';
                        let product_type_sku = '';
                        let product_price = '';
                        let product_price_old = '';
                        let sizeOfProduct = tr.querySelector('.size')
                        console.log(sizeOfProduct)
                        if (sizeOfProduct) {
                            SizeOfProductValue = sizeOfProduct.value
                        }

                        let colorOfP = tr.querySelector('input[type=text].color')
                        if (colorOfP) {
                            colorOfProductValue = colorOfP.value;
                        }
                        let StockofProduct = tr.querySelector(
                            'input[type=number].product_stock')
                        console.log(StockofProduct)
                        if (StockofProduct) {
                            product_stock = StockofProduct.value
                        }
                        let TypeSkuOfProduct = tr.querySelector(
                            'input[type=text].product_type_sku');
                        if (TypeSkuOfProduct) {
                            product_type_sku = TypeSkuOfProduct.value;
                        }
                        let productPrice = tr.querySelector(
                            'input[type=number].product_price');
                        if (productPrice) {
                            product_price = productPrice.value;
                        }
                        let productPriceOld = tr.querySelector(
                            'input[type=number].product_price_old');
                        if (productPriceOld) {
                            product_price_old = productPriceOld.value;
                        }
                        let idProductDetail = '';

                        let option = {
                            SizeOfProductValue: SizeOfProductValue,
                            colorOfProductValue: colorOfProductValue,
                            product_stock: product_stock,
                            product_type_sku: product_type_sku,
                            product_price: product_price,
                            product_price_old: product_price_old,
                            idProductDetail: idProductDetail
                        }
                        product_detail.push(option)

                    })
                    $('.table-price-edit-choose table tbody tr').each(function(i, tr) {


                        let SizeOfProductValue = '';
                        let colorOfProductValue = '';
                        let product_stock = '';
                        let product_type_sku = '';
                        let product_price = '';
                        let product_price_old = '';
                        let sizeOfProduct = tr.querySelector('.size')
                        console.log(sizeOfProduct)
                        if (sizeOfProduct) {
                            SizeOfProductValue = sizeOfProduct.value
                        }

                        let colorOfP = tr.querySelector('input[type=text].color')
                        if (colorOfP) {
                            colorOfProductValue = colorOfP.value;
                        }
                        let StockofProduct = tr.querySelector(
                            'input[type=number].product_stock')
                        console.log(StockofProduct)
                        if (StockofProduct) {
                            product_stock = StockofProduct.value
                        }
                        let TypeSkuOfProduct = tr.querySelector(
                            'input[type=text].product_type_sku');
                        if (TypeSkuOfProduct) {
                            product_type_sku = TypeSkuOfProduct.value;
                        }
                        let productPrice = tr.querySelector(
                            'input[type=number].product_price');
                        if (productPrice) {
                            product_price = productPrice.value;
                        }
                        let productPriceOld = tr.querySelector(
                            'input[type=number].product_price_old');
                        if (productPriceOld) {
                            product_price_old = productPriceOld.value;
                        }


                        let idProductDetail = tr.querySelector(
                            '.delete-product-detail-choose').getAttribute('data-id');

                        let option = {
                            SizeOfProductValue: SizeOfProductValue,
                            colorOfProductValue: colorOfProductValue,
                            product_stock: product_stock,
                            product_type_sku: product_type_sku,
                            product_price: product_price,
                            product_price_old: product_price_old,
                            idProductDetail: idProductDetail
                        }
                        product_detail.push(option)

                    })
                    var formData = new FormData();
                    for (let i = 0; i < $('input[type=file].add-file-edit')[0].files.length; i++) {
                        formData.append('image[]', $('input[type=file].add-file-edit')[0].files[i]);

                    }
                    formData.append('id', id)
                    formData.append('idBrand', idBrand)
                    formData.append('id_category', id_category)
                    formData.append('status', status)
                    formData.append('name', name)
                    formData.append('slug', slug)
                    formData.append('product_sku', product_sku)
                    formData.append('desc_short', desc_short)
                    formData.append('desc', desc)
                    formData.append('product_detail', JSON.stringify(product_detail))
                    formData.append('_token', "{{ csrf_token() }}")


                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.product.putEditProduct') }}",
                        data: formData,
                        success: (res) => {
                            if (res.status == 404) {

                                validator(res.status, res.message)

                            } else {
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


            $('body').on('click', 'table .btn-delete', function() {
                let id = $(this).attr('data-id');
                console.log(id)
                $('#popup-delete').toggleClass('active');
                $('.btn-close').click(function() {
                    $('.popup-modal').removeClass('active');
                });
                $('.action-agree').click(function() {
                    $('.popup-modal').removeClass('active');
                    $.ajax({
                        url: "{{ route('admin.product.deleteProduct') }}",
                        type: "delete",
                        data: {
                            data: [id],
                            _token: "{{ csrf_token() }}"
                        },
                        success: (res) => {
                            if (res.status == 200) {

                                $('#table').DataTable().destroy()
                                getDataTable();
                                $('.alert').toggleClass('active')
                            }
                        }
                    })
                });
            })


            $('.check-all').change(function() {

                if ($(this).is(':checked')) {
                    if ($(this).prop('checked')) {
                        $('.item-check').not(this).prop('checked', true)
                    }
                    // $('tr input:checkbox').attr('checked','checked');

                    let getValueCheckbox = document.querySelectorAll('#item-check');

                    for (let i = 0; i < getValueCheckbox.length; i++) {

                        array.push(getValueCheckbox[i].value);
                        getValueCheckbox[i].addEventListener("click", function() {
                            if (this.checked) {
                                array.push(getValueCheckbox[i].value)
                            } else {
                                let array_new = array.filter(function(arr) {
                                    return arr != getValueCheckbox[i].value;
                                })
                                array = array_new;
                            }
                        })

                    }
                } else {
                    $('tr input:checkbox').removeAttr('checked');
                    array = [];
                }
            })
            $('.delete-checkbox').click(function() {
                let name = $(this).attr('data-name');
                $('.popup-modal' + '.' + name).toggleClass('active');
                // $('.popup-modal').click(function(){
                //     $('.popup-modal').removeClass('active');
                // });
                $('.btn-close').click(function() {
                    $('.popup-modal').removeClass('active');
                });


            })

            $('.action-delete').click(function() {
                $('.popup-modal').removeClass('active');
            })

            $('.action-agree').click(function() {
                let array = []
                let getValueCheckbox = document.querySelectorAll('#item-check');

                for (let i = 0; i < getValueCheckbox.length; i++) {
                    if (getValueCheckbox[i].checked) {
                        array.push(getValueCheckbox[i].value);
                    }
                }
                console.log(array);
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('admin.product.deleteProduct') }}",
                    data: {
                        data: array,
                        _token: "{{ csrf_token() }}"
                    },
                    success: (res) => {
                        if (res.status == 200) {
                            console.log(res);
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
                let product_detail = [];
                $('.table-price table tbody tr').each(function(i, tr) {


                    let SizeOfProductValue = '';
                    let colorOfProductValue = '';
                    let product_stock = '';
                    let product_type_sku = '';
                    let product_price = '';
                    let product_price_old = '';
                    let sizeOfProduct = tr.querySelector('.size')

                    if (sizeOfProduct) {
                        SizeOfProductValue = sizeOfProduct.value
                    }

                    let colorOfP = tr.querySelector('input[type=text].color')
                    if (colorOfP) {
                        colorOfProductValue = colorOfP.value;
                    }
                    let StockofProduct = tr.querySelector('input[type=number].product_stock')
                    console.log(StockofProduct)
                    if (StockofProduct) {
                        product_stock = StockofProduct.value
                    }
                    let TypeSkuOfProduct = tr.querySelector('input[type=text].product_type_sku');
                    if (TypeSkuOfProduct) {
                        product_type_sku = TypeSkuOfProduct.value;
                    }
                    let productPrice = tr.querySelector('input[type=number].product_price');
                    if (productPrice) {
                        product_price = productPrice.value;
                    }
                    let productPriceOld = tr.querySelector('input[type=number].product_price_old');
                    if (productPriceOld) {
                        product_price_old = productPriceOld.value;
                    }

                    let option = {
                        SizeOfProductValue: SizeOfProductValue,
                        colorOfProductValue: colorOfProductValue,
                        product_stock: product_stock,
                        product_type_sku: product_type_sku,
                        product_price: product_price,
                        product_price_old: product_price_old
                    }
                    product_detail.push(option)

                })

                let name_product = $('.form-control.name').val();
                let idBrand = [];
                $('.brand option:checked').each(function(i, item) {
                    return idBrand.push(item.value)
                })
                let slug_product = $('.slug').val();
                let desc_product = CKEDITOR.instances.desc.getData();
                let desc_short_product = CKEDITOR.instances.desc_short.getData();
                let product_sku = $('.product_sku').val();
                let id_category = $('.category').val();
                let status_product = $('.status:checked').val()
                var formData = new FormData();
                formData.append('product_detail', JSON.stringify(product_detail))
                formData.append('desc', desc_product)
                formData.append('desc_short', desc_short_product)
                for (let i = 0; i < $('input[type=file].add-file')[0].files.length; i++) {
                    formData.append('image[]', $('input[type=file].add-file')[0].files[i]);
                }
                $('.table-price table tbody tr').each(function(i, tr) {


                    let SizeOfProductValue = '';
                    let colorOfProductValue = '';
                    let product_stock = '';
                    let product_type_sku = '';
                    let product_price = '';
                    let product_price_old = '';
                    let sizeOfProduct = tr.querySelector('.size')

                    if (sizeOfProduct) {
                        SizeOfProductValue = sizeOfProduct.value
                    }

                    let colorOfP = tr.querySelector('input[type=text].color')
                    if (colorOfP) {
                        colorOfProductValue = colorOfP.value;
                    }
                    let StockofProduct = tr.querySelector('input[type=number].product_stock')
                    console.log(StockofProduct)
                    if (StockofProduct) {
                        product_stock = StockofProduct.value
                    }
                    let TypeSkuOfProduct = tr.querySelector('input[type=text].product_type_sku');
                    if (TypeSkuOfProduct) {
                        product_type_sku = TypeSkuOfProduct.value;
                    }
                    let productPrice = tr.querySelector('input[type=number].product_price');
                    if (productPrice) {
                        product_price = productPrice.value;
                    }
                    let productPriceOld = tr.querySelector('input[type=number].product_price_old');
                    if (productPriceOld) {
                        product_price_old = productPriceOld.value;
                    }

                    let option = {
                        SizeOfProductValue: SizeOfProductValue,
                        colorOfProductValue: colorOfProductValue,
                        product_stock: product_stock,
                        product_type_sku: product_type_sku,
                        product_price: product_price,
                        product_price_old: product_price_old
                    }
                    product_detail.push(option)

                })

                formData.append('name', name_product)
                formData.append('slug', slug_product)
                formData.append('status', status_product)
                formData.append('idBrand', idBrand)
                formData.append('product_sku', product_sku)
                formData.append('id_category', id_category)
                formData.append('_token', "{{ csrf_token() }}")
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.product.postAddProduct') }}",
                    data: formData,
                    success: (res) => {
                        console.log(res)
                        validator(res.status, res.message)
                        if (res.status == 404) {
                            console.log(res)

                        } else {
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
            filebrowserUploadUrl: "{{ route('admin.uploadFile', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('desc_edit', {
            filebrowserUploadUrl: "{{ route('admin.uploadFile', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script>
        CKEDITOR.replace('desc_short', {
            filebrowserUploadUrl: "{{ route('admin.uploadFile', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('desc_short_edit', {
            filebrowserUploadUrl: "{{ route('admin.uploadFile', ['_token' => csrf_token()]) }}",
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
