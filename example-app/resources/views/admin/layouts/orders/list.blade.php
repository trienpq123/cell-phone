@extends('admin.index')
@section('articles')
    <div class="list-table">
        <div class="wrap-container">
            {{-- <a href="{{route('admin.product.addProduct')}}" class="btn btn-add">Thêm mới</a> --}}
            <button class="btn btn-delete delete-checkbox" id="delete-checkbox" disabled
                data-name="popup-delete-checkbox">Xoá</button>
            <div class="table">
                <table id="table">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại liên hệ</th>
                            <th>Email</th>
                            <th>Tình trạng</th>
                            <th>Tổng tiền</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <td><a href="#">DH0001</a></td>
                        <td>Nguyễn Minh Triển</td>
                        <td>Thành phố hồ chí minh</td>
                        <td>0123456789</td>
                        <td>abc@gmail.com</td>
                        <td>
                            <span class="badge badge-warning">Đơn hàng đang xử lý </span> <br>
                            <span class="badge badge-danger">Đơn hàng đã bị huỷ</span><br>
                            <span class="badge badge-success">Đơn hàng giao thành công</span>
                        </td>
                        <td>
                           329k
                        </td>
                        <td>
                           <a href="{{route('admin.order.orderDetail')}}">Xem chi tiết đơn hàng</a>
                        </td>
                    </tbody>
                </table>
            </div>
            <div class="popup-modal" id="popup-delete">
                <div class="box-alert">
                    <div class="alert-item">
                        <span class="recyble-delete"><i class="fas fa-trash-alt  "></i></span>
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
                        <p>Bạn có chắc chắn là muốn huỷ?</p>
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
            <a href="#" class="btn btn-submit">Xác nhận đơn</a>
        </div>
    </div>
@endsection

@push('script-action')

    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
