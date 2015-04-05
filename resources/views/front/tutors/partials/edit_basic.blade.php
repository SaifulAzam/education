<div class="modal fade" id="edit_basic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">编辑基本信息</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($tutor, ['method' => 'PATCH', 'action' => ['Frontend\TutorsController@editBasic', $tutor->id]]) !!}


                <!-----Occupation Form Input ---->

                <div class="form-group">
                    {!! Form::label('occupation', '职业：') !!}
                    {!! Form::text('occupation', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Capable_grade Form Input ---->

                <div class="form-group">
                    {!! Form::label('capable_grade', '执教年级') !!}
                    {!! Form::text('capable_grade', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Bio Form Input ---->

                <div class="form-group">
                    {!! Form::label('bio', '个人简介：') !!}
                    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
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