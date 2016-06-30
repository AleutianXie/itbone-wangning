<div class="form-group">
    <label for="title" class="col-sm-2 control-label">标题</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$data['title']}}">
    </div>
</div>
<div class="form-group">
    <label for="abstract" class="col-sm-2 control-label">摘要 </label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="abstract" id="abstract" placeholder="abstract"
               value="{{$data['abstract']}}">
    </div>
</div>
<div class="form-group">
    <label for="category" class="col-sm-2 control-label">分类</label>
    <div id="category" class="col-sm-8">
        @foreach($data['cates'] as $cate)
            <span class="category btn btn-default"
                  @if($cate->id == $data['category']) style="background-color: #5CB85C; color: #FFFFFF; border-color: #5CB85C"
                  @endif cateid="{{ $cate->id }}"
                  onclick="changeBtnColor(this)">{{ $cate->catename }}</span>
        @endforeach
        <span class="btn btn-danger show_confirm_box">添加分类</span>
    </div>
    <input type="hidden" id="cateinput" name="category" value="">
</div>
<div class="form-group" style="margin-top: -10px;">
    <label for="tag" class="col-sm-2 control-label">标签</label>
    <div id="tag" class="col-sm-8">
        @foreach($tags as $tag)
            <span class="tag btn btn-default @if(in_array($tag->tag,$data['tags'])) tag_cur @endif"
                  onclick="changeTagsColor(this)">{{ $tag->tag }}</span>
        @endforeach
        <input type="hidden" id="taginput" name="tags" value="">
    </div>
    <input type="hidden" id="taginput" name="tag" value="">
</div>
<div class="form-group" style="margin-top: -10px;">
    <label for="imgurl" class="col-sm-2 control-label">图片</label>
    <div class="col-sm-8">
        <span class="col-sm-8" style="padding-left: 0">
        <input type="text" class="form-control col-sm-8" name="imgurl" id="imgurl" placeholder="imgurl"
               value="{{$data['imgurl']}}">
            </span>
            <span class="col-sm-4" style="text-align: right">
                <button type="button" class="btn btn-success show_ch_img_box">选择图片</button>
                {{--<button type="button" class="btn btn-info show_up_img_box" onclick="path.click()">上传图片</button>--}}
                <button type="button" class="btn btn-info show_up_img_box">上传图片</button>
            </span>
    </div>
</div>
<div class="form-group bg-info choose_img_box">
    <div class="ch_img_item_list">
        @foreach( $data['images_list'] as $image)
            <div class="ch_img_item">
                <a href="javascript:void(0)" onclick="setImgUrl('{{$image->title}}')" class="thumbnail">
                    <img src="{{asset($image->imgurl)}}" alt="{{ $image->title }}">
                </a>
            </div>
        @endforeach
    </div>
    {{--<div class="cl" style="clear: both"></div>--}}
</div>
<div class="form-group bg-info upload_img_box">
    <label class="col-sm-2 control-label" id="filePicker">选择图片</label>
    <div class="col-sm-8">
        <div id="uploader-demo">
            <!--用来存放item-->
            <div id="fileList" class="uploader-list" style="width: 700px;"></div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="published_at" class="col-sm-2 control-label">发布时间</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="published_at" id="published_at" placeholder="published_at"
               value="{{$data['published_at']}}">
    </div>
</div>
{{--markdown编辑器--}}
<div class="form-group">
    <label for="content" class="col-sm-2 control-label">文章内容</label>
    <div class="col-sm-8">
        <textarea name="content" class="form-control markdown-textarea" data-provide="markdown" rows="6"
                  placeholder="content">{{$data['content']}}</textarea>
    </div>
</div>
{{--markdown编辑器--}}