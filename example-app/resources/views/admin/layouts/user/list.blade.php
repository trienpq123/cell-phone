@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">

        <a href="{{route('admin.User.User.create')}}" class="btn btn-add"  data-name="add-product">Thêm mới</a>
        <button class="btn btn-delete delete-checkbox" id="delete-checkbox" disabled data-name="popup-delete-checkbox">Xoá</button>

        <div class="table">

            <table id="table">

                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Avatar</th>
                        <th>Họ Và Tên</th>
                        <th>Chức Vụ</th>
                        <th>Quyền</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($User as $item)
                        <tr>
                            <td>
                                <input type="checkbox" id="item-check" name="item-check[]" value="{{$item->id}}">
                            </td>
                            <td>{{$item->name}}</td>

                            <td class="badge badge-soft-info">{{$item->name}}</td>
                            <td class="badge badge-soft-info">
                                @foreach ($item->roles()->get() as $role)
                                    {{$role->name}},
                                @endforeach
                            </td>
                            <td class="badge badge-soft-info">
                                @foreach ($item->permissions()->get() as $permission)
                                    {{$permission->name}},
                                @endforeach
                            </td>
                            <td><a href="{{route('admin.User.User.edit',['id' => $item->id])}}"  class="btn-edit" data-name="edit-product" data-id="{{$item->id}}">Chỉnh sửa</a></td>
                            {{-- class="btn-edit"  --}}
                            <td><a href="{{route('admin.User.User.delete',['id' => $item->id])}}" class="btn-delete">Xoá</a></td>
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
