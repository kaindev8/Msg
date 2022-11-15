<?php
namespace app\admin\controller;

use app\BaseController;
use think\facade\View;
use think\captcha\facade\Captcha;

class Index extends Base
{
    public function index()
    {
        return View::fetch();
    }

    //清除runtime文件夹缓存
    public function delcache()
    {
        $path = root_path() . "runtime";
        delFiles($path);
        return redirect('/admin');
    }

}
