<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class IndexController extends Controller
{
    private $uinfo;

    public function __construct()
    {
        $this->uinfo = session('user');
    }

    public function index()
    {
//        但钱控制器方法
//        $action = Route::currentRouteAction();
        // 文章数
        $post_num_t = DB::table('posts')->where('created_at', '<', date("Y-m-d") . ' 23:59:59')->where('created_at', '>', date("Y-m-d") . ' 00:00:00')->count();
        $post_num_y = DB::table('posts')->where('created_at', '<', date("Y-m-d", strtotime("-1 day")) . ' 23:59:59')->where('created_at', '>', date("Y-m-d", strtotime("-1 day")) . ' 00:00:00')->count();
        $post_num_total = DB::table('posts')->count();

        // 分类
        $cate_num_t = DB::table('categories')->where('created_at', '<', date("Y-m-d") . ' 23:59:59')->where('created_at', '>', date("Y-m-d") . ' 00:00:00')->count();
        $cate_num_y = DB::table('categories')->where('created_at', '<', date("Y-m-d", strtotime("-1 day")) . ' 23:59:59')->where('created_at', '>', date("Y-m-d", strtotime("-1 day")) . ' 00:00:00')->count();
        $cate_num_total = DB::table('categories')->count();

        //统计uv pv
        $pv_t = DB::table('hits')->where('date', '<', date("Y-m-d") . ' 23:59:59')->where('date', '>', date("Y-m-d") . ' 00:00:00')->sum('hit');
        $pv_y = DB::table('hits')->where('date', '<', date("Y-m-d", strtotime("-1 day")) . ' 23:59:59')->where('date', '>', date("Y-m-d", strtotime("-1 day")) . ' 00:00:00')->sum('hit');
        $pv_total = DB::table('hits')->sum('hit');
        //uv
        $uv_t = DB::table('hits')->where('date', '<', date("Y-m-d") . ' 23:59:59')->where('date', '>', date("Y-m-d") . ' 00:00:00')->select('ip')->distinct()->get();
        $uv_y = DB::table('hits')->where('date', '<', date("Y-m-d", strtotime("-1 day")) . ' 23:59:59')->where('date', '>', date("Y-m-d", strtotime("-1 day")) . ' 00:00:00')->select('ip')->distinct()->get();
        $uv_total = DB::table('hits')->select('ip')->distinct()->get();


        $statistics = array(
            'post_num_t' => $post_num_t,
            'post_num_y' => $post_num_y,
            'post_num_total' => $post_num_total,

            'cate_num_t' => $cate_num_t,
            'cate_num_y' => $cate_num_y,
            'cate_num_total' => $cate_num_total,

            'pv_t' => $pv_t,
            'pv_y' => $pv_y,
            'pv_total' => $pv_total,
            'uv_t' => count($uv_t),
            'uv_y' => count($uv_y),
            'uv_total' => count($uv_total),


        );
        return view('admin.index.index')->with([
            'uinfo' => $this->uinfo,
            'statistics' => $statistics,
            'title' => '后台主页'
        ]);
    }
}
