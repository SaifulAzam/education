@extends('front.layouts.frontend')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">登入成功</div>
					<div class="panel-body">
						<label>Welcome</label>
						<br>
						@if(!$is_completed)
							@if($user->is_tutor)
								<a href="/tutors/create">补全信息</a>
							@else
								<a href="/students/create">补全信息</a>
							@endif
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
