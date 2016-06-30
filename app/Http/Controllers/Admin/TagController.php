<?php

namespace App\Http\Controllers\Admin;

use App\Model\Tag;
use Barryvdh\Debugbar\DataCollector\QueryCollector;
use DebugBar\DebugBar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TagController extends Controller
{
    private $uinfo;
    //为bread赋值
    private $control;

    public function __construct()
    {
        $this->uinfo = session('user');
        $this->control = array(
            'tit' => '标签管理',
            'url' => 'admin/tag',
        );
    }

    protected $fields = [
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '',
        'page_image' => '',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => '0'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keywords = Input::get('keywords');
        if ($keywords) {
            $tags = Tag::where('status', 'y')->where(function ($query) {
                $keywords = Input::get('keywords');
                $query->where('tag', 'like', '%' . $keywords . '%')->orWhere('title', 'like', '%' . $keywords . '%')->orWhere('subtitle', 'like', '%' . $keywords . '%');
            })->orderBy('updated_at', 'desc')->paginate(config('blog.admin.tags_pagesize'));

            foreach ($tags as $tag) {
                $tag->tag = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $tag->tag);
                $tag->title = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $tag->title);
                $tag->subtitle = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $tag->subtitle);
            }
        } else {
            $tags = Tag::where('status', 'y')->orderBy('updated_at', 'desc')->paginate(config('blog.admin.tags_pagesize'));
        }
        return view('admin.tag.index')->with([
            'tags' => $tags,
            'title' => '标签列表',
            'control' => $this->control,
            'keywords' => $keywords,
            'uinfo' => $this->uinfo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 该方法会在点击“添加新标签”或者表单被填充但是验证失败时执行，对于后者我们会将传过来的数据通过 old 方法回写到表单中。
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.tag.create')->with([
            'data' => $data,
            'title' => '添加标签',
            'control' => $this->control,
            'uinfo' => $this->uinfo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TagCreateRequest $request)
    {
        $tag = new \App\Model\Tag();
        foreach (array_keys($this->fields) as $field) {
            $tag->$field = $request->get($field);
        }
        if ($tag->save()) {
            return redirect('admin/tag')->withErrors($tag->tag . "创建成功！");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $tag->$field);
        }
        return view('admin.tag.edit')->with([
            'data' => $data,
            'title' => '修改标签--' . $data['title'],
            'control' => $this->control,
            'uinfo' => $this->uinfo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\TagUpdateRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
            $tag->$field = $request->get($field);
        }
        if ($tag->save()) {
            return redirect("admin/tag")->withSuccess("Changes saved.");
        } else {
            return redirect("admin/tag")->withSuccess("Changes failed.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Tag::where('id', $id)->update(['status' => 'n']);
        if ($res) {
            return redirect("admin/tag");
        }
    }
}
