<div class="modal fade" id="edit_social" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">编辑社区账户</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($tutor, ['method' => 'PATCH', 'action' => ['Frontend\TutorsController@editSocial', $tutor->id]]) !!}

                <!-----Weibo Form Input ---->

                <div class="form-group">
                    {!! Form::label('weibo', '微博') !!}
                    {!! Form::text('weibo', null, ['class' => 'form-control']) !!}
                </div>

                <!-----QQ Form Input ---->

                <div class="form-group">
                    {!! Form::label('qq', 'QQ') !!}
                    {!! Form::text('qq', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Weixin Form Input ---->

                <div class="form-group">
                    {!! Form::label('weixin', '微信') !!}
                    {!! Form::text('weixin', null, ['class' => 'form-control']) !!}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">确定</button>
                </div>

                {!! Form::close() !!}
             </div>
        </div>
    </div>
</div>