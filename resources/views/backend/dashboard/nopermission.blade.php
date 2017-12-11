@extends('backend.layout')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="error-page">
		<h2 class="headline text-red mt0">403</h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-red"></i> Oops! You have no permission on this page.</h3>
			<p>Please ask your web's administrator if you have permission or for more information.</p>
		</div>
	</div>
</section>
@stop

@section('javascript_page')
<!-- js link here -->
@stop