<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return redirect('/index');
});
// 访问量
Route::get('hit/{title}', 'Web\HitController@index');

//主页
Route::get('/index', 'Web\IndexController@index');
Route::get('/index/{slug}', 'Web\IndexController@showSlug');

//auth
Route::get('auth/login', 'Web\AuthController@login');
Route::get('auth/register', 'Web\AuthController@register');
Route::post('auth/register', 'Web\AuthController@register_ajax');

// web项目列表
Route::get('weblist/index01', 'Web\WeblistController@index01');
Route::get('weblist/index02', 'Web\WeblistController@index02');
Route::get('weblist/index03', 'Web\WeblistController@index03');
Route::get('weblist/index04', 'Web\WeblistController@index04');
Route::get('weblist/index05', 'Web\WeblistController@index05');
Route::get('weblist/index06', 'Web\WeblistController@index06');


// 博客
Route::get('blog/cate/{cateid}', 'Web\PostController@cateindex');
Route::resource('blog', 'Web\PostController');

//分类列表
Route::get('categories', 'Web\CategoryController@index');


//后台
Route::get('admin', function () {
    return redirect('admin/index');
});

//Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {
Route::group(['namespace' => 'Admin'], function () {
    Route::get('admin/auth/login', 'AuthController@login');
    Route::post('admin/auth/login', 'AuthController@login');
    Route::get('admin/auth/logout', 'AuthController@logout');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'adminAuth'], function () {
    Route::get('admin/auth/userlist', 'AuthController@userlist');
    Route::get('admin/auth/adduser', 'AuthController@adduser_index');
    Route::post('admin/auth/adduser', 'AuthController@adduser');
    Route::get('admin/auth/captcha', 'AuthController@captcha');

    // 主页
    Route::get('admin/index', 'IndexController@index');
    // 文章管理
    Route::get('admin/post/destoried_index', 'PostController@destoried_index');
    Route::resource('admin/post', 'PostController');
    Route::post('admin/post/hs/{id}', 'PostController@destoried_delete');

    // 标签
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/weblist', 'WebegListController');
    // 上传
    Route::get('admin/upload', 'UploadController@index');
    Route::get('admin/upload/folder/{folder}', 'UploadController@indexFoler');
    Route::post('admin/upload/mkdir', 'UploadController@mkdir');
    Route::post('admin/upload/store', 'UploadController@store');
    Route::post('admin/upload/delete', 'UploadController@delete');
    // 分类
    Route::resource('admin/cate', 'CategoryController');
    Route::post('admin/cate/storeajax', 'CategoryController@storeAjax');
//    Route::post('admin/upload/img/{title}', 'UploadController@showimg');

});

Route::auth();

Route::get('/home', 'HomeController@index');
