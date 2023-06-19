<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animation.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/css.css')}}">

    <!-- LINK CDN -->
    <!-- CDN FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        @include('user.header')
        @yield('banner')
        @yield('main')
        @include('user.footer')
    </div>
</body>
<script src="{{asset('./assets/js/js.js')}}"></script>
<script src="{{asset('./core/slide-banner/slide-banner/jquery.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('./core/slide-banner/slide-banner/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('./core/slide-banner/slide-banner/slick-theme.css')}}">
<script src="{{asset('./core/slide-banner/slide-banner/slick.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function () {

        $(".chuyen_banner").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    centerMode: true,
                    focusOnSelect: true,
                    autoplay: true,
                    arrows: true,
                    autoplaySpeed: 3000,
                    centerPadding: '0px'
                });
        $(".chuyen_banner_bacsi").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    centerMode: true,
                    focusOnSelect: true,
                    autoplay: false,
                    arrows: true,
                    autoplaySpeed: 3000,
                    centerPadding: '0px'
                });

        $(".chuyen_banner_baochi").slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                    centerMode: true,
                    focusOnSelect: true,
                    autoplay: false,
                    arrows: true,
                    autoplaySpeed: 3000,
                    centerPadding: '0px'
                });
        $(".chuyen_baivietxemnhieu").slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                    centerMode: true,
                    focusOnSelect: true,
                    autoplay: true,
                    arrows: true,
                    autoplaySpeed: 3000,
                    centerPadding: '0px'
                });
    $(".chuyen_banner_moitruong").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    centerMode: true,
                    focusOnSelect: true,
                    autoplay: true,
                    arrows: true,
                    autoplaySpeed: 3000,
                    centerPadding: '0px',
                    asNavFor: '.chuyen_banner_text'
                });
    $(".chuyen_banner_text").slick({
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    dots: true,
                    centerMode: true,
                    focusOnSelect: true,
                    autoplay: true,
                    arrows: false,
                    autoplaySpeed: 3000,
                    centerPadding: '0px',
                    asNavFor: '.chuyen_banner_moitruong',
                    responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                                },
                                {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3
                                }
                                },
                                {
                                breakpoint: 414,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                    ]
    });
    $(".ladi-relate.mb .ladi-brand").slick({
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    dots: false,
                    centerMode: true,
                    focusOnSelect: true,
                    autoplay: false,
                    arrows: true,
                    autoplaySpeed: 3000,
                    centerPadding: '0px',
                    responsive:
                    [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 5,
                                    slidesToScroll: 5,
                                    infinite: true
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3
                                }
                            },
                            {
                                breakpoint: 425,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                    breakpoint: 325,
                                    settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                    }
                            }
                    ]
    });
});
</script>

</html>
