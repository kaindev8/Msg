<?php

namespace app\admin\controller;

use think\facade\View;
use app\model\Message as Msg;
use think\facade\Db;

class Message extends Base
{
    public function index()
    {
        return View::fetch();
    }

    public function data()
    {
        $q = input('get.realName');
        if (isset($q)) {
            $msg = Msg::where('nickname', $q)->select();
            return json([
                'code'      => 0,
                'msg'       => '...',
                'count'     => Msg::count(),
                'data'      => $msg
            ]);
        }
        $msg = Msg::select();
        return json([
            'code'      => 0,
            'msg'       => '...',
            'count'     => Msg::count(),
            'data'      => $msg
        ]);
    }
    
    //单个删除
    public function remove()
    {
        if (request()->isPost()) {
            $msg = Msg::destroy(input('post.')['id']);
            if ($msg) {
                return json(['code' => 200, 'msg' => '删除成功!']);
            }else {
                return json(['code' => 10001, 'msg' => '删除失败!']);
            }
        } else {
             return json(['code' => 10001, 'msg' => '操作失败!']);
        }
    }

    //批量删除
    public function batchRemove()
    {
        if (request()->isPost()) {
            $data = explode(",", input('post.id'));
            $del = Msg::destroy($data);
            if ($del) {
                return json(['code' => 200, 'msg' => '删除成功!']);
            } else {
                return json(['code' => 10002, 'msg' => '删除失败!']);
            }
        } else {
            return json(['code' => 10001, 'msg' => '操作失败!']);
        }
    }

    //设置是否公开
    public function public()
    {
        //如果是POST
        if (request()->isPost()) {
            $data = input('post.'); //全部post数据

            if ($data['public'] == 'false') {
                $r = 0;
            } else {
                $r = 1;
            }
            $msg = Db::name('message')
                   ->where('id', $data['id'])
                   ->update(['public' => $r]);
            if ($msg == 1) {
                return json(['code' => 200, 'msg' => '修改成功!']);
            } else {
                return json(['code' => 10001, 'msg' => $msg]);
            }
        } else {
            return json(['code' => 10001, 'msg' => '操作失败!']);
        }
    }
}