<?php
declare (strict_types = 1);

namespace app\admin\middleware;


class Check
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        //判断登录状态
        //如果session为空 && login不在pathinfo里
        if (empty(session('Admin_Login')) && !preg_match('/login/', $request->pathinfo())) {
            return redirect((string) url("login/"));
        }
        return $next($request);
        //
    }
}
