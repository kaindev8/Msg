<?php
namespace app\index\controller;

use think\facade\View;
use app\model\Info;
use app\model\Config;
use app\model\Message;
use app\model\Admin;
use think\facade\Db;

class Index extends Base
{
    public function index()
    {
        $info = Info::find(1);
        $config = Config::find(1);
        $admin = Admin::find(1);
        $msg_count = Message::where('public', 1)->select()->count();
        //随机一句
        $message = Message::where('public', 1)->orderRaw('rand()')->limit(1)->select();
        View::assign([
            'admin'         => $admin,
            'config'        => $config,
            'info'          => $info,
            'msg_count'     => $msg_count,
            'message'       => $message
        ]);
        return View::fetch();
    }
}
