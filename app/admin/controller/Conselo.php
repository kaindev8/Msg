<?php
namespace app\admin\controller;

use think\facade\View;
use app\model\Message;
use app\model\Admin;

class Conselo extends Base
{
    public function index() {
        //总数
        $tj_z = Message::count();
        //公开的
        $tj_p = Message::where('public', 1)->count();
        //私密的
        $tj_s = Message::where('public', 0)->count();
        $admin = Admin::find(1);
        View::assign([
            'tj_z'      => $tj_z,
            'tj_p'      => $tj_p,
            'tj_s'      => $tj_s,
            'admin'  => $admin
        ]);
        return View::fetch();
    }

    public function submit()
    {
        if (request()->isPost()) {
            $data = input('post.');
            try {
                $db = Admin::find(1);
                if (empty($data['password'])) {
                    foreach ($data as $k => $v) {
                        if ($k == 'password') {
                            unset($data[$k]);
                        }
                    }
                } else {
                    $data['password'] = md5($db['salt'] . $data['password']);
                }
                // halt($data);
                $db->where('id', 1)->update($data);
                return json(['code' => 200, 'msg' => '更新成功']);
            } catch (\Exception $e) {
                return json(['code' => 201, 'msg' => '更新失败']);
            }
        }
    }
}