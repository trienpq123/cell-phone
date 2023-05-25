@extends('admin.index')
@section('articles')
<div class="list-table">
    <div class="wrap-container">
                <div class="form-feild">
                    <div class="form-title">
                        <h2>Chỉnh sửa thuộc tính</h2>
                    </div>
                    <form action="{{route('admin.attr.putEditAttr')}}/?id={{$_GET['id']}}" method="POST" id="form-add" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Tên thuộc tính</label>
                            <input type="text" placeholder="Nhập tên thuộc tính" class="form-control name" name="name" value="{{old('name') ? old('name') : $listAttr->name_attr}}">
                           @if ($errors->has('name'))
                            <p class="name-error text text-danger" style="display: block">{{$errors->first('name')}}</p>
                           @endif
                        </div>
                        <div class="form-group">
                            <input type="radio"{{$listAttr->status == 0 ? 'checked' : '' }} name="status" id="status" class="status" value="0" style="width:auto;"><label for="">Ẩn</label>
                            <input type="radio"{{$listAttr->status == 1 ? 'checked' : '' }} name="status"  id="status" class="status" value="1"   style="width:auto;"> <label for="">Hiện</label>
                        </div>
                        <div class="form-group">
                            <label for="">Thuộc danh mục</label>
                            <select class="js-example-basic-single parent_category form-control " name="parent_category">
                                <option value="">Chưa có</option>
                                @if (count($listCategory) > 0)
                                    @foreach ($listCategory as $item)
                                        <option {{$listAttr->id_category == $item->id_category ? 'selected' : '' }} value={{$item->id_category}}>{{$item->name_category}}</option>
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
    </div>
</div>
@endsection


