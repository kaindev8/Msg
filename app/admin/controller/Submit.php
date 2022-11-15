<?php
namespace app\admin\controller;

use app\model\Config;
use app\model\Admin;
use app\model\Info;

class Submit extends Base
{
    public function index()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $config = Config::find(1);
            $admin = Admin::find(1);
            $info = Info::find(1);
            $config->sitename       = $data['sitename'];
            $config->key            = $data['key'];
            $config->desc           = $data['desc'];
            $config->icp            = $data['icp'];
            $config->cherry         = $data['cherry'];
            $config->music          = $data['music'];
            $admin->qq              = $data['qq'];
            $info->nickname         = $data['nickname'];
            $info->sign             = $data['sign'];

            if ($config->save() && $admin->save() && $info->save()) {
                return json(['code' => 200, 'msg' => '保存成功!']);
            }else {
                return json(['code' => 201, 'msg' => '保存失败!']);
            }

        } else {
            return json(['code' => 1001, 'msg' => 'error', 't' => time()]);
        }
    }
}