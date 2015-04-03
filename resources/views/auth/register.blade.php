@extends('front.layouts.frontend')

@section('content')
	<!--=== Breadcrumbs ===-->
	<div class="breadcrumbs margin-bottom-40">
		<div class="container">
			<h1 class="pull-left">Registration</h1>
			<ul class="pull-right breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li><a href="">Pages</a></li>
				<li class="active">Registration</li>
			</ul>
		</div><!--/container-->
	</div><!--/breadcrumbs-->
	<!--=== End Breadcrumbs ===-->

	<!--=== Content Part ===-->

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<form class="reg-page" role="form" method="POST" action="/auth/register">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="reg-header">
						<h2>Register a new account</h2>
						<p>Already Signed Up? Click <a href="/auth/login" class="color-green">Sign In</a> to login your account.</p>
					</div>
					@include('errors.list')

					<!----- User Type Input ---->

					<div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-6">
							{!! Form::radio('is_tutor', 0, (Input::old('is_tutor'))) !!} 我要学
							{!! Form::radio('is_tutor', 1, (Input::old('is_tutor'))) !!} 我要教
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">邮件地址</label>
						<div class="col-md-6">
							<input type="email" class="form-control margin-bottom-20" name="email" value="{{ old('email') }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">用户名</label>
						<div class="col-md-6">
							<input type="text" class="form-control margin-bottom-20" name="username" value="{{ old('username') }}">
						</div>
					</div>


					<div class="form-group">
						<label class="col-md-4 control-label">昵称</label>
						<div class="col-md-6">
							<input type="text" class="form-control margin-bottom-20" name="nickname" value="{{ old('nickname') }}">
						</div>
					</div>

					<!----- Gender Input ---->

					<div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-6">
							{!! Form::radio('gender', 'M', (Input::old('gender') == 'M'), ['class' => '']) !!} 男
							{!! Form::radio('gender', 'F', (Input::old('gender') == 'F'), ['class' => '']) !!} 女
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">手机号码</label>
						<div class="col-md-6">
							<input type="text" class="form-control margin-bottom-20" name="cellphone" value="{{ old('cellphone') }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">密码</label>
						<div class="col-md-6">
							<input type="password" class="form-control margin-bottom-20" name="password">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">重复密码</label>
						<div class="col-md-6">
							<input type="password" class="form-control margin-bottom-20" name="password_confirmation">
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-6">
							<label class="checkbox">
								<input type="checkbox">
								I read <a href="page_terms.html" class="color-green">Terms and Conditions</a>
							</label>
						</div>
						<div class="col-lg-6 text-right">
							<button class="btn-u" type="submit">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--=== End Content Part ===-->
@endsection
