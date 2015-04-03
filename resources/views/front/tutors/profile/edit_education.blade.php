<div class="modal fade" id="edit_education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">编辑学习履历</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['action' => ['Frontend\TutorsController@editEducation', $tutor->id]]) !!}

                <!-----Position Form Input ---->

                <div class="form-group">
                    {!! Form::label('position', '学位') !!}
                    {!! Form::text('position', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Company_name Form Input ---->

                <div class="form-group">
                    {!! Form::label('school_name', '学校名称') !!}
                    {!! Form::text('school_name', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Starting_time Form Input ---->

                <div class="form-group">
                    {!! Form::label('starting_time', '开始时间') !!}
                    {!! Form::input('date', 'starting_time', date('Y-m-d'), ['class' => 'form-control']) !!}
                </div>

                <!-----Ending_time Form Input ---->

                <div class="form-group">
                    {!! Form::label('ending_time', '结束时间') !!}
                    {!! Form::input('date', 'ending_time', date('Y-m-d'), ['class' => 'form-control']) !!}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">添加</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>