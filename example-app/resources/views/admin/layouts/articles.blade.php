<div class="article">
    @include('admin.component.header_bar')
    <div class="wrap-container">
        @yield('articles')
        @include('admin.component.test')
        {{-- <div>
            <span class="alert alert-success">Cập nhật thành công</span>
        </div> --}}
    </div>
</div>
