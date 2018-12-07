@extends('general.squelette')
@section('main_view')
	<div id="app" class="container-fluid">
		<div class="row h-100">
			<div id="sidebar" class="col-2">
				@include('includes.sidebar')
			</div>
			<div id="main" class="col-10">
				@yield('content')
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
@endsection
