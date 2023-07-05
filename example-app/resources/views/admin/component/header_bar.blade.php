<div class="head-menu">
    <div class="bar-mb">
        <span><i class="fas fa-bars"></i></span>
    </div>
    <div class="head-menu__left">
        <div class="search-bar">
            <form action="">
                <input type="text" placeholder="Tìm kiếm tại đây">
                <div  class="btn-search">
                    <div class="box-iconls">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="head-menu__right">
        <ul class="box-list flex align-items-center">
            <li class="language">

                <a href="#" class="avatar">
                    <div class="box-items">
                            <div class="box-iconls">
                                <span><i class="fas fa-globe"></i></span>
                            </div>
                    </div>
                </a>
                <div class="sub-menus">
                    <ul>
                        <li><a href="{{Route('checkLanguage',['language' => 'vi'])}}">
                            <img src="./assets/img/language-1.png" alt="">
                            {{__('vietnam')}}
                        </a></li>
                        <li><a href="{{Route('checkLanguage',['language' => 'en'])}}">{{__('us')}}</a></li>
                    </ul>
                </div>
            </li>
            <li class="avatar">

                <a href="#" class="avatar">
                    <div class="box-items">
                            <div class="box-iconls">
                                <img src="https://scontent.fsgn5-8.fna.fbcdn.net/v/t39.30808-6/325846460_3455783904746435_4439982129076058910_n.jpg?stp=cp6_dst-jpg&_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=IN5NdBY3MGEAX9_9HJU&_nc_ht=scontent.fsgn5-8.fna&oh=00_AfCmJet0fuC5v-dYfurbo6k_aaQz69UxAaEDsQGSECWQjQ&oe=644F69CA" alt="">
                            </div>
                    </div>
                </a>
                <div class="sub-menus">
                    <div class="name">
                        @if (session()->has('user'))
                            {{Auth::user() ? Auth::user()->name : ''}}
                        @endif
                    </div>

                    <div class="position">
                        {{-- {{Auth::user()->roles->first()->name}} --}}
                    </div>
                    <ul>
                        <li><a href="#">Thông tin cá nhân</a></li>
                        <li><a href="{{route('admin.logout')}}">Đăng xuất</a></li>
                    </ul>
                </div>
            </li>
            <li class="notification">

                <a href="#">
                    <div class="box-items">
                            <div class="box-iconls">
                                <i class="far fa-bell"></i>
                            </div>
                            <div class="count-noti">
                                2
                            </div>
                    </div>
                </a>
                <div class="sub-menus">
                    <div class="name">
                        Thông báo
                    </div>
                    <ul>
                        <li><a href="#">Bạn vừa nhận được thông báo mới</a></li>
                    </ul>
                </div>
            </li>
            <li class="bg-dark">
                <a href="#">
                    <div class="box-items">
                            <div class="box-iconls">
                                <i class="far fa-moon"></i>
                            </div>

                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
