@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">



        <div class="container">
            <form id="form-add" enctype="multipart/form-data" method="post">
                @csrf
                <div class="grid grid-tempalte-colum-7-3 gap-16">
                    <div class="form-left">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control name"
                            id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error alert-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên Sản phẩm" class="form-control slug"
                                    id="convert_slug" name="slug">
                            @if($errors->has('slug'))
                            <span class="text alert-danger fs-6" style="font-size: 12px">{{$errors->first('slug')}}</span>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="parent_category">Danh mục</label>
                            <select class="category js-example-basic-multiple-2" id="parent_category" name="parent_category[]" multiple>
                                <option value="">Chưa có</option>
                                @if (count($listCategory) > 0)
                                    @foreach ($listCategory as $item)
                                        <option value={{ $item->id_category }}>{{ $item->name_category }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Mã sản phẩm (SKU)</label>
                            <input type="text"  placeholder="Nhập tên Sản phẩm" class="form-control product_sku"
                                id="product_sku" name="product_sku">

                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc_short" class="desc_short" id="desc_short" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc" id="desc" cols="30" rows="10"></textarea>
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



                    </div>

                    <div class="form-right">
                        <div class="form-group">
                            <input type="radio" name="status" id="status" class="status" value="0"
                                style="width:auto;"><label for="">Ẩn</label>
                            <input type="radio" name="status" checked id="status" class="status" value="1"
                                style="width:auto;"> <label for="">Hiện</label>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn thương hiệu</label>
                            <select class="js-example-basic-single brand form-control" name="idBrand"
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
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="" class="add-file" id="upload-file"
                                multiple>
                            <p class="image-error text text-danger"></p>
                            <div class="form-group" id="show-file" style="width:120px;height:120px; padding-top: 8px">
                                {{-- <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/_/t_m_18.png"  alt=""> --}}
                            </div>
                        </div>
                        <div class="product-option">
                            <label for="">Chọn Thông số kỹ thuật</label>
                            <div class="product-option__inner"></div>
                        </div>
                    </div>
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
        CKEDITOR.replace('desc', {
            filebrowserUploadUrl: "{{ route('admin.uploadFile', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('desc_short', {
            filebrowserUploadUrl: "{{ route('admin.uploadFile', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script>
        $(document).ready(function() {
            // SELECT 2
            $('.js-example-basic-multiple-1').select2();
            $('.js-example-basic-multiple-2').select2();
            $('#select-option-9').select2();

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
                                                    <input type="text" placeholder="Mã sản phẩm" name="product_type_sku" class="product_type_sku" value="" />
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
                                f.filter.forEach(function(fp,i){
                                    filter += `<div class="form-group">
                                                 <label>${fp.filter_name}</label>
                                                <select data-id="${fp.filter_id}" name="${fp.slug}" id="select-option-${fp.filter_id}" class="select-option select-option-${fp.filter_id}" multiple>
                                                <option value="">Chọn ${fp.filter_name}</option>
                                            `

                                    f.child_filter.forEach(function(fc,l){
                                        filter += `<option value="${fc.filter_id}">${fc.filter_name}</option>`
                                    })
                                    filter +=`</select>
                                         </div>`
                                })
                            })

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
                let status_product = $('.status:checked').val();
                var formData = new FormData();

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
                let option = [];
                $('body .select-option').each(function(i,data){
                    option.push(data.value);
                })
                console.log(product_detail);
                formData.append('product_detail', JSON.stringify(product_detail))
                formData.append('desc', desc_product)
                formData.append('desc_short', desc_short_product)
                formData.append('name', name_product)
                formData.append('slug', slug_product)
                formData.append('status', status_product)
                formData.append('idBrand', idBrand)
                formData.append('product_sku', product_sku)
                formData.append('parent_category[]', id_category)
                formData.append('option',option)
                formData.append('_token', "{{ csrf_token() }}")
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.product.postAddProduct') }}",
                    data: formData,
                    success: (res) => {

                        validator(res.status, res.message)
                        if (res.status == 404) {
                            console.log(res)

                        }else {
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
        });
    </script>
@endpush
