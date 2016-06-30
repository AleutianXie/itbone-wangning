<?php

namespace App\Http\Controllers\Web;

use App\Model\Weblist;
use App\Model\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        // 取得实例项目列表
//        $weblist = Weblist::orderBy('published_at', 'desc')->paginate(config('blog.hot_posts_per_page'));
        $weblist = Weblist::orderBy('updated_at', 'desc')->paginate(6);
        foreach ($weblist as $item) {
            $item->time_show = date('Y-m-d', strtotime($item->updated_at));
        }

        // 取得热门文章列表
        $posts = Post::where('published_at', '<=', Carbon::now())->where('status','y')->orderBy('hit', 'desc')->paginate(config('blog.web.hot_posts_pageszie'));
        foreach ($posts as $item) {
            $item->tags = explode(',', $item->tags);
            $res = DB::table('categories')->where('id', $item->category)->select('catename')->first();
            if($res){
                $item->catename = $res->catename;
            }
        }
        // 取得热门新闻列表
        $news = Post::leftJoin('categories','posts.category','=','categories.id')->where('categories.catename','News')->where('posts.published_at', '<=', Carbon::now())->where('posts.status','y')->select('posts.*','categories.catename')->orderBy('posts.hit', 'desc')->paginate(config('blog.web.hot_news_pageszie'));

        return view('web.index.index')->with([
            'posts' => $posts,
            'news' => $news,
            'weblist' => $weblist,
            'title' => 'itbone首页'
        ]);
    }
}
