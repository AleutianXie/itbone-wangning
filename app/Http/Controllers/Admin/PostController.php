<?php

namespace App\Http\Controllers\Admin;

use App\Model\Post;
use App\Tools\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    private $uinfo;
    //为bread赋值
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
        'abstract' => '',
        'category' => '',
        'tags' => '',
        'imgurl' => '',
        'content' => '',
        'published_at' => ''
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keywords = Input::get('keywords') ? Input::get('keywords') : '';
        if ($keywords) {
            $posts = Post::where('posts.status', 'y')->select('posts.*','categories.id as cateid')->leftJoin('categories', 'posts.category', '=', 'categories.id')->where(function ($query) {
                $keywords = Input::get('keywords');
                $query->where('posts.title', 'like', '%' . $keywords . '%')->orWhere('posts.abstract', 'like', '%' . $keywords . '%')->orWhere('posts.content', 'like', '%' . $keywords . '%');
            })->orderBy('posts.id', 'desc')->paginate(config('blog.admin.posts_pagesize'));

            foreach ($posts as $post) {
                $post->title = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $post->title);
                $post->abstract = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $post->abstract);
                $post->content = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $post->content);
            }
        } else {
            $posts = DB::table('posts')->select('posts.*','categories.id as cateid','categories.catename as catename')->where('posts.status', 'y')->leftJoin('categories', 'posts.category', '=', 'categories.id')->orderBy('posts.id', 'desc')->paginate(config('blog.admin.posts_pagesize'));
        }
        return view('admin.post.index')->with([
            'data' => $posts,
            'uinfo' => $this->uinfo,
            'title' => '文章列表',
            'control' => $this->control,
            'keywords' => $keywords,
            'type' => 'index'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //取出所有Post文件夹的图片
        $images_list = DB::table('uploads')->where('directory', 'Post')->where('uses', 'list')->get();
        $cates = DB::table('categories')->select('id', 'catename', 'describe')->orderBy('catename', 'asc')->get();
        $tags = DB::table('tags')->where('status', 'y')->select('tag')->get();
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $data['tags'] = explode(',', $data['tags']);
        $data['images_list'] = $images_list;
        $data['cates'] = $cates;
        return view('admin.post.create')->with([
            'data' => $data,
            'tags' => $tags,
            'title' => '添加文章',
            'uinfo' => $this->uinfo,
            'control' => $this->control,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * 图片只保存img 的name
     * 取值{{ asset('upload/Post/700300'.$post->imgurl) }}
     * 取值{{ asset('upload/Post/160125'.$post->imgurl) }}
     */
    public function store(Requests\PostRequest $request)
    {
        $post = new Post();
        foreach (array_keys($this->fields) as $field) {
            $post->$field = $request->get($field);
        }
//        echo '<pre>';
//        var_dump($post);die;
        if ($post->save()) {
            return redirect('admin/post');
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
        $post = Post::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $post->$field);
        }
//        // 根据分类id取出对应分类
//        $cate = DB::table('category')->where('id', $post->category)->select('catename')->first();
//        $data['category'] = $cate->catename;
        $cates = DB::table('categories')->select('id', 'catename', 'describe')->orderBy('catename', 'asc')->get();
        // 取出所有标签
        $tags = DB::table('tags')->where('status', 'y')->select('tag')->get();
        //取出Post文件夹的图片
        $images_list = DB::table('uploads')->where('directory', 'Post')->where('uses', 'list')->get();
        $data['tags'] = explode(',', $data['tags']);
        $data['images_list'] = $images_list;
        $data['cates'] = $cates;
        return view('admin.post.edit')->with([
            'data' => $data,
            'tags' => $tags,
            'title' => '修改文章',
            'uinfo' => $this->uinfo,
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
    public function update(Requests\PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        foreach (array_keys($this->fields) as $field) {
            $post->$field = $request->get($field);
//            echo $request->get($field);echo '<hr>';
        }
//        unset($post->imgurl);
//        $urls = explode(',', $request->get('imgurl'));
//        $post->listimgurl = $urls[1];
//        $post->titleimgurl = $urls[0];
        if ($post->save()) {
            return redirect("admin/post")->withSuccess("Changes saved.");
        } else {
            return redirect("admin/post")->withErrors("Changes failed.");
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
        $res = Post::where('id', $id)->update(['status' => 'n']);
        if ($res) {
            return redirect("admin/post");
        }
    }

    /**
     * 回收站
     * @return $this
     */
    public function destoried_index()
    {
        $keywords = Input::get('keywords');
        if ($keywords) {
            $posts = Post::where('status', 'n')->where(function ($query) {
                $keywords = Input::get('keywords');
                $query->where('title', 'like', '%' . $keywords . '%')->orWhere('abstract', 'like', '%' . $keywords . '%')->orWhere('content', 'like', '%' . $keywords . '%');
            })->orderBy('id', 'desc')->paginate(config('blog.admin.posts_pagesize'));

            foreach ($posts as $post) {
                $post->title = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $post->title);
                $post->abstract = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $post->abstract);
                $post->content = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $post->content);
            }
        } else {
            $posts = Post::where('status', 'n')->orderBy('id', 'desc')->paginate(config('blog.admin.posts_pagesize'));
        }
        return view('admin.post.index')->with([
            'data' => $posts,
            'uinfo' => $this->uinfo,
            'title' => '回收站',
            'keywords' => $keywords,
            'type' => 'hs',
            'control' => $this->control,
        ]);
    }

    /**
     * 回收站删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destoried_delete($id)
    {
        $res = Post::where('id', $id)->delete();
        if ($res) {
            return redirect("admin/post/destoried_index");
        }
    }
}
