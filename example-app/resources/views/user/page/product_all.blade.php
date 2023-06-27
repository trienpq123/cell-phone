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
                                    <li>{{$filterchild->filter_name}}</li>
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

                    <button><span><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M416 288h-95.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H416c17.67 0 32-14.33 32-32S433.7 288 416 288zM544 32h-223.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H544c17.67 0 32-14.33 32-32S561.7 32 544 32zM352 416h-32c-17.67 0-32 14.33-32 32s14.33 32 32 32h32c17.67 0 31.1-14.33 31.1-32S369.7 416 352 416zM480 160h-159.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H480c17.67 0 32-14.33 32-32S497.7 160 480 160zM192.4 330.7L160 366.1V64.03C160 46.33 145.7 32 128 32S96 46.33 96 64.03v302L63.6 330.7c-6.312-6.883-14.94-10.38-23.61-10.38c-7.719 0-15.47 2.781-21.61 8.414c-13.03 11.95-13.9 32.22-1.969 45.27l87.1 96.09c12.12 13.26 35.06 13.26 47.19 0l87.1-96.09c11.94-13.05 11.06-33.31-1.969-45.27C224.6 316.8 204.4 317.7 192.4 330.7z"></path></svg></span>Giá cao - thấp</button>
                </div>
                <div class="filter-item">

                    <button class="active"><span><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M320 224H416c17.67 0 32-14.33 32-32s-14.33-32-32-32h-95.1c-17.67 0-32 14.33-32 32S302.3 224 320 224zM320 352H480c17.67 0 32-14.33 32-32s-14.33-32-32-32h-159.1c-17.67 0-32 14.33-32 32S302.3 352 320 352zM320 96h32c17.67 0 31.1-14.33 31.1-32s-14.33-32-31.1-32h-32c-17.67 0-32 14.33-32 32S302.3 96 320 96zM544 416h-223.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H544c17.67 0 32-14.33 32-32S561.7 416 544 416zM192.4 330.7L160 366.1V64.03C160 46.33 145.7 32 128 32S96 46.33 96 64.03v302L63.6 330.7c-6.312-6.883-14.94-10.38-23.61-10.38c-7.719 0-15.47 2.781-21.61 8.414c-13.03 11.95-13.9 32.22-1.969 45.27l87.1 96.09c12.12 13.26 35.06 13.26 47.19 0l87.1-96.09c11.94-13.05 11.06-33.31-1.969-45.27C224.6 316.8 204.4 317.7 192.4 330.7z"></path></svg></span>Giá thấp - cao</button>
                </div>
                <div class="filter-item">

                    <button><span><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M112 224c61.9 0 112-50.1 112-112S173.9 0 112 0 0 50.1 0 112s50.1 112 112 112zm0-160c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm224 224c-61.9 0-112 50.1-112 112s50.1 112 112 112 112-50.1 112-112-50.1-112-112-112zm0 160c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zM392.3.2l31.6-.1c19.4-.1 30.9 21.8 19.7 37.8L77.4 501.6a23.95 23.95 0 0 1-19.6 10.2l-33.4.1c-19.5 0-30.9-21.9-19.7-37.8l368-463.7C377.2 4 384.5.2 392.3.2z"></path></svg></span>Khuyến mãi hot</button>
                </div>

            </div>

            <div class="list-filting">
                <h3>Đang Lọc</h3>
                <ul class="list-filter flex flex-wrap mg-section">
                    <li>
                        <button><span class="fas fa-close"></span> <span class="innter_filter">X1</span></button>
                    </li>
                </ul>
            </div>
        </div>
        <section class="ladi-section mg-section">

            <div class="ladi-list">

                @foreach ($product as $p)
                    <div class="ladi-item">
                        <div class="ladi-images">
                            <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/g/t/gtt_7766_3__1.jpg" alt="">
                        </div>
                        <div class="ladi-name">

                               {{ $p->products['name_product']}}

                        </div>
                        <div class="ladi-body ">

                            <div class="ladi-price flex align-items-center">

                            @if ($p->productDetail['price_sale'] && $p->productDetail['price_sale'] > 0)
                                    <span class="old">

                                        {{number_format($p->productDetail['price_sale'])}}&nbsp;₫
                                    </span>
                                    <div class="new">
                                       {{number_format($p->productDetail['price'])}} &nbsp;₫
                                    </div>
                            @else
                                <span class="old">

                                    {{number_format($p->productDetail['price'])}} &nbsp;₫
                                </span>
                            @endif


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
                @endforeach

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

