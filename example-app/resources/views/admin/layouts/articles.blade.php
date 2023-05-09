<div class="article">
    @include('admin.component.header_bar')
    <div class="wrap-container">
        {{-- <div class="box-analytic grid grid-tempalte-colum-2 align-items-center mg-section">
            <div class="analytic-item user">
                <div class="analytic-name mg-section">
                    User
                </div>

                <div class="analytic-number mg-section">
                    20.05K
                </div>
                
                <div class="analytic-compare">
                    <p><span class="scale">16.24 %</span> so với tháng trước</p>
                </div>

                <div class="box-iconls">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="analytic-item user">
                <div class="analytic-name mg-section">
                    User
                </div>

                <div class="analytic-number mg-section">
                    20.05K
                </div>
                
                <div class="analytic-compare">
                    <p><span class="scale">16.24 %</span> so với tháng trước</p>
                </div>

                <div class="box-iconls">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="analytic-item user">
                <div class="analytic-name mg-section">
                    User
                </div>

                <div class="analytic-number mg-section">
                    20.05K
                </div>
                
                <div class="analytic-compare">
                    <p><span class="scale">16.24 %</span> so với tháng trước</p>
                </div>

                <div class="box-iconls">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="analytic-item user">
                <div class="analytic-name mg-section">
                    User
                </div>

                <div class="analytic-number mg-section">
                    20.05K
                </div>
                
                <div class="analytic-compare">
                    <p><span class="scale">16.24 %</span> so với tháng trước</p>
                </div>

                <div class="box-iconls">
                    <i class="fas fa-users"></i>
                </div>
            </div>
          
        </div>

        <div class="form-feild">
            <div class="form-title">
                <h2>Sản phẩm</h2>
            </div>
            <form action="">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-submit">
                        OK
                    </button>
                </div>
            </form>
        </div>

        <div class="list-table">
            <div class="wrap-container">
             
                <button class="btn btn-add"  data-name="add-product">Thêm mới</button>
           
                <div class="table">
                    
                    <table>
                        
                        <tr>
                            <th>STT</th>
                            <th>Hình Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Mặt hàng</th>
                            <th>Loại</th>
                            <th>Nhà cung cấp</th>
                            <th></th>
                            <th></th>
                        </tr>
                       <tr>
                        <td>#1</td>
                        <td>#1</td>
                        <td>#1</td>
                        <td>#1</td>
                        <td>#1</td>
                        <td>#1</td>
                        <td><a href="#" class="btn-edit">Chỉnh sửa</a></td>
                        <td><a  class="btn-delete">Xoá</a></td>
                       </tr>
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
                                <h2>Sản phẩm</h2>
                            </div>
                            <form action="">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" placeholder="Nhập tên sản phẩm" class="form-control">
                                </div>
                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-submit">
                                        OK
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

        <div class="chart-editor"><canvas id="chart-view"></canvas></div>
        <div class="flex align-items-center mg-section">
            <div class="box-statistical grid grid-tempalte-colum-3 gap-10 align-items-center mg-section">
                <div class="statistical-item box-top-product">
                    <div class="box-title"><span><i class="fa-brands fa-product-hunt"></i></span> Sản phẩm bán chạy</div>
                    <div class="box-list">
                        <ul>
                            <li><a href="#">
                                <div class="product-image">
                                    <img src="https://furnibuy.com/wp-content/uploads/2021/11/fb-ban-141-kich-thuoc-ban-tra-go-cong-nghiep-chan-cao.jpg" alt="">
                                </div>
                                <div class="product-body">
                                    <div class="product-name">
                                        Sản phẩm 1
                                    </div>
                                    <div class="product-viewr">
                                        7 lượt xem
                                    </div>
                                </div>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="statistical-item box-top-product">
                    <div class="box-title"><span><i class="fa-brands fa-product-hunt"></i></span>Đơn hàng</div>
                    <div class="box-list">
                        <ul>
                            <li><a href="#">
                                <div class="product-image">
                                    <img src="https://furnibuy.com/wp-content/uploads/2021/11/fb-ban-141-kich-thuoc-ban-tra-go-cong-nghiep-chan-cao.jpg" alt="">
                                </div>
                                <div class="product-body">
                                    <div class="product-name">
                                        Sản phẩm 1
                                    </div>
                                    <div class="product-viewr">
                                        7 lượt xem
                                    </div>
                                </div>
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="statistical-item box-top-product">
                    <div class="box-title"><span><i class="fa-brands fa-product-hunt"></i></span> Sản phẩm bán chạy</div>
                    <div class="box-list">
                        <ul>
                            <li><a href="#">
                                <div class="product-image">
                                    <img src="https://furnibuy.com/wp-content/uploads/2021/11/fb-ban-141-kich-thuoc-ban-tra-go-cong-nghiep-chan-cao.jpg" alt="">
                                </div>
                                <div class="product-body">
                                    <div class="product-name">
                                        Sản phẩm 1
                                    </div>
                                    <div class="product-viewr">
                                        7 lượt xem
                                    </div>
                                </div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        @yield('articles')
    </div>
</div>