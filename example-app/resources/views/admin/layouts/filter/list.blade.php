@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">
     
        <button class="btn btn-add"  data-name="add-product">Thêm mới</button>
        <button class="btn btn-delete delete-checkbox" data-name="popup-delete-checkbox">Xoá</button>
   
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
                                Xoá
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
                                Thoát
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
                            return `<input type="checkbox" id="item-check" name="item-check[]" value="${data.filter_id}">`
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
                            return `<a class="btn-edit"  data-name="edit-product" data-id="${data.filter_id}">Chỉnh sửa</a>`
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
                       
                        $('#table').DataTable().destroy()
                        getDataTable();
                        $('.alert').toggleClass('active')
                    }
                })
            })
        })

        $('body').on('click','table .btn-delete',function(){
            let id = $(this).attr('data-id');
            $('#popup-delete').toggleClass('active');
            // $('.popup-modal').click(function(){
            //     $('.popup-modal').removeClass('active');
            // });
            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });
            $('.action-agree').click(function(){
                $('.popup-modal').removeClass('active');
                $.ajax({
                    url: '{{route('admin.filter.deleteFilter',["id" =>'+id+'])}}',
                    type:"DELETE",
                    data: {id:id,_token:"{{csrf_token()}}"},
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
            let array = [];
            if($(this).is(':checked')){
                $('tr input[type=checkbox]').prop('checked', 'checked');
                let getValueCheckbox = document.querySelectorAll('#item-check');
                for(let i = 0; i< getValueCheckbox.length; i++){
                    array.push(getValueCheckbox[i].value);
                }
            }else{     
                $('input:checkbox').removeAttr('checked');
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
            $('.action-agree').click(function(){
                console.log($('#item-check').is(':checked'));
                // $('.popup-modal').removeClass('active');
            });
            
        })
        
       
    })
    </script>
@endpush