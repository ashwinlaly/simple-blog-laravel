@if(session()->has('notify-success'))
	<div class="alert alert-success"> {{ session()->get('notify-success') }}</div>
@endif

@if(session()->has('notify-error'))
	<div class="alert alert-danger"> {{ session()->get('notify-error') }}</div>
@endif