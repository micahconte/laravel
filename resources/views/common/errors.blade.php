<!-- resources/views/common/errors.blade.php -->
<div id="alert-messages">
@if (count($errors) > 0)
	<!-- Form Error list -->
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
</div>