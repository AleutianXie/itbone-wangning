<div class="form-group">
    <label for="tag" class="col-sm-2 control-label">Tag</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="tag" id="tag" placeholder="tag" value="{{$data['tag']}}">
    </div>
</div>
<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$data['title']}}">
    </div>
</div>
<div class="form-group">
    <label for="subtitle" class="col-sm-2 control-label">Subtitle</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle" value="{{$data['subtitle']}}">
    </div>
</div>
<div class="form-group">
    <label for="meta_description" class="col-sm-2 control-label">Meta Description</label>
    <div class="col-sm-8">
        <textarea name="meta_description" class="form-control" rows="6" placeholder="Meta Description">{{$data['meta_description']}}</textarea>
    </div>
</div>
<div class="form-group">
    <label for="page_image" class="col-sm-2 control-label">Page Image</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" name="page_image" id="page_image" placeholder="Page Image" value="{{$data['page_image']}}">
    </div>
</div>
<div class="form-group">
    <label for="layout" class="col-sm-2 control-label">Layout</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" name="layout" id="layout" placeholder="layout" value="{{$data['layout']}}">
    </div>
</div>

<div class="form-group">
    <label for="reverse_direction" class="col-sm-2 control-label">Direction</label>
    <div class="radio col-sm-8">
        <label><input type="radio" name="reverse_direction" value="0" @if($data['reverse_direction'] == '0') checked @endif>Normal </label>&nbsp;&nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="reverse_direction" value="1" @if($data['reverse_direction'] == '1') checked @endif>Reversed </label>
    </div>
</div>