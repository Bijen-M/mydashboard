@extends('admin.cms_module.layouts.master')
@section('header_resources')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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
  </style>
@endsection
@section('content')
<div class="content__body">
	<div id="menu">
		<ul>
			@foreach($menuItems as $menuItem)
				<li data-id="{{ $menuItem->id }}" data-parent="{{ $menuItem->parent_id }}">
					<div>
						<span>{{ $menuItem->title }}</span>
						<button class="edit">Edit</button>
					</div>
					@if($menuItem->children)
						<ul>
							@foreach($menuItem->children as $child)
								<li data-id="{{ $child->id }}" data-parent="{{ $child->parent_id }}">
									<div>
										<span>{{ $child->title }}</span>
										<button class="edit">Edit</button>
									</div>
								</li>
							@endforeach
						</ul>
					@endif
				</li>
			@endforeach
		</ul>
	</div>
</div>
@endsection
	