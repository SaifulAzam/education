<div class="modal fade" id="edit_tag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">编辑擅长科目</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($school, ['method' => 'PATCH', 'action' => ['Frontend\SchoolsController@editTag', $school->id]]) !!}

                <!-----科目 Form Input ---->

                <div class="form-group">
                    {!! Form::label('tag_list', '科目') !!}
                    {!! Form::select('tag_list[]', $tag_list, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
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