<div class="modal fade" id="edit_picture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">修改照片</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="fupload" enctype="multipart/form-data"
                      method="post"
                      action="{{URL::to('schools/' . $school->id . '/editPhoto')}}"
                      autocomplete="off">

                    <!-----Thumbnail Form Input ---->

                    <div class="form-group">
                        {!! Form::label('thumbnail', '上传图片') !!}
                        {!! Form::file('thumbnail') !!}
                    </div>

                    <!----- Form Input ---->

                    <div class = "form-group">
                        {!! Form::submit('上传', ['class' => 'btn btn-primary form-control']) !!}
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>