@extends('admin.index');
@section('articles')

    <div class="box-analytic grid grid-tempalte-colum-2 align-items-center mg-section">
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

    <div class="chart-editor"><canvas id="chart-view"></canvas></div>
    <div class="grid align-items-center mg-section">
        <div class="wrap-container grid-tempalte-colum-425-2 box-statistical grid grid-tempalte-colum-3 gap-10 align-items-center mg-section">
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
    </div>

</div>
@endsection
@push('script-action')
    <script>
           let myChart =  document.getElementById('chart-view').getContext('2d');
   console.log(myChart)
   const data = {
    labels: ['Tháng 1', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
        label: 'Thống Kê Doanh Thu',
        data: [65, 59, 80, 81, 26, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
    }]
    };

   const config = {
    type: 'line',
    data: data,
    options: {
        transitions: {
        show: {
            animations: {
            x: {
                from: 0
            },
            y: {
                from: 0
            }
            }
        },
        hide: {
            animations: {
            x: {
                to: 0
            },
            y: {
                to: 0
            }
            }
        }
        }
    }
};
    let PopChart = new Chart(myChart,config)
    </script>
@endpush
