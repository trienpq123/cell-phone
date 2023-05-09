@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">
     
        <button class="btn btn-add"  data-name="add-product">Thêm mới</button>
   
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
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($listFilter as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td></td>
                            <td class="badge badge-soft-info">{{$item->filter_name}}</td>
                            <td>{{$item->slug}}</td>
                            <td><a class="btn-edit"  data-name="edit-product" data-id="{{$item->filter_id}}">Chỉnh sửa</a></td>
                            <td><a  class="btn-delete">Xoá</a></td>
                        </tr>
                    @endforeach
                </tbody>
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
        $('#form-add').submit(function(e){
            // e.preventDefault();
            e.preventDefault();
                var token =  $('input[name="_token"]').attr('value'); 
                console.log(token);
                let name = $(".name").val();
                $.ajax({
                    type:"POST",
                    dataType:"JSON",
                    url: "{{route('admin.filter.postAddFilter')}}",
                    data: {_token:"{{csrf_token()}}",name:name},
                    success: (res) => {
                        console.log(res.errors.name[0]);
                    }
                })
          
        })
        $('.btn-edit').click(function() {
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
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                $.ajax({
                    type:"POST",
                    dataType:"JSON",
                    url: "{{route('admin.filter.putEditFilter')}}",
                    data: {id:id,_token:"{{csrf_token()}}",name:name,slug:slug,_parent:_parent},
                    success: (res) => {
                        window.location.reload();
                    }
                })
            })

        })

    })
    </script>
@endpush