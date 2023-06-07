@extends('admin.index')
@section('articles')
    <div class="list-table">
        <div class="wrap-container">
            <div class="grid grid-tempalte-colum-7-3 gap-16">
                <div class="box-left">
                    <div class="box-item bg-white">
                        <h2>#W1007MVP <span>08/12/2022 18:14</span></h2>
                    </div>
                    <div class="box-item bg-white">
                        <div class="detail-order">
                            Chi tiết đơn hàng
                            <span class="status-order badge badge-warning">Chưa chuyển</span>
                        </div>
                        <div class="table">
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <a href="#">
                                            <img src="https://bizweb.dktcdn.net/thumb/thumb/100/412/591/products/e969e2d9-efea-4565-be5c-df755b898549-jpeg.jpg?v=1660060475577" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <span class="product_name">Ghế chân xoay làm việc GVP01</span> <br>
                                        <span class="product-sku">SKU:GVP02</span> <br>
                                        <span class="material">Đen - Nỉ</span>
                                    </td>
                                    <td>890,000₫</td> x
                                    <td>1</td>
                                    <td>890,000₫</td>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="box-right">
                    <div class="box-item bg-white">
                        <div class="box-title">
                            Ghi chú
                        </div>
                        <div class="box-content">
                            Giao hàng sau 17h
                        </div>
                    </div>
                    <div class="box-item bg-white">
                        <div class="box-title">
                            Khách hàng
                        </div>
                        <div class="box-content">
                            <div class="box-content__item">
                                <div class="box-content__item-title">
                                    Liên hệ
                                </div>
                                <div class="box-content__text">ptk1221@gmail.com</div>
                            </div>
                            <div class="box-content__item">
                                <div class="box-content__item-title">
                                    Địa chỉ giao hàng
                                </div>
                                <div class="box-content__text">
                                    <p>Phạm Trung Kiên</p>
                                    <p>Số nhà 63 ngõ 18 Định Công Thượng- Định Công- Hoàng Mai- Hà Nội</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

        </div>
    </div>
@endsection

@push('script-action')

    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
