@extends('admin.index')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
@endsection
@section('articles')
    <div class="wraper-container">
        <div class="action-link">
            <a href="{{route('admin.menu.addMenu')}}" class="btn btn-add btn-success">Thêm menu</a>
        </div>
        <br>

        <div id="nested" class="row">

                <div id="nestedDemo" class="list-group col nested-sortable">
                    @foreach ($menu as $m)
                        <div data-sortable-id="{{$m->position}}" data-position-menu="{{$m->position}}" data-id-menu="{{$m->id_menu}}" class="list-group-item nested-1">{{$m->name_menu}}
                            <div class="action-link flex ">
                                <a href="#" class="">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="">
                                    <i class="fas fa-close"></i>
                                </a>
                            </div>
                            @if (count($m->chirendMenu) > 0)
                            <div class="list-group nested-sortable">
                                @foreach ($m->chirendMenu as $cm)
                                <div data-sortable-id="{{$cm->position}}"  data-position-menu="{{$cm->position}}" data-id-menu="{{$cm->id_menu}}" class="list-group-item nested-2">
                                    {{$cm->name_menu}}
                                    <div class="action-link flex ">
                                        <a href="#" class="">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="">
                                            <i class="fas fa-close"></i>
                                        </a>
                                    </div>
                                    {{-- <div class="list-group nested-sortable">
                                        <div data-sortable-id="3.1" class="list-group-item nested-3">Item 3.1</div>
                                        <div data-sortable-id="3.2" class="list-group-item nested-3">Item 3.2</div>
                                        <div data-sortable-id="3.3" class="list-group-item nested-3">Item 3.3</div>
                                        <div data-sortable-id="3.4" class="list-group-item nested-3">Item 3.4</div>
                                    </div> --}}
                                </div>
                                @endforeach
                            </div>

                            @endif
                        </div>
                    @endforeach
                </div>


            <div style="padding: 0" class="col-12">
                <button class="btn-test">test</button>
            </div>
        </div>
    </div>
@endsection

@push('script-action')
    <script src="https://sortablejs.github.io/Sortable/Sortable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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



        const nestedQuery = '.nested-sortable';
        const identifier = 'sortableId';
        const root = document.getElementById('nestedDemo');

        function serialize(sortable) {
            var serialized = [];
            var children = [].slice.call(sortable.children);

            for (var i in children) {
                var nested = children[i].querySelector(nestedQuery);
                var data_position = children[i].getAttribute('data-position-menu');
                var data_id = children[i].getAttribute('data-id-menu');
                console.log(data_id)
                serialized.push({
                    id: children[i].dataset[identifier],
                    children: nested ? serialize(nested) : [],
                    id_menu: data_id,
                    position: data_position
                });
            }
            return serialized
        }

        $(document).ready(function(){
            $('.btn-test').click(function(){
                let data = serialize(root) // serialize the clicked button's form data
                console.log(data)
                alert(data)
                $.ajax({
                    method: "GET",
                    url: "{{route('admin.menu.putEditMenu')}}",
                    data:{data:data,_token:"{{csrf_token()}}"},
                    success: (res) => {
                        console.log(res)
                    }
                })
            })
        })

    </script>
@endpush


@extends('layout')
@section('content')

<div class="container-fluid">
  <h2><span>Menus</span></h2>

  <div class="content info-box">
  	@if(count($menus) > 0)
	Select a menu to edit:
	<form action="{{url('manage-menus')}}" class="form-inline">
      <select name="id">
		@foreach($menus as $menu)
	        @if($desiredMenu != '')
			<option value="{{$menu->id}}" @if($menu->id == $desiredMenu->id) selected @endif>{{$menu->title}}</option>
		  @else
			<option value="{{$menu->id}}">{{$menu->title}}</option>
		  @endif
		@endforeach
	  </select>
	  <button class="btn btn-sm btn-default btn-menu-select">Select</button>
	</form>
	or
	@endif
	<a href="{{url('manage-menus?id=new')}}">Create a new menu</a>.
  </div>


  <div class="row" id="main-row">
	<div class="col-sm-3 cat-form @if(count($menus) == 0) disabled @endif">
      <h3><span>Add Menu Items</span></h3>

	  <div class="panel-group" id="menu-items">
		<div class="panel panel-default">
	      <div class="panel-heading">
			<a href="#categories-list" data-toggle="collapse" data-parent="#menu-items">Categories <span class="caret pull-right"></span></a>
		  </div>
		  <div class="panel-collapse collapse in" id="categories-list">
		    <div class="panel-body">
			  <div class="item-list-body">
				@foreach($categories as $cat)
				  <p><input type="checkbox" name="select-category[]" value="{{$cat->id}}"> {{$cat->title}}</p>
				@endforeach
			  </div>
			  <div class="item-list-footer">
			    <label class="btn btn-sm btn-default"><input type="checkbox" id="select-all-categories"> Select All</label>
				  <button type="button" class="pull-right btn btn-default btn-sm" id="add-categories">Add to Menu</button>
			</div>
		  </div>
		</div>
		<script>
		  $('#select-all-categories').click(function(event) {
			if(this.checked) {
			  $('#categories-list :checkbox').each(function() {
			    this.checked = true;
			  });
			}else{
			  $('#categories-list :checkbox').each(function() {
			    this.checked = false;
			  });
			}
		  });
		</script>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading">
		  <a href="#posts-list" data-toggle="collapse" data-parent="#menu-items">posts <span class="caret pull-right"></span></a>
		</div>
		<div class="panel-collapse collapse" id="posts-list">
		  <div class="panel-body">
			<div class="item-list-body">
			  @foreach($posts as $post)
				<p><input type="checkbox" name="select-post[]" value="{{$post->id}}"> {{$post->title}}</p>
			  @endforeach
			</div>
			<div class="item-list-footer">
			  <label class="btn btn-sm btn-default"><input type="checkbox" id="select-all-posts"> Select All</label>
			  <button type="button" id="add-posts" class="pull-right btn btn-default btn-sm">Add to Menu</button>
			</div>
		  </div>
		</div>
		<script>
		  $('#select-all-posts').click(function(event) {
		    if(this.checked) {
			  $('#posts-list :checkbox').each(function() {
				this.checked = true;
			  });
			}else{
			  $('#posts-list :checkbox').each(function() {
				this.checked = false;
			  });
			}
		  });
		</script>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading">
	      <a href="#custom-links" data-toggle="collapse" data-parent="#menu-items">Custom Links <span class="caret pull-right"></span></a>
		</div>
		<div class="panel-collapse collapse" id="custom-links">
		  <div class="panel-body">
			<div class="item-list-body">
			  <div class="form-group">
				<label>URL</label>
				<input type="url" id="url" class="form-control" placeholder="https://">
			  </div>
			  <div class="form-group">
				<label>Link Text</label>
			      <input type="text" id="linktext" class="form-control" placeholder="">
				</div>
			  </div>
			  <div class="item-list-footer">
				<button type="button" class="pull-right btn btn-default btn-sm" id="add-custom-link">Add to Menu</button>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>

	<div class="col-sm-9 cat-view">
  <h3><span>Menu Structure</span></h3>
  @if($desiredMenu == '')
    <h4>Create New Menu</h4>
	<form method="post" action="{{url('create-menu')}}">
	  {{csrf_field()}}
	  <div class="row">
		<div class="col-sm-12">
		  <label>Name</label>
		</div>
		<div class="col-sm-6">
		  <div class="form-group">
			<input type="text" name="title" class="form-control">
		  </div>
		</div>
		<div class="col-sm-6 text-right">
		  <button class="btn btn-sm btn-primary">Create Menu</button>
		</div>
	  </div>
	</form>
	@else
	<div id="menu-content">
		<div id="result"></div>
	  <div style="min-height: 240px;">
		  <p>Select categories, pages or add custom links to menus.</p>
		  @if($desiredMenu != '')
			<ul class="menu ui-sortable" id="menuitems">
  @if(!empty($menuitems))
	@foreach($menuitems as $key=>$item)
	  <li data-id="{{$item->id}}"><span class="menu-item-bar"><i class="fa fa-arrows"></i> @if(empty($item->name)) {{$item->title}} @else {{$item->name}} @endif <a href="#collapse{{$item->id}}" class="pull-right" data-toggle="collapse"><i class="caret"></i></a></span>
	    <div class="collapse" id="collapse{{$item->id}}">
	      <div class="input-box">
	        <form method="post" action="{{url('update-menuitem')}}/{{$item->id}}">
			  {{csrf_field()}}
			  <div class="form-group">
				<label>Link Name</label>
				<input type="text" name="name" value="@if(empty($item->name)) {{$item->title}} @else {{$item->name}} @endif" class="form-control">
			  </div>
			  @if($item->type == 'custom')
				<div class="form-group">
				  <label>URL</label>
				  <input type="text" name="slug" value="{{$item->slug}}" class="form-control">
				</div>
				<div class="form-group">
				  <input type="checkbox" name="target" value="_blank" @if($item->target == '_blank') checked @endif> Open in a new tab
				</div>
			  @endif
			  <div class="form-group">
				<button class="btn btn-sm btn-primary">Save</button>
				<a href="{{url('delete-menuitem')}}/{{$item->id}}/{{$key}}" class="btn btn-sm btn-danger">Delete</a>
			  </div>
			</form>
		  </div>
		</div>
	    <ul>
		  @if(isset($item->children))
		    @foreach($item->children as $m)
		  	  @foreach($m as $in=>$data)
			    <li data-id="{{$data->id}}" class="menu-item"> <span class="menu-item-bar"><i class="fa fa-arrows"></i> @if(empty($data->name)) {{$data->title}} @else {{$data->name}} @endif <a href="#collapse{{$data->id}}" class="pull-right" data-toggle="collapse"><i class="caret"></i></a></span>
			      <div class="collapse" id="collapse{{$data->id}}">
			        <div class="input-box">
			          <form method="post" action="{{url('update-menuitem')}}/{{$data->id}}">
					    {{csrf_field()}}
					    <div class="form-group">
						  <label>Link Name</label>
						  <input type="text" name="name" value="@if(empty($data->name)) {{$data->title}} @else {{$data->name}} @endif" class="form-control">
					    </div>
					    @if($data->type == 'custom')
						  <div class="form-group">
						    <label>URL</label>
						    <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
						  </div>
						  <div class="form-group">
						    <input type="checkbox" name="target" value="_blank" @if($data->target == '_blank') checked @endif> Open in a new tab
						  </div>
					    @endif
					    <div class="form-group">
						  <button class="btn btn-sm btn-primary">Save</button>
						  <a href="{{url('delete-menuitem')}}/{{$data->id}}/{{$key}}/{{$in}}" class="btn btn-sm btn-danger">Delete</a>
					    </div>
					  </form>
				    </div>
				  </div>
			      <ul></ul>
		        </li>
		      @endforeach
	        @endforeach
	      @endif
        </ul>
      </li>
    @endforeach
  @endif
</ul>
		  @endif
		</div>
	  @if($desiredMenu != '')
		<div class="form-group menulocation">
		  <label><b>Menu Location</b></label>
		  <p><label><input type="radio" name="location" value="1" @if($desiredMenu->location == 1) checked @endif> Header</label></p>
		  <p><label><input type="radio" name="location" value="2" @if($desiredMenu->location == 2) checked @endif> Main Navigation</label></p>
		</div>
		<div class="text-right">
		  <button class="btn btn-sm btn-primary" id="saveMenu">Save Menu</button>
		</div>
		<p><a href="{{url('delete-menu')}}/{{$desiredMenu->id}}">Delete Menu</a></p>
	  @endif
	</div>
  @endif
</div>
  </div>
</div>
<div id="serialize_output">@if($desiredMenu){{$desiredMenu->content}}@endif</div>
<script src="{{ url('js/sortable.js')}}"></script>
@if($desiredMenu)
<script>
$('#add-categories').click(function(){
  var menuid = <?=$desiredMenu->id?>;
  var n = $('input[name="select-category[]"]:checked').length;
  var array = $('input[name="select-category[]"]:checked');
  var ids = [];
  for(i=0;i<n;i++){
    ids[i] =  array.eq(i).val();
  }
  if(ids.length == 0){
	return false;
  }
  $.ajax({
	type:"get",
	data: {menuid:menuid,ids:ids},
	url: "{{url('add-categories-to-menu')}}",
	success:function(res){
      location.reload();
	}
  })
})
$('#add-posts').click(function(){
  var menuid = <?=$desiredMenu->id?>;
  var n = $('input[name="select-post[]"]:checked').length;
  var array = $('input[name="select-post[]"]:checked');
  var ids = [];
  for(i=0;i<n;i++){
	ids[i] =  array.eq(i).val();
  }
  if(ids.length == 0){
	return false;
  }
  $.ajax({
	type:"get",
	data: {menuid:menuid,ids:ids},
	url: "{{url('add-post-to-menu')}}",
	success:function(res){
  	  location.reload();
	}
  })
})
$("#add-custom-link").click(function(){
  var menuid = <?=$desiredMenu->id?>;
  var url = $('#url').val();
  var link = $('#linktext').val();
  if(url.length > 0 && link.length > 0){
	$.ajax({
	  type:"get",
	  data: {menuid:menuid,url:url,link:link},
	  url: "{{url('add-custom-link')}}",
	  success:function(res){
	    location.reload();
	  }
	})
  }
})
</script>
<script>
var group = $("#menuitems").sortable({
  group: 'serialization',
  onDrop: function ($item, container, _super) {
    var data = group.sortable("serialize").get();
    var jsonString = JSON.stringify(data, null, ' ');
    $('#serialize_output').text(jsonString);
  	  _super($item, container);
  }
});
</script>
<script>
$('#saveMenu').click(function(){
  var menuid = <?=$desiredMenu->id?>;
  var location = $('input[name="location"]:checked').val();
  var newText = $("#serialize_output").text();
  var data = JSON.parse($("#serialize_output").text());
  $.ajax({
    type:"get",
	data: {menuid:menuid,data:data,location:location},
	url: "{{url('update-menu')}}",
	success:function(res){
	  window.location.reload();
	}
  })
})
</script>
@endif
<style>
  .item-list,.info-box{background: #fff;padding: 10px;}
  .item-list-body{max-height: 300px;overflow-y: scroll;}
  .panel-body p{margin-bottom: 5px;}
  .info-box{margin-bottom: 15px;}
  .item-list-footer{padding-top: 10px;}
  .panel-heading a{display: block;}
  .form-inline{display: inline;}
  .form-inline select{padding: 4px 10px;}
  .btn-menu-select{padding: 4px 10px}
  .disabled{pointer-events: none; opacity: 0.7;}
  .menu-item-bar{background: #eee;padding: 5px 10px;border:1px solid #d7d7d7;margin-bottom: 5px; width: 75%; cursor: move;display: block;}
  #serialize_output{display: block;}
  .menulocation label{font-weight: normal;display: block;}
  body.dragging, body.dragging * {cursor: move !important;}
  .dragged {position: absolute;z-index: 1;}
  ol.example li.placeholder {position: relative;}
  ol.example li.placeholder:before {position: absolute;}
  #menuitem{list-style: none;}
  #menuitem ul{list-style: none;}
  .input-box{width:75%;background:#fff;padding: 10px;box-sizing: border-box;margin-bottom: 5px;}
  .input-box .form-control{width: 50%}
</style>
@stop
