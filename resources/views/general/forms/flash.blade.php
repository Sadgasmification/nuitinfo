@if (Session::has('success'))
	<div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
		{{  Session::get('success') }}
	</div>

	<script type="text/javascript">
	$("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
		$("#success-alert").slideUp(500);
	});
	</script>
@endif

@if (Session::has('info'))
	<div class="alert alert-info alert-dismissible" role="alert">
		{{  Session::get('info') }}
	</div>
@endif

@if (Session::has('warning'))
	<div class="alert alert-warning" role="alert">
		{{  Session::get('warning') }}
	</div>
@endif
