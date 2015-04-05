<div class="modal fade" id="edit_basic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">编辑基本信息</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($school, ['method' => 'PATCH', 'action' => ['Frontend\SchoolsController@editBasic', $school->id]]) !!}


                <!-----School Name Form Input ---->

                <div class="form-group">
                    {!! Form::label('name', '学校名称') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Founding_time Form Input ---->

                <div class="form-group">
                    {!! Form::label('founding_time', '成立时间') !!}
                    {!! Form::text('founding_time', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Address Form Input ---->

                <div class="form-group">
                    {!! Form::label('address', '地址') !!}
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Location Form Input ---->

                <div class="form-group">
                    {!! Form::label('location', '区域') !!}
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Student_count Form Input ---->

                <div class="form-group">
                    {!! Form::label('student_count', '学生数量') !!}
                    {!! Form::text('student_count', null, ['class' => 'form-control']) !!}
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