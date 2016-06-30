<?php

namespace App\Http\Controllers\Web;

use App\Tools\Helper;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Mews\Captcha\Facades\Captcha;

class AuthController extends Controller
{
//    protected $fields = [
//        'name' => '',
//        'email' => '',
//        'password' => '',
//        'repass' => '',
//        'sex' => '',
//        'birthday' => '',
//        'captcha' => '',
//    ];

    public function login()
    {
        return view('web/auth/login');
    }

    public function register()
    {
        return view('web/auth/register')->with(['title'=>'用户注册']);
    }

    public function register_ajax(){
        $data = Input::get();
        echo json_encode(array('status'=>'1','data'=>$data));
    }

    public function captcha()
    {
        return Captcha::create();
    }
}
