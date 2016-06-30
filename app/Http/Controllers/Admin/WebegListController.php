<?php

namespace App\Http\Controllers\Admin;

use App\Model\Weblist;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebegListController extends Controller
{
    private $uinfo;
    private $control;

    public function __construct()
    {
        $this->uinfo = session('user');
        $this->control = array(
            'tit' => '文章管理',
            'url' => 'admin/post',
        );
    }

    protected $fields = [
        'title' => '',
        'describe' => '',
        'imgurl' => '',
        'classify' => '',
        'direction' => ''
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Weblist::orderBy('updated_at', 'desc')->paginate(config('blog.admin.weblist_pagesize'));
        return view('admin.weblist.index')->with([
            'data' => $data,
            'uinfo' => $this->uinfo,
            'title' => 'web前端项目管理',
            'control' => $this->control,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.weblist.create')->with([
            'data' => $data,
            'uinfo' => $this->uinfo,
            'title' => '添加项目',
            'control' => $this->control,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $weblist = new Weblist();
        foreach (array_keys($this->fields) as $field) {
            $weblist->$field = $request->get($field);
        }
        if ($weblist->save()) {
            return redirect('admin/weblist');
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
        $data = Weblist::where('id', $id)->firstOrFail();
        return view('admin.weblist.edit')->with([
            'data' => $data,
            'uinfo' => $this->uinfo,
            'title' => '编辑项目-' . $data->title,
            'control' => $this->control,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $weblist = Weblist::findOrFail($id);
        foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
            $weblist->$field = $request->get($field);
        }
        if ($weblist->save()) {
            return redirect("admin/weblist")->withSuccess("Changes saved.");
        } else {
            return redirect("admin/weblist")->withSuccess("Changes failed.");
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
        //
    }
}
