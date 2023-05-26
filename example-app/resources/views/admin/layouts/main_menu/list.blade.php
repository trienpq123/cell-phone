@extends('admin.index')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
@endsection
@section('articles')
<style>
    .block {
	margin: 5px 0;
	border: 1px solid #f1e8e2;
	background: #fff;
}
.block-title {
    font-family: Arial;
	font-size: 12px;
	color: #4c4743;
	padding: 0 10px;
	height: 33px;
	line-height: 33px;
	position: relative;
}
.sortable {
    list-style: none;
    padding-left: 0;
}
.sortable ul {
    margin-left: 25px;
}
.ui-sortable-helper {
	box-shadow: rgba(0,0,0,0.15) 0 3px 5px 0;
	width: 300px!important;
	height: 33px!important;
}
.sortable-placeholder {
	height: 35px;
	background: #e3dcd7;
	margin-bottom: 5px;
	margin-top: 5px;
}
</style>
    <div class="wraper-container">
        <div class="action-link">
            <a href="{{route('admin.menu.addMenu')}}" class="btn btn-add btn-success">Thêm menu</a>
        </div>
        <br>


            <ul class="sortable list-unstyled" id="sortable">
            @if (count($menu) > 0)
                @foreach ($menu as $m)
                        <li style="position: relative" id="sortableId" data-position-menu="{{$m->position}}" data-id-menu="{{$m->id_menu}}" data-parent-menu="{{$m->parent_menu}}" >
                            <button class="btn btn-edit" style="position:absolute; z-index: 99999; right: 0; " ><i class="fas fa-edit"></i></button>
                            <div class="block block-title">{{$m->name_menu}}</div>
                            <ul class="sortable list-unstyled">
                            @if (count($m->chirendMenu) > 0)
                            @foreach ($m->chirendMenu as $cm)
                                    <li  style="position: relative" id="sortableId" data-position-menu="{{$cm->position}}" data-id-menu="{{$cm->id_menu}}" data-parent-menu="{{$cm->parent_menu}}">
                                        <button class="btn btn-edit" style="position:absolute; z-index: 99999; right: 0; " ><i class="fas fa-edit"></i></button>
                                        <div style="position: relative" class="block block-title" data-position-menu="{{$cm->position}}" data-id-menu="{{$cm->id_menu}}" data-parent-menu="{{$cm->parent_menu}}">{{$cm->name_menu}}</div>
                                        <ul class="sortable list-unstyled"></ul>
                                    </li>
                                    @endforeach
                            @endif
                        </ul>
                        </li>
                @endforeach
            @endif

            </ul>
            <button class="btn-test">SAVE</button>
    </div>
@endsection

@push('script-action')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/i18n/jquery-ui-i18n.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    {{-- <script src="https://sortablejs.github.io/Sortable/Sortable.js"></script> --}}
    <script>
        // Nested demo
        var nestedSortables = [].slice.call(document.querySelectorAll('.nested-sortable'));

        // Loop through each nested sortable element
        for (var i = 0; i < nestedSortables.length; i++) {
            new Sortable(nestedSortables[i], {
                group: 'nested',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,

            });
        }



        const nestedQuery = '.sortable';
        const identifier = '#sortableId';
        const root = document.getElementById('sortable');

        function serialize(sortable) {
            var serialized = [];
            var children = [].slice.call(sortable.children);

            for (var i in children) {
                console.log(children)
                var nested = children[i].querySelector(nestedQuery);
                var data_position = children[i].getAttribute('data-position-menu');
                var data_id = children[i].getAttribute('data-id-menu');
                var data_parent_menu = children[i].getAttribute('data-parent-menu')
                serialized.push({
                    children: nested ? serialize(nested) : [],
                    id_menu: data_id,
                    position: data_position,
                    parent_menu: data_parent_menu
                });
            }
            return serialized
        }

        $(document).ready(function(){
            $('.sortable').sortable({
                connectWith:    '.sortable',
                cursor:         'move',
                placeholder:    'sortable-placeholder',
                handle:         '.block-title',
                cursorAt:       { left: 150, top: 17 },
                tolerance:      'pointer',
                scroll:         false,
                zIndex:         9999,
                update:function(event,ui){
                    console.log(event,ui)
                        let data = serialize(root) // serialize the clicked button's form data
                        console.log(data);
                    $.ajax({
                        method:"POST",
                        url:"{{route('admin.menu.putEditMenu')}}",
                        data:{data:data, _token:"{{csrf_token()}}"},
                        success: (res) => {
                            console.log(res)
                        }
                    })
                }
            });
            $('.sortable').disableSelection();

        })
    </script>
@endpush


