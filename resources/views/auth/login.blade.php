@extends('front.layouts.frontend')

@section('content')
	<!--=== Breadcrumbs ===-->
	<div class="breadcrumbs margin-bottom-40">
		<div class="container">
			<h1 class="pull-left">Login</h1>
			<ul class="pull-right breadcrumb">
				<li><a href="">Home</a></li>
				<li><a href="">Pages</a></li>
				<li class="active">Login</li>
			</ul>
		</div><!--/container-->
	</div><!--/breadcrumbs-->
	<!--=== End Breadcrumbs ===-->

	<!--=== Content Part ===-->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

				@include('errors.list')

				<form class="reg-page" role="form" method="POST" action="/auth/login">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="reg-header">
						<h2>Login to your account</h2>
					</div>

					<div class="input-group margin-bottom-20">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						<input type="email" class="form-control" name="email" value="{{ old('email') }}">
					</div>

					<div class="input-group margin-bottom-20">
						<span class="input-group-addon"><i class="icon-lock"></i></span>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="row">
						<div class="col-md-6">
							<label class="checkbox"><input type="checkbox">记住我</label>
						</div>
						<div class="col-md-6">
							<button class="btn-u pull-right" type="submit">登入</button>
						</div>
					</div>

					<hr>

					<h4>Forget your Password ?</h4>
					<p>no worries, <a class="color-green" href="/password/email">click here</a> to reset your password.</p>

				</form>
			</div>
		</div>
	</div>

	<!--=== End Content Part ===-->
@endsection
