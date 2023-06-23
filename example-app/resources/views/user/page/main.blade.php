@extends('index')
@section('banner')
<div class="header-main">
    <div class="wrap-container">
        <div class="ladi-navigation grid gap-12px">
            <div class="ladi-menu ">
                <ul>
                    @foreach ($menu as $m)
                    <li>
                        <a href="#" class="flex align-items-center justify-content-space-betweent">
                            <div class="cate-infor flex align-items-center">
                                <span class="cate-iconls">
                                    @if ($m->category)

                                    <img src="{{$m->category->image_category}}" alt="">
                                    @endif
                                </span>
                                <span>{{$m->name_menu}}</span>
                            </div>
                            <span><i class="fas fa-angle-right"></i></span>
                        </a>

                            @if(count($m->chirendMenu) > 0)
                                <div class="sub-menu">
                                    <ul class="grid grid-tempalte-columns-large-5 ">
                                    @foreach ($m->chirendMenu as $sm)
                                        <li>
                                            <a href="#">{{$sm->name_menu}}</a>
                                            <div class="sub-three-menu">
                                                <ul>
                                                    @if (count($sm->filter->childrentFilter) > 0)
                                                        @foreach ($sm->filter->childrentFilter as $Filter)
                                                            <li><a href="#">{{$Filter->filter_name}}</a></li>
                                                        @endforeach
                                                    @endif

                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach


                                    </ul>
                                </div>
                            @endif



                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="ladi-banner">
                <div class="banner">

                    <div class="slider-image chuyen_banner_moitruong">
                        <div class="banner-item">
                            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/WH-1000XM5-mau-new-xanh-anh-trang-slide.jpg" alt="">
                        </div>
                        <div class="banner-item">
                            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/WH-1000XM5-mau-new-xanh-anh-trang-slide.jpg" alt="">
                        </div>
                        <div class="banner-item">
                            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/WH-1000XM5-mau-new-xanh-anh-trang-slide.jpg" alt="">
                        </div>
                    </div>
                    <div class="context-slider  chuyen_banner_text">
                        <div class="context-item active">
                            <span class="name">REDMI NOTE 12</span>
                            <span class="desc">Mở bán giá rẻ</span>
                        </div>
                        <div class="context-item">
                            <span class="name">REDMI NOTE 12</span>
                            <span class="desc">Mở bán giá rẻ</span>
                        </div>
                        <div class="context-item">
                            <span class="name">REDMI NOTE 12</span>
                            <span class="desc">Mở bán giá rẻ</span>
                        </div>
                        <div class="context-item">
                            <span class="name">REDMI NOTE 12</span>
                            <span class="desc">Mở bán giá rẻ</span>
                        </div>
                        <div class="context-item">
                            <span class="name">REDMI NOTE 12</span>
                            <span class="desc">Mở bán giá rẻ</span>
                        </div>
                        <div class="context-item">
                            <span class="name">REDMI NOTE 12</span>
                            <span class="desc">Mở bán giá rẻ</span>
                        </div>
                        <div class="context-item">
                            <span class="name">REDMI NOTE 12</span>
                            <span class="desc">Mở bán giá rẻ</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ladi-ads">
                <div class="ads-item">
                    <img src="https://cdn2.cellphones.com.vn/690x300,webp,q10/https://dashboard.cellphones.com.vn/storage/Screenshot_14.png" alt="">
                </div>
                <div class="ads-item">
                    <img src="https://cdn2.cellphones.com.vn/690x300,webp,q10/https://dashboard.cellphones.com.vn/storage/ipad-th4-009.jpg" alt="">
                </div>
                <div class="ads-item">
                    <img src="https://cdn2.cellphones.com.vn/690x300,webp,q10/https://dashboard.cellphones.com.vn/storage/ideapad%203.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('main')
<main class="mg-section">
    <div class="wrap-container">
        <div class="ladi-category">
        <div class="ladi-title">DANH MỤC SẢN PHẨM</div>
            <ul>
                <li>
                    <a href="#">
                        <div class="category-image">
                            <img src="https://cdn2.cellphones.com.vn/150x,webp,q70/media/catalog/product/i/c/icon-phone-tablet_1.png" alt="">
                        </div>
                        <div class="category-name">
                            Tablet
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="category-image">
                            <img src="https://cdn2.cellphones.com.vn/150x,webp,q70/media/catalog/product/i/c/icon-phone-tablet_1.png" alt="">
                        </div>
                        <div class="category-name">
                            Tablet
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="category-image">
                            <img src="https://cdn2.cellphones.com.vn/150x,webp,q70/media/catalog/product/i/c/icon-phone-tablet_1.png" alt="">
                        </div>
                        <div class="category-name">
                            Tablet
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="ads-supper-sale mg-section">
          <div class="ads-sale flex align-items-center justify-content-space-betweent">
                <div class="ads-type">
                    <div class="ads-type__title">
                        <button class="active">Điện thoại,Laptop,TV</button>
                        <button>Phụ kiện</button>
                    </div>
                </div>
                <div class="ads-title">HOT SALE CUỐI TUẦN</div>
                <div class="count-down">
                    <span class="days">00</span>
                    <span class="hour">00</span>
                    <span class="minute">00</span>
                    <span class="second">00</span>
                </div>
            </div>
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
        </div>

        <section class="ladi-section">
            <div class="ladi-title align-items-center justify-content-space-betweent mg-section ">
                <div class="ladi-label">
                    <h2>ĐIỆN THOẠI NỔI BẬT NHẤT</h2>
                </div>
                <div class="ladi-relate pc">
                    <ul class="ladi-brand ">
                        <li><a href="">Apple</a></li>
                        <li><a href="">Samsung</a></li>
                        <li><a href="">Xiaomi</a></li>
                        <li><a href="">OPPO</a></li>
                        <li><a href="">vio</a></li>
                        <li><a href="">realme</a></li>
                        <li><a href="">Xem tất cả</a></li>
                    </ul>
                </div>
                <div class="ladi-relate mb">
                    <ul class="ladi-brand ">
                        <li><a href="">Apple</a></li>
                        <li><a href="">Samsung</a></li>
                        <li><a href="">Xiaomi</a></li>
                        <li><a href="">OPPO</a></li>
                        <li><a href="">vio</a></li>
                        <li><a href="">realme</a></li>
                        <li><a href="">Xem tất cả</a></li>
                    </ul>
                </div>
            </div>

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
        </section>
    </div>
</main>
@endsection
