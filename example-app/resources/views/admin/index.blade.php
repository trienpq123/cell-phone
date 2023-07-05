<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('./admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('./admin/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('./admin/assets/css/animation.css')}}">
    <link rel="stylesheet" href="{{asset('./admin/assets/css/css.css')}}">

    <!-- LINK CDN -->
    <!-- CDN FONT-AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css')

</head>
<body>

    @include('admin.layouts.aside')
    @include('admin.layouts.articles')

</body>
<script src="{{asset('../../assets/js/js.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{asset('../../core/slide-banner/slide-banner/jquery.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('../../core/slide-banner/slide-banner/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('../../core/slide-banner/slide-banner/slick-theme.css')}}">
<script src="{{asset('../../core/slide-banner/slide-banner/slick.js')}}" type="text/javascript" charset="utf-8"></script>
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
                    centerPadding: '0px'
                });
    $(".chuyen_banner_text").slick({
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    dots: false,
                    centerMode: true,
                    focusOnSelect: true,
                    autoplay: true,
                    arrows: false,
                    autoplaySpeed: 3000,
                    centerPadding: '0px'
                });
    });


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="{{asset('./admin/assets/js/js.js')}}"></script>
<script>
   $(document).ready(function(){
        $('.aside ul li a').click(function() {

            $(this).parent().find('.menu-child').toggleClass('active');
        })

        $('table .btn-delete').click(function() {
            $('#popup-delete').toggleClass('active');
            // $('.popup-modal').click(function(){
            //     $('.popup-modal').removeClass('active');
            // });
            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });
            $('.btn-agree').click(function(){
                $('.popup-modal').removeClass('active');
            });
        })
        $('.btn-add').click(function() {
            let name=$(this).attr('data-name');
            $('.popup-modal'+'.'+name).toggleClass('active');
            // $('.popup-modal').click(function(){
            //     $('.popup-modal').removeClass('active');
            // });
            $('.btn-close').click(function(){
                $('.popup-modal').removeClass('active');
            });
            $('.btn-agree').click(function(){
                $('.popup-modal').removeClass('active');
            });

        })
        // $('.btn-edit').click(function() {
        //     let name=$(this).attr('data-name');
        //     $('.popup-modal'+'.'+name).toggleClass('active');
        //     // $('.popup-modal').click(function(){
        //     //     $('.popup-modal').removeClass('active');
        //     // });
        //     $('.btn-close').click(function(){
        //         $('.popup-modal').removeClass('active');
        //     });
        //     $('.btn-agree').click(function(){
        //         $('.popup-modal').removeClass('active');
        //     });
        // })

   })


</script>
<script type="text/javascript">
    let a = document.getElementsByClassName('btn-edit');
    console.log(a)
    function ChangeToSlug()
        {
            var slug;

            //Lấy text từ thẻ input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }




</script>


@stack('script-action')
</html>
