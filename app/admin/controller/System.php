<?php
namespace app\admin\controller;

use think\facade\View;
use app\model\Config;
use app\model\Admin;
use app\model\Info;

class System extends Base
{
    public function index(){
        $config = Config::find(1);
        $admin = Admin::find(1);
        $info = Info::find(1);
        View::assign([
            'config'    => $config,
            'admin'     => $admin,
            'info'      => $info
        ]);
        return View::fetch();
    }
}
