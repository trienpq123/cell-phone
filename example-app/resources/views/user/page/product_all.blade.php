@extends('index')
@section('main')
<main>
    <section class="ladi-section">
        <div class="break-cum">
            <a href="#">Trang chủ</a>
            <a href="#">{{$getCategory->name_category}}</a>
            <a href="#">Apple</a>

        </div>
    </section>
    <div class="wrap-container">


        <section class="filter-product mg-section">
            <div class="filter-title ladi-title">
                <h3>Chọn lọc theo tiêu chí</h3>
            </div>
            <div class="list-filter flex flex-wrap mg-section">

                @foreach ($filter as $cate)
                    <div class="filter-item">

                        <button >{{$cate->filter[0]->filter_name}} </button>
                        <div class="list-filter-child">
                            <ul>
                                @foreach ($cate->filter[0]->childrentFilter as $filterchild)
                                    <li><button>{{$filterchild->filter_name}}</button></li>
                                @endforeach
                            </ul>
                            <div class="btn-filter-group">
                                <button class="btn btn-filter-close">Đóng</button>
                                <button class="btn btn-filter-result">Xem kết quả</button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </section>

        <div class="option-filter">
            <div class="filter-title ladi-title">
                <h3>Sắp xếp theo</h3>
            </div>
            <div class="list-filter flex flex-wrap mg-section">
                <div class="filter-item">

                    <button><span><i class="fas fa-filter"></i></span> Bộ lọc</button>
                </div>
                <div class="filter-item">

                    <button class="active"><span><i class="fas fa-filter"></i></span> Bộ lọc</button>
                </div>
                <div class="filter-item">

                    <button><span><i class="fas fa-filter"></i></span> Bộ lọc</button>
                </div>

            </div>

            <div class="list-filting">
                <h3>Đang Lọc</h3>
                <ul class=" flex flex-wrap mg-section">
                    <li>
                        <button><span class="fas fa-close"></span> Bộ lọc 1</button>

                    </li>
                    <li>
                        <button><span class="fas fa-close"></span> Bộ lọc 2</button>

                    </li>
                </ul>
            </div>
        </div>
        <section class="ladi-section mg-section">

            <div class="ladi-list">
                <div class="ladi-item">
                    <div class="ladi-images">
                        <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/g/t/gtt_7766_3__1.jpg" alt="">
                    </div>
                    <div class="ladi-name">
                        Xiaomi Redmi Note 12
                    </div>
                    <div class="ladi-body ">

                        <div class="ladi-price flex align-items-center">
                            <span class="old">
                                4.490.000 &nbsp;₫
                            </span>
                            <div class="new">
                                4.490.000 &nbsp;₫
                            </div>
                        </div>

                        <div class="ladi-text-sale mg-section">
                            Trợ giá lên tới 500.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường
                        </div>
                        <div class="ladi-rate">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>

                        <div class="ladi-reaction">
                            <div class="favorite">
                                <span class="text">Yêu thích</span> <span class="reaction-iconls love"><i class="far fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="ladi-precent">
                        Giảm 24%
                    </div>
                </div>
                <div class="ladi-item">
                    <div class="ladi-images">
                        <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/g/t/gtt_7766_3__1.jpg" alt="">
                    </div>
                    <div class="ladi-name">
                        Xiaomi Redmi Note 12
                    </div>
                    <div class="ladi-body">

                        <div class="ladi-price flex">
                            <span class="old">
                                4.490.000 &nbsp;₫
                            </span>
                            <div class="new">
                                4.490.000 &nbsp;₫
                            </div>
                        </div>

                        <div class="ladi-text-sale">
                            Trợ giá lên tới 500.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường
                        </div>
                        <div class="ladi-rate">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>

                        <div class="ladi-reaction">
                            <div class="favorite">
                                <span class="text">Yêu thích</span> <span class="reaction-iconls love"><i class="far fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ladi-item">
                    <div class="ladi-images">
                        <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/g/t/gtt_7766_3__1.jpg" alt="">
                    </div>
                    <div class="ladi-name">
                        Xiaomi Redmi Note 12
                    </div>
                    <div class="ladi-body">

                        <div class="ladi-price flex">
                            <span class="old">
                                4.490.000 &nbsp;₫
                            </span>
                            <div class="new">
                                4.490.000 &nbsp;₫
                            </div>
                        </div>

                        <div class="ladi-text-sale">
                            Trợ giá lên tới 500.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường
                        </div>
                        <div class="ladi-rate">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>

                        <div class="ladi-reaction">
                            <div class="favorite">
                                <span class="text">Yêu thích</span> <span class="reaction-iconls love"><i class="far fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ladi-item">
                    <div class="ladi-images">
                        <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/g/t/gtt_7766_3__1.jpg" alt="">
                    </div>
                    <div class="ladi-name">
                        Xiaomi Redmi Note 12
                    </div>
                    <div class="ladi-body">

                        <div class="ladi-price flex">
                            <span class="old">
                                4.490.000 &nbsp;₫
                            </span>
                            <div class="new">
                                4.490.000 &nbsp;₫
                            </div>
                        </div>

                        <div class="ladi-text-sale">
                            Trợ giá lên tới 500.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường
                        </div>
                        <div class="ladi-rate">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>

                        <div class="ladi-reaction">
                            <div class="favorite">
                                <span class="text">Yêu thích</span> <span class="reaction-iconls love"><i class="far fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ladi-item">
                    <div class="ladi-images">
                        <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/g/t/gtt_7766_3__1.jpg" alt="">
                    </div>
                    <div class="ladi-name">
                        Xiaomi Redmi Note 12
                    </div>
                    <div class="ladi-body">

                        <div class="ladi-price flex">
                            <span class="old">
                                4.490.000 &nbsp;₫
                            </span>
                            <div class="new">
                                4.490.000 &nbsp;₫
                            </div>
                        </div>

                        <div class="ladi-text-sale">
                            Trợ giá lên tới 500.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường
                        </div>
                        <div class="ladi-rate">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>

                        <div class="ladi-reaction">
                            <div class="favorite">
                                <span class="text">Yêu thích</span> <span class="reaction-iconls love"><i class="far fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ladi-item">
                    <div class="ladi-images">
                        <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/g/t/gtt_7766_3__1.jpg" alt="">
                    </div>
                    <div class="ladi-name">
                        Xiaomi Redmi Note 12
                    </div>
                    <div class="ladi-body">

                        <div class="ladi-price flex">
                            <span class="old">
                                4.490.000 &nbsp;₫
                            </span>
                            <div class="new">
                                4.490.000 &nbsp;₫
                            </div>
                        </div>

                        <div class="ladi-text-sale">
                            Trợ giá lên tới 500.000đ khi tham gia thu cũ đổi mới - Giá thu tốt nhất thị trường
                        </div>
                        <div class="ladi-rate">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>

                        <div class="ladi-reaction">
                            <div class="favorite">
                                <span class="text">Yêu thích</span> <span class="reaction-iconls love"><i class="far fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ladi-btn-loader">
                <a href="" class="action-loading">Xem thêm XXX sản phẩm</a>
            </div>
        </section>

        <section class="ladi-section mg-section">
            <div class="ladi-category grid grid-tempalte-colums-large-7-3  gap-10">
                <div class="ladi-article">

                </div>
                <div class="ladi-aside">
                    <div class="ladi-post">
                        <div class="ladi-title">
                            <span><i class="fa-regular fa-newspaper"></i></span>
                            Tin tức về sản phẩm
                        </div>
                        <div class="list-post">
                            <div class="post-item">
                                <a href="#">
                                    <div class="post-image">
                                        <img src="https://cellphones.com.vn/sforum/wp-content/uploads/2023/04/bang-b2-lai-xe-gi.jpg" alt="">
                                    </div>
                                    <div class="post-body">
                                        <div class="post-content">
                                            Bằng B2 lái xe gì? Hồ sơ thi bằng lái xe B2 mới nhất
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="ladi-btn-loader mg-section">
                            <a href="" class="action-loading">Xem thêm XXX sản phẩm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</main>

@endsection
