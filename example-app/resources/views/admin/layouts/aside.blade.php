<div class="aside">
    <div class="logo">
        <img src="http://sinbad.anhcoder.com/assets/images/logo-light.png" alt="">
    </div>
    <div class="ladi-list menu">
        <ul>
            <li><a href="{{route('admin.DashboardAdmin')}}">
                <span class="box-iconls"><i class="fa-solid fa-house"></i>{{__('dashboardAdmin')}}</span>

            </a></li>
            <li>
                <a href="{{route('admin.filter.listFilter')}}">
                    <span class="box-iconls"><i class="fa-solid fa-house"></i>{{__('theFilter')}}</span>

                </a>
            </li>
            <li>
                <a href="{{route('admin.attr.listAttr')}}">
                    <span class="box-iconls"><i class="fa-solid fa-house"></i>{{__('theAttrOfCate')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.order.listOrder')}}">
                    <span class="box-iconls"><i class="fa-solid fa-house"></i>{{__('order')}}</span>

                </a>
                <div class="menu-child">
                    <ul>
                        <li><a href="#">{{__('order_list')}}</a></li>
                        <li><a href="#">{{__('order_delivered')}}</a></li>
                        <li><a href="#">{{__('order_processing')}}</a></li>
                        <li><a href="#">{{__('order_yet_finished')}}</a></li>
                        <li><a href="#">{{__('order_cod')}}</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{Route('admin.product.listProduct')}}">
                    <span class="box-iconls"><i class="fa-solid fa-house"></i></span> {{__('product')}}
                </a>
            </li>
            <li>
                <a href="{{route('admin.category.listCategory')}}"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('category')}}</a>
            </li>
            <li><a href="#"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('customer')}}</a></li>
            <li><a href="{{route('admin.menu.listMenu')}}"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('Menu')}}</a></li>
            <li><a href="{{route('admin.pages.listPages')}}"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('page')}}</a></li>
            <li><a href="{{route('admin.banner.listBanner')}}"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('banner')}}</a></li>
            <li><a href="#"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('contact')}}</a></li>
            <li><a href="{{route('admin.news.listNews')}}"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('news')}}</a></li>
            <li><a href="{{route('admin.brand.listBrand')}}"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>Quản lý thương hiệu</a></li>
            <li><a href="#"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('config')}}</a></li>
            <li><a href="#"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>Config</a></li>
            <li>
                <a href="#"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('seo')}}</a>
                <div class="menu-child">
                    <ul>
                        <li><a href="#">SEO Sản Phẩm</a></li>
                        <li><a href="#">SEO Danh Mục</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('permissions')}}</a>
                <div class="menu-child">
                    <ul>
                        <li><a href="{{route('admin.roles.role.index')}}">{{__('role')}}</a></li>
                        <li><a href="{{route('admin.permisson.permisson.index')}}">{{__('permission')}}</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{route('admin.User.User.index')}}"><span class="box-iconls"><i class="fa-solid fa-house"></i></span>{{__('user')}}</a>

            </li>
        </ul>
    </div>
</div>
