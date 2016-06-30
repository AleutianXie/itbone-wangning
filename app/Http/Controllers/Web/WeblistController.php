<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WeblistController extends Controller
{
    public function index01(){
        return view('web.weblist.index01.index');
    }
    public function index02(){
        return view('web.weblist.index02.index');
    }
    public function index03(){
        return view('web.weblist.index03.index');
    }
    public function index04(){
        return view('web.weblist.index04.index');
    }
    public function index05(){
        return view('web.weblist.index05.index');
    }
    public function index06(){
        return view('web.weblist.index06.index');
    }
}
