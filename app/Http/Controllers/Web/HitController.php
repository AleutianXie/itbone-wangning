<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HitController extends Controller
{
//array(24) {
//["DOCUMENT_ROOT"]=>
//string(23) "D:\WWW\itbone1.0\public"
//["REMOTE_ADDR"]=>
//string(3) "::1"
//["REMOTE_PORT"]=>
//string(4) "3670"
//["SERVER_SOFTWARE"]=>
//string(29) "PHP 5.5.30 Development Server"
//["SERVER_PROTOCOL"]=>
//string(8) "HTTP/1.1"
//["SERVER_NAME"]=>
//string(9) "localhost"
//["SERVER_PORT"]=>
//string(4) "8000"
//["REQUEST_URI"]=>
//string(29) "/hit/itbone%E9%A6%96%E9%A1%B5"
//["REQUEST_METHOD"]=>
//string(3) "GET"
//["SCRIPT_NAME"]=>
//string(10) "/index.php"
//["SCRIPT_FILENAME"]=>
//string(33) "D:\WWW\itbone1.0\public\index.php"
//["PATH_INFO"]=>
//string(17) "/hit/itbone首页"
//["PHP_SELF"]=>
//string(27) "/index.php/hit/itbone首页"
//["HTTP_HOST"]=>
//string(14) "localhost:8000"
//["HTTP_CONNECTION"]=>
//string(10) "keep-alive"
//["HTTP_CACHE_CONTROL"]=>
//string(9) "max-age=0"
//["HTTP_ACCEPT"]=>
//string(3) "*/*"
//["HTTP_USER_AGENT"]=>
//string(109) "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
//["HTTP_REFERER"]=>
//string(27) "http://localhost:8000/index"
//["HTTP_ACCEPT_ENCODING"]=>
//string(19) "gzip, deflate, sdch"
//["HTTP_ACCEPT_LANGUAGE"]=>
//string(14) "zh-CN,zh;q=0.8"
//["HTTP_COOKIE"]=>
//string(589) "XSRF-TOKEN=eyJpdiI6Imd0Y1pnNjJtV0hJeDd2QUJqMnVrbWc9PSIsInZhbHVlIjoidG9TRG8zaGVWUGg0WFhIYnJmNzBQYlwvWlJQTHhTcFpncmVHazN1QmFta3M5NzBVMExITEFqaFhzOVBDVlFrcVRIeXdkMEVYK0lMTzNCR2VXXC9ZclpaUT09IiwibWFjIjoiMjA4MzllZWNmZTc4YjJlMjIzYTQ0ZTZjOWU1MTc2M2E0MjAxYTM2NDY0ODkzNzc4MWU4NGZlZTY5ZWM5ZjRmYSJ9; laravel_session=eyJpdiI6Ik1qR05wSkN1TmVsMEVwZVBcL0tTT1wvQT09IiwidmFsdWUiOiJcL2NJS0RhbXE2WHgwck1UTGtmUGZwY2lXTjRmTmE5cHl5NUN3WVhRcVR6eUo0SGdHUGt6VUhSM3BlbEkwWUtObjVVbjZUWUVRYlE5cjFXMjB1Z2IrMEE9PSIsIm1hYyI6ImJlZGQ0ZWY0Njg4ZTA1ODhjMjdjNTI4YTNlMzMxYmM5MDFlZTlhYTQwYWI0NWI2Mjg1MGM0NWY5NTQxNGE5ZjgifQ%3D%3D"
//["REQUEST_TIME_FLOAT"]=>
//float(1464857476.0443)
//["REQUEST_TIME"]=>
//int(1464857476)
//}

    public function index($title)
    {
        // 获取当前ip
        $ip = $_SERVER['REMOTE_ADDR'];
        // 访问页面url
        $url = $_SERVER['HTTP_REFERER'];
        DB::table('hits')->insert(['ip' => $ip, 'page' => $title, 'url' => $url, 'hit' => 1, 'date' => Carbon::now()]);
    }
}
