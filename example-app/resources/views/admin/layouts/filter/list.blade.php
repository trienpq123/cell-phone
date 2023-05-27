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
                        <th>Iconls</th>
                        <th>Tên Bộ lọc</th>
                        <th>slug</th>
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
                    @if (count($listFilter) > 0)
                    <tr>
                        <td><input type="checkbox" name="" id="" class="check-all"></td>
                    </tr>

                    @endif
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
                        <h2>Thêm bộ lọc</h2>
                    </div>

                      @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif


                    <form action="{{route('admin.filter.postAddFilter')}}" method="post" id="form-add">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên Bộ lọc</label>
                            <input type="text" placeholder="Nhập tên sản phẩm" class="form-control name" id="slug" onchange="ChangeToSlug()" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên sản phẩm" class="form-control slug"  id="convert_slug" name="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Chọn bộ lọc cha</label>
                            <select name="_parent" id="" class="form-control _parent">
                                <option  value="">Chưa chọn Bộ lọc cha</option>
                                @php
                                    $step = 3;
                                @endphp
                                @foreach ($lfilter as $item)
                                    <option value="{{$item->filter_id}}">{{$item->filter_name}}</option>
                                    @foreach ($item->childrentFilter as $lfc)
                                           {{-- <option value="{{$lfc->filter_id}}">{{$lfc->filter_name}}</option> --}}
                                            @include('helper.child_filter',['child_filter' => $lfc,'step' => $step]);
                                    @endforeach
                                @endforeach
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
                    <form class="form-edit">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên Bộ lọc</label>
                            <input type="text" placeholder="Nhập tên sản phẩm" class="form-control  edit_names" id="slug" onchange="ChangeToSlug()" name="name">
                            <span class="name-error text-danger">Tên bộ lọc không được bỏ trống</span>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" placeholder="Nhập tên sản phẩm" class="form-control edit_slug" id="convert_slug" name="slug">
                        </div>
                        <div class="form-group">
                            <label for="">Chọn bộ lọc cha</label>
                            <select name="_parent " id="" class="form-control edit_parent">
                                <option  value="">Chưa chọn Bộ lọc cha</option>
                                @php
                                    $step = 3;
                                @endphp
                                @foreach ($lfilter as $item)
                                    <option value="{{$item->filter_id}}">{{$item->filter_name}}</option>
                                    @foreach ($item->childrentFilter as $lfc)
                                           {{-- <option value="{{$lfc->filter_id}}">{{$lfc->filter_name}}</option> --}}
                                            @include('helper.child_filter',['child_filter' => $lfc,'step' => $step]);
                                    @endforeach
                                @endforeach
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
                    url: "{{route('admin.filter.apiListFilter')}}",
                    dataSrc: 'data'
                },
                "columns": [
                    {
                        data: null,
                        render: function(data,type,row,meta){
                            return `<input type="checkbox" class='item-check' id="item-check" name="item-check[]" value="${data.filter_id}">`
                        }
                    },
                    {
                        data: null,
                        render: function(data,type,row,meta){
                            return ""
                        }
                    },
                    { data: "filter_name" },
                    { data: "slug" },
                    {
                        data:null,
                        render: function(data,type,row,meta){
                            return `
                                    <a class="btn btn-edit" data-name="edit-product" data-id="${data.filter_id}" >Edit
                                        <svg class="svg" viewBox="0 0 512 512">
                                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg>
                                    </a>
                                    `
                        }
                    },
                    {
                        data:null,
                        render: function(data,type,row,meta){
                            return `<td><a  class="btn-delete"  data-id="${data.filter_id}">Xoá</a></td>`
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
                },
            });
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
                    url: "{{route('admin.filter.editFilter')}}",
                    dataType:"json",
                    method: "GET",
                    data: {id:id},
                    success: (res) => {

                        $(".edit_names").val(res.filter.filter_name);
                        $(".edit_slug").val(res.filter.slug);
                        $(".edit_parent option").each(function(index,pa){
                            if(pa.value == res.filter.filter_id) $(this).attr('selected','selected')
                        })
                    }
                }
            )


            $('.form-edit').submit(function(e){
                e.preventDefault();
                var token =  $('input[name="_token"]').attr('value');
                console.log(token);
                let name = $(".edit_names").val();
                let slug = $(".edit_slug").val();
                let _parent = $(".edit_parent option:selected").val();
                $.ajax({
                    type:"POST",
                    dataType:"JSON",
                    url: "{{route('admin.filter.putEditFilter')}}",
                    data: {id:id,_token:"{{csrf_token()}}",name:name,slug:slug,_parent:_parent},
                    success: (res) => {
                        // window.location.reload();
                        // $('.table').html(res);
                       console.log(res)

                        if(res.status == 200 ){
                            $('#table').DataTable().destroy()
                            getDataTable();
                            $('.alert').toggleClass('active')
                            validator(res.status,res.message)
                        }
                        if(res.status == 404){
                            validator(res.status,res.message)
                        }
                    }
                })
            })
        })


        $('body').on('click','table .btn-delete',function(){
            let id = $(this).attr('data-id');
            $('#popup-delete').toggleClass('active');
            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });
            $('.action-agree').click(function(){
                $('.popup-modal').removeClass('active');
                $.ajax({
                    url: '{{route('admin.filter.deleteFilter',["id" =>'+id+'])}}',
                    type:"DELETE",
                    data: {data:[id],_token:"{{csrf_token()}}"},
                    success: (res) => {
                        if(res.status == 200){
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
                    url: "{{route('admin.filter.deleteFilter')}}",
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
@endpush
