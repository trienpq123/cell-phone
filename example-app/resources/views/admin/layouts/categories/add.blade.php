@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">
        <div class="container">
            <form id="form-add" enctype="multipart/form-data">
                @csrf
                <div class="p-4 grid grid-tempalte-colum-7-3 gap-16">
                    <div class="form-left">
                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input type="text" placeholder="Nhập Danh mục" class="form-control name"
                            id="slug" onchange="ChangeToSlug()" name="name">
                            <p class="name-error alert-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Slug" class="form-control slug"
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
                            <label for="">Mô tả</label>
                            <textarea name="desc" class="desc" id="desc" cols="30" rows="10"></textarea>
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
                            <label for="">Chọn bộ lọc</label>
                            <select class="js-filter edit_filter form-control " name="id_filter" multiple="multiple">
                                <option value="">Chưa chọn bộ lọc</option>
                                @if (count($listFilter) > 0)
                                    @foreach ($listFilter as $item)
                                        <option value={{$item->filter_id}}>{{$item->filter_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="" class="add-file" id="upload-file" multiple>
                            <p class="image-error text text-danger"></p>
                            <div class="form-group" id="show-file" style="padding-top: 8px">
                                <div class="image-item">
                                    <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/_/t_m_18.png"  alt="">
                                    <span><i class="fas fa-times"></i></span>
                                </div>
                            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
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
            $('.js-filter').select2();
        });
    </script>

<script>
    $(document).ready(function(){
        $('#upload-file').change(function(event){
           console.log(123)
        // let input = event.target;
        // console.log(input)
        // if(input.files && input.file[0]){
        //     let reader = new FileReader();
        //     reader.onload = function(e){
        //         let images =  $("show-file .1").attr("src", e.target.result);
        //         $('#show-file').empty().append(image);
        //     }

        //     reader.readAsDataURL(input.files[0])
        // }
        })
        $(function () {
            $("input:file").change(function () {
                if (this.files && this.files[0]) {
                    for (var i = 0; i < this.files.length; i++) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            });
        });
        function imageIsLoaded(e) {
            let img = ` `

            // $('#show-file').append('<img src=' + e.target.result + '>');
            $('#show-file').append(`
                                <div class="image-item">
                                    <img src="${e.target.result}"  alt="">
                                    <span><i class="fas fa-times"></i></span>
                                </div>
                                `);
        };

        $('#show-file .image-item span').click(function(){

        })

        $('body','#show-file .image-item span','click',function(){

        })

        $('body').on('click','#show-file .image-item span',function(){
            $(this).parents('.image-item').remove();
        })

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
@endpush
