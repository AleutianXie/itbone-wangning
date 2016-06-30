<?php

namespace App\Http\Controllers\Web;

use App\Http\Web\Controllers\ParserController;
use App\Model\Post;
use App\Tools\Parser;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;       

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())->orderBy('hit', 'desc')->paginate(config('blog.web.posts_list_pagesize'));
        $cates = DB::table('categories')->get();
        foreach ($posts as $item) {
            $item->tags = explode(',', $item->tags);
            $res = DB::table('categories')->where('id', $item->category)->select('catename')->first();
            if ($res) {
                $item->catename = $res->catename;
            }
        }
        return view('web.blog.index')->with([
            'posts' => $posts,
            'cates' => $cates,
            'cateid' => 'no',
            'title' => 'itbone文章列表'
        ]);
    }

    public function cateindex($cateid)
    {
        $posts = DB::table('posts')->select('posts.*','categories.id as cateid','categories.catename as catename')->where('posts.published_at', '<=', Carbon::now())->where('posts.category', $cateid)->leftJoin('categories', 'posts.category', '=', 'categories.id')->orderBy('posts.hit', 'desc')->paginate(config('blog.web.posts_list_pagesize'));
        $cates = DB::table('categories')->get();
        foreach ($posts as $item) {
            $item->tags = explode(',', $item->tags);
            $res = DB::table('categories')->where('id', $item->category)->select('catename')->first();
            if ($res) {
                $item->catename = $res->catename;
            }
        }

        return view('web.blog.index')->with([
            'posts' => $posts,
            'cates' => $cates,
            'cateid' => $cateid,
            'title' => 'itbone文章列表'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $markdown = new Parser();
        $post = Post::where('id', $id)->firstOrFail();
        $post->content = $markdown->makeHtml($post->content);
        $post->tags = explode(',', $post->tags);
        $category = DB::table('categories')->select('catename')->where('id', $post->category)->first();
        var_dump($category);
        // 访问一次点击量加1
        $hit = Post::where('id', $id)->update(['hit' => $post->hit + 1]);
        return view('web.blog.show')->with([
            'post' => $post,
            'title' => 'itbone--' . $post->title
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
