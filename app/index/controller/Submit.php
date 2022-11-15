<?php
namespace app\index\controller;

use think\Request;
use app\model\Message as MsgModel;

class Submit extends Base
{
    public function index(Request $request) {
        if (request()->isPost()) {
            $data = input('post.');
            $check = $request->checkToken('__token__');
            if (false === $check) {
                return json(['code' => 10001, 'msg' => '令牌数据无效,刷新网页重试!']);
            }else {
                if(isset($data['public'])) {
                    $data['public'] = 1;
                }else{
                    $data['public'] = 0;
                }
                $data['time'] = date("Y-m-d H:i:s");$data['ip'] = $_SERVER['REMOTE_ADDR'];
                $Msg = new MsgModel();
                $res =  $Msg->save($data);
                if ($res) {
                    return json(['code' => 200, 'msg' => '提交成功!', 'time' => date("Y-m-d H:i:s")]);
                } else {
                    return json(['code' => 201, 'msg' => '提交失败!', 'time' => date("Y-m-d H:i:s")]);
                }
            }
        }else{
            return json(['code' => 10001, 'msg' => '提交失败!', 'time' => time()]);
        }
    }
}