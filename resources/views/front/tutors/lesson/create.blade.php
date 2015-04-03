<div class="modal fade" id="add_lesson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">创建课程</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['action' => ['Frontend\TutorsController@postLesson', $tutor->id]]) !!}

                <!-----Title Form Input ---->

                <div class="form-group">
                    {!! Form::label('title', '标题：') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Body Form Input ---->

                <div class="form-group">
                    {!! Form::label('body', '主体：') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control wysihtml5']) !!}
                </div>

                <!-----Published_at Form Input ---->

                <div class="form-group">
                    {!! Form::label('published_at', '发布时间') !!}
                    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
                </div>

                <!-----Tags Form Input ---->

                <div class="form-group">
                    {!! Form::label('tag_list', '标签：') !!}
                    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
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