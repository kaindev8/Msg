<?php
namespace app\admin\controller;

use think\facade\View;
use app\model\Admin;
use think\Request;

class Login extends Base
{
    public function index(Request $request){
        if (request()->isPost()){
            $data = input('post.');
            $check = $request->checkToken('__token__');
            if (false === $check) {
                return json(['code' => 10001, 'msg' => '令牌数据无效,刷新网页重试!']);
            } elseif (!captcha_check($data['code'])) {
                return json(['code' => 10002, 'msg' => '验证码错误']);
            } else {
                $adminData = Admin::find(1);
                if ($adminData->username != $data['user']) {
                    return json(['code' => 10003, 'msg' => '用户名不存在!']);
                } elseif ($adminData->status == 0) {
                    return json(['code' => 10004, 'msg' => '账号已封禁!']);
                } elseif ($adminData->password != md5($adminData->salt . $data['pass'])) {
                        return json(['code' => 10005, 'msg' => '密码错误!']);
                } else {
                    session('Admin_Login', $data);
                    Admin::where('id', 1)
                        ->update(['logintime' => time(), 'loginip' => $_SERVER['REMOTE_ADDR'], 'token' => token()]);                        
                    return json(['code' => 200, 'msg' => '登录成功!']);
                }
            }
        }else if (session('Admin_Login')) {
            return redirect('/admin');
        }else{
        return View::fetch();
        }
    }

    //注销登录
    public function logout(){
        session('Admin_Login', null);
        return redirect('/admin');
    }

}
