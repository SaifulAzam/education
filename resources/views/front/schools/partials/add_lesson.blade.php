<div class="modal fade" id="add_lesson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">创建课程</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['action' => ['Frontend\SchoolsController@postLesson', $school->id]]) !!}

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

                <!-----Price Form Input ---->

                <div class="form-group">
                    {!! Form::label('price', '价格：') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Class_count Form Input ---->

                <div class="form-group">
                    {!! Form::label('class_count', '课时：') !!}
                    {!! Form::text('class_count', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Class_type Form Input ---->

                <div class="form-group">
                    {!! Form::label('class_type', '上课形式：') !!}
                    {!! Form::text('class_type', null, ['class' => 'form-control']) !!}
                </div>

                <!-----Published_at Form Input ---->

                <div class="form-group">
                    {!! Form::label('published_at', '发布时间') !!}
                    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
                </div>

                <!-----Tags Form Input ---->

                <div class="form-group">
                    {!! Form::label('tag_list', '标签：') !!}
                    {!! Form::select('tag_list[]', $tag_list, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
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