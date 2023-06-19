@extends('index')
@section('main')
<main class="mg-section">
    <div class="wrap-container">
        <div class="ladi-title">Giỏ hàng</div>
        <div class="block-cart">
            <div class="block-cart-left">
                <table class="table">
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>
                            <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/o/p/oppo-reno8t-vang1-thumb-600x600.jpg" alt="">
                        </td>
                        <td>Sản phẩm 1</td>
                        <td>
                            <input type="number" min="1" class="cart-quanlity" value="0">
                        </td>
                        <td>
                            495.000 đ
                            <input type="text" value="495000" hidden class="cart-price">
                        </td>
                        <td>
                            <span  class="total">495.000 </span>đ
                            <input type="text" value="495000" hidden>
                        </td>
                        <td>
                            <span class="del-cart"><i class="fas fa-close"></i></span>
                        </td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>
                            <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/o/p/oppo-reno8t-vang1-thumb-600x600.jpg" alt="">
                        </td>
                        <td>Sản phẩm 1</td>
                        <td>
                            <input type="number" min="1" class="cart-quanlity" value="0">
                        </td>
                        <td>
                            495.000 đ
                            <input type="text" value="495000" hidden class="cart-price">
                        </td>
                        <td>
                            <span  class="total">495000</span>đ
                            <input type="text" value="495000" hidden>

                        </td>
                        <td>
                            <span class="del-cart"><i class="fas fa-close"></i></span>
                        </td>
                    </tr>
                </table>
                <div class="flex justify-content-space-between">
                    <div class="btn-group-order">
                        <div class="btn btn-continue-buy">
                            <a href="#">Tiếp tục mua sắm</a>
                        </div>
                        <div class="btn btn-continue-pay">
                            <a href="#">Tiếp tục Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-cart-right">
                <div class="block-order-title mg-section">
                    Thông tin chung
                </div>
                <hr  class="mg-section">
                <div class="block-order-infor">

                    <div class="block-order__item">
                        <p>Tổng giỏ hàng</p>
                        <p><b class="total-cart">485.000 đ</b></p>

                    </div>
                    <div class="block-order__item">
                        <p>Giảm giá</p>
                        <p> <b>0 đ</b> </p>
                    </div>
                    <div class="block-order__item">
                        <p>Phí vận chuyển</p>
                        <p> <b>30,000 đ</b></p>
                    </div>
                </div>
                <hr class="mg-section">
                <div class="block-order__total">
                    <p>Tổng cộng</p>
                    <p class="price-total"><b>515.000 đ</b></p>
                </div>
                <div class="block-code-discount">
                    <div class="block-discount-title mg-section">Sử dụng mã khuyến mãi</div>
                    <div class="block-discount-form">
                        <input type="text" placeholder="Nhập mã khuyến mãi nếu có">
                        <button type="submit" class="btn btn-submit">Sử dụng</button>
                    </div>
                 </div>
            </div>

        </div>
    </div>
</main>

@endsection
