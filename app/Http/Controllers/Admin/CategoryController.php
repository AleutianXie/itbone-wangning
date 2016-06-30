<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Tag;
use App\Tools\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    private $uinfo;
    //为bread赋值
    private $control;

    public function __construct()
    {
        $this->uinfo = session('user');
        $this->control = array(
            'tit' => '分类管理',
            'url' => 'admin/cate',
        );
    }

    protected $fields = [
        'catename' => '',
        'describe' => '',
        'icon' => '',
    ];

    /**
     * 发布文章页面(ajax)添加分类
     * @return 状态值和全部分类
     */
    public function storeAjax()
    {
        $catename = Input::get('catename');
        //判断是否存在此分类
        $res = DB::table('category')->where('catename', $catename)->first();
        if ($res && count($res) > 0) {
            echo json_encode(array('status' => '2'));
        } else {
            $id = DB::table('category')->insertGetId([
                'catename' => $catename,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            if ($id) {
                echo json_encode(array('status' => '1', 'data' => array('id' => $id, 'catename' => $catename)));
            } else {
                echo json_encode(array('status' => '0'));
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keywords = Input::get('keywords') ? Input::get('keywords') : '';
        if ($keywords != '') {
            $cates = Category::where('status','y')->where(function ($query) {
                $keywords = Input::get('keywords');
                $query->where('catename', 'like', '%' . $keywords . '%')->orWhere('describe', 'like', '%' . $keywords . '%');
            })->orderBy('updated_at', 'desc')->paginate(config('blog.admin.tags_pagesize'));

            foreach ($cates as $cate) {
                $cate->catename = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $cate->catename);
                $cate->describe = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $cate->describe);
            }
        } else {
            $cates = Category::where('status','y')->orderBy('updated_at', 'desc')->paginate(config('blog.admin.tags_pagesize'));
        }
        return view('admin.category.index')->with([
            'cates' => $cates,
            'title' => '分类列表',
            'control' => $this->control,
            'keywords' => $keywords,
            'uinfo' => $this->uinfo
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
        return view('admin.category.create')->with([
            'data' => $data,
            'title' => '添加分类',
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
    public function store(Requests\CategoryCreateRequest $request)
    {
        $cate = new Category();
        foreach (array_keys($this->fields) as $field) {
            $cate->$field = $request->get($field);
        }
        if ($cate->save()) {
            return redirect('admin/cate');
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
        $cate = Category::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $cate->$field);
        }
        return view('admin.category.edit')->with([
            'data' => $data,
            'title' => '修改分类--' . $data['catename'],
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
    public function update(Requests\CategoryUpdateRequest $request, $id)
    {
        $cate = Category::findOrFail($id);
        foreach (array_keys(array_except($this->fields, ['cate'])) as $field) {
            $cate->$field = $request->get($field);
        }
        if ($cate->save()) {
            return redirect("admin/cate")->withSuccess("Changes saved.");
        } else {
            return redirect("admin/cate")->withSuccess("Changes failed.");
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
        $res = Category::where('id', $id)->update(['status' => 'n']);
        if ($res) {
            return redirect("admin/cate");
        }
    }
}
