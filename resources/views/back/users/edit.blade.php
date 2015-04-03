@extends('back.layouts.backend')

@section('content')

    <div class="page-header">
        <h3>编辑用户</h3>
    </div>

    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['Backend\UsersController@update', $user->id], 'class' => 'form-horizontal']) !!}

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
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">用户名</label>
            <div class="col-md-6">
                {!! Form::text('username', old('username'), ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">昵称</label>
            <div class="col-md-6">
                {!! Form::text('nickname', old('nickname'), ['class' => 'form-control']) !!}
            </div>
        </div>

        <!----- Gender Input ---->

        <div class="form-group">
            <label class="col-md-4 control-label">性别</label>
            <div class="col-md-6">
                {!! Form::radio('gender', 'M', (Input::old('gender') == 'M')) !!} 男
                {!! Form::radio('gender', 'F', (Input::old('gender') == 'F')) !!} 女
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">手机号码</label>
            <div class="col-md-6">
                {!! Form::text('cellphone', old('cellphone'), ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-----School_name Form Input ---->

        <div class="form-group">
            <label class="col-md-4 control-label">权限</label>
            <div class="col-md-6">
                {!! Form::select('roles[]', $roles, null, ['id' => 'roles', 'class' => 'form-control', 'single']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">密码</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">重复密码</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    确认
                </button>
            </div>
        </div>

    {!! Form::close() !!}

@endsection

@section('footer')
    <script>
        $('#role').select2({
            placeholder: 'Choose a role',
            tags: false
        });
    </script>
@endsection


@stop
