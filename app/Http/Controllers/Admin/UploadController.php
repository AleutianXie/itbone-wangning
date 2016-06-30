<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    private $uinfo;
    //为bread赋值
    private $control;

    public function __construct()
    {
        $this->uinfo = session('user');
        $this->control = array(
            'tit' => '上传管理',
            'url' => 'admin/upload',
        );
    }

    public function index()
    {
        $files = DB::table('uploads')->where('is_dir', 'y')->orderBy('created_at', 'desc')->paginate(config('blog.admin.upload_folder_pagesize'));
        return view('admin.upload.index')->with([
            'files' => $files,
            'title' => '图片列表',
            'control' => $this->control,
            'folder' => '',
            'uinfo' => $this->uinfo,
            'uploadStatus' => '',
        ]);
    }

    public function indexFoler($folder)
    {
//        $folder = Input::get('folder');
        $files = DB::table('uploads')->where('directory', $folder)->orderBy('created_at')->paginate(config('blog.admin.upload_image_pagesize'));
//        $files->setPath('admin/upload');
        return view('admin.upload.index')->with([
            'files' => $files,
            'title' => '图片列表',
            'control' => $this->control,
            'folder' => $folder,
            'uinfo' => $this->uinfo,
            'uploadStatus' => '',
        ]);
    }

    /**
     * 上传图片
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //判断请求中是否包含name=file的上传文件
        if (!$request->hasFile('file')) {
            exit('上传文件为空！');
        }
        $file = $request->file('file');
        //判断文件上传过程中是否出错
        if (!$file->isValid()) {
            exit('文件上传出错！');
        }
        $newFileName = md5(time() . rand(0, 10000)) . '.' . $file->getClientOriginalExtension();
        $folder = Input::get('folder');
        $type = Input::get('type');
        $post_type = Input::get('post_type');
        $path = 'upload' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR;

        // 目录不存在就创建
        if (!is_dir($path)) {
            mkdir($path);
        }
        if ($folder == 'Post') {
            $sizes = array(
                array(700, 300, 'title'),
                array(160, 125, 'list')
            );
            $res = $this->upload($file, $path, $newFileName, $folder, $sizes);
            if ($res && $post_type == 'post_create') {
                // 发表文章返回文件名
                return $newFileName;
            } else {
                return redirect('admin/upload/folder/' . $folder);
            }
        } else if ($folder == 'Category') {
            $sizes = array(
                array(350, 250, 'web'),
                array(50, 50, 'list')
            );
            $res = $this->upload($file, $path, $newFileName, $folder, $sizes);
            if ($res && $post_type == 'cate_create') {
                // 创建分类返回文件名
                return $newFileName;
            } else {
                return redirect('admin/upload/folder/' . $folder);
            }
        }else if ($folder == 'Banner') {
            $sizes = array(
                array(1920, 600, 'web'),
                array(150, 50, 'list')
            );
            $res = $this->upload($file, $path, $newFileName, $folder, $sizes);
            if ($res && $post_type == 'banner_create') {
                // 创建分类返回文件名
                return $newFileName;
            } else {
                return redirect('admin/upload/folder/' . $folder);
            }
        } else {
            $sizes = array(
                array(80, 80, ''),
                array(50, 50, ''),
                array(30, 30, '')
            );
            $res = $this->upload($file, $path, $newFileName, $folder, $sizes);
        }

        if (!$res && !file_exists($path . '8080' . $newFileName) && !file_exists($path . '5050' . $newFileName) && !file_exists($path . '3030' . $newFileName)) {
            return redirect('admin/upload/folder/' . $folder)->withErrors('文件上传失败！');
        } else {
            return redirect('admin/upload/folder/' . $folder)->withErrors('文件上传成功！');
        }
    }

    /**
     * 新建文件夹
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function mkdir(Request $request)
    {
        if ($request->current_dir == '') {
            $request->current_dir = 'upload';
        }
//        $path = public_path($request->current_dir . '\\' . $request->title);
        $path = $request->current_dir . DIRECTORY_SEPARATOR . $request->title;
        if (!is_dir($path)) {
            if (mkdir($path)) {
                $res = DB::table('uploads')->insert([
                    'title' => $request->title,
                    'type' => 'folder',
                    'is_dir' => 'y',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                if ($res) {
                    return redirect('admin/upload');
                } else {
                    rmdir($path);
                    return redirect('admin/upload')->withErrors('文件夹创建失败');
                }
            }
        } else {
            return redirect('admin/upload')->withErrors('文件夹已存在');
        }
    }

    public function delete()
    {
        $id = Input::get('id');
        $title = Input::get('title');
        $folder = Input::get('folder');
        $res = Storage::delete($folder . '/' . $title);
        if (!$res) {
            return redirect('admin/upload/folder/' . $folder)->withErrors('删除本地文件失败！');
        }
        $result = DB::table('uploads')->where('id', $id)->delete();
        if (!$result) {
            return redirect('admin/upload/folder/' . $folder)->withErrors('删除失败！');
        }
        return redirect('admin/upload/folder/' . $folder);

    }

    /**
     * 上传文件操作
     * @param $file
     * @param $path
     * @param $newFileName
     * @param $folder
     * @param $sizes array (
     *                  array(width1,height1,uses1),
     *                  array(width2,height2,uses2)
     *              )
     * @return bool
     */
    public function upload($file, $path, $newFileName, $folder, $sizes = array())
    {
        if (!is_array($sizes[0])) {
            Image::make($file->getRealPath())->resize($sizes[0], $sizes[1])->save($path . $sizes[0] . $sizes[1] . $newFileName);
            $res = DB::table('uploads')->insert([
                'title' => $newFileName,
                'type' => pathinfo($path . $sizes[0] . $sizes[1] . $newFileName, PATHINFO_EXTENSION),
                'size' => abs(filesize($path . $sizes[0] . $sizes[1] . $newFileName)),
                'imgurl' => $path . $sizes[0] . $sizes[1] . $newFileName,
                'is_dir' => 'n',
                'uses' => $sizes[2],
                'directory' => $folder,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            foreach ($sizes as $size) {
                Image::make($file->getRealPath())->resize($size[0], $size[1])->save($path . $size[0] . $size[1] . $newFileName);
                $res = DB::table('uploads')->insert([
                    'title' => $newFileName,
                    'type' => pathinfo($path . $size[0] . $size[1] . $newFileName, PATHINFO_EXTENSION),
                    'size' => abs(filesize($path . $size[0] . $size[1] . $newFileName)),
                    'imgurl' => $path . $size[0] . $size[1] . $newFileName,
                    'is_dir' => 'n',
                    'uses' => $size[2],
                    'directory' => $folder,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        if ($res) {
            return true;
        } else {
            return false;
        }
    }


}
