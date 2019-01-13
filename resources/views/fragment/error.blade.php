@if(count($errors))
	<div class="alert alert-danger" id="error">
		<button type="button" class="close" data-dismiss="alert" id="btn-error">
		&times;
	</button>
		<h4>
		<i class="fa fa-warning"></i>
		Aviso!
	</h4>

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
