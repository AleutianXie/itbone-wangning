<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Tools\Helper;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Mews\Captcha\Facades\Captcha;

class AuthController extends Controller
{
    private $uinfo;
    //为bread赋值
    private $control;
    protected $fields = [
        'name' => '',
        'email' => '',
        'password' => '',
        'remember_token' => '',
    ];

    public function __construct()
    {
        $this->uinfo = session('user');
        $this->control = array(
            'tit' => '用户管理',
            'url' => 'admin/auth/userlist',
        );
    }

    public function login()
    {
        $name = Input::get('name');
        $password = Input::get('password');
        if (!empty($_POST)) {
            if ($name == '') {
                return redirect('admin/auth/login')->withErrors('请输入用户名或邮箱！');
            }
            if ($password == '') {
                return redirect('admin/auth/login')->withErrors('请输入密码！');
            }
            $user = DB::table('users')->where('name', $name)->orWhere('email', $name)->first();

            if (!$user || md5(md5($password) . 'salt') != $user->password) {
                return redirect('admin/auth/login')->withErrors('用户名或密码错误！');
            }
            //处理下一次自动登录
            if (Input::get('remember')) {
                $ip = $_SERVER["REMOTE_ADDR"];
                $value = Helper::encryption($name . "|" . $ip);
                setcookie('auto', $value, time() + 60 * 60 * 24 * 7, '/');
            }
            // 从session中获取数据...
            // $value = session('key');
            // 存储数据到session...
            session(['user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]]);
            return redirect('admin');
        }
        return view('admin.auth.login')->with(['title'=>'用户登录']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('admin/auth/login');
    }

    public function adduser_index()
    {
        return view('admin.auth.adduser')->with([
            'uinfo' => $this->uinfo,
            'control' => $this->control,
            'title' => '添加用户'
        ]);
    }

    public function adduser(Request $request)
    {
        $captcha = Input::get('captcha');
        if (!Captcha::check($captcha)) {
            return redirect('admin/auth/adduser')->withErrors('验证码错误！');
        }
        if (Input::get('password') != Input::get('repass')) {
            return redirect('admin/auth/adduser')->withErrors('两次输入的密码不一致！');
        }

        $user = new User();
        foreach (array_keys($this->fields) as $field) {
            $user->$field = $request->get($field);
        }
        $user->password = md5(md5(Input::get('password')) . 'salt');
        if ($user->save()) {
            return redirect('admin/auth/userlist');
        } else {
            return redirect('admin/auth/adduser')->withErrors('保存失败');
        }

    }

    public function userlist()
    {
        $keywords = Input::get('keywords');
        if ($keywords) {
            $users = DB::table('users')->where('name', 'like', '%' . $keywords . '%')->orWhere('email', 'like', '%' . $keywords . '%')->paginate(config('blog.admin.users_pagesize'));
            foreach ($users as $user) {
                $user->name = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $user->name);
                $user->email = str_replace($keywords, "<span class='ftred'>" . $keywords . "</span>", $user->email);
            }
        } else {
            $users = DB::table('users')->paginate(config('blog.admin.users_pagesize'));
        }
        return view('admin.auth.userlist')->with([
            'data' => $users,
            'uinfo' => $this->uinfo,
            'keywords' => $keywords,
            'control' => $this->control,
            'title' => '用户列表',
        ]);
    }

    public function captcha()
    {
        return Captcha::create();
    }
}
