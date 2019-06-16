<?php
/**
 * Created by IntelliJ IDEA.
 * User: zfm
 * Date: 2019/6/11
 * Time: 下午4:51
 */

namespace Ifucloud\Signature;

use Ifucloud\Signature\Exception\BaseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Closure;

class SignatureMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     */
    public function handle(Request $request, Closure $next)
    {
        // 判断是否需要验证签名
        if (!config('sign.app_sign', false)) {
            return $next($request);
        }
        // unsign接口前缀不校验签名
        $forget = config('sign.forget_prefix', 'unsign/*');
        if ($request->is($forget)) {
            return $next($request);
        }
        // 获取请求中的签名相关信息
        $sign = $request->header('sign') ?: $request->get('sign');;
        $timestamp = $request->header('timestamp') ?: $request->get('timestamp');
        $servertime_end = strtotime("now") + 1800;
        $servertime_start = strtotime("now") - 1800;
        // 验证时间是否错误
        if (!$timestamp || $timestamp < $servertime_start || $timestamp > $servertime_end) {
            throw new BaseException('system', 'signature_error', "请求时间非法！");
        }
        // 验证客户端是否错误
        $clientKey = config('sign.client_key');

        if (!$clientKey) {
            throw new BaseException('system', 'signature_error', "请求客户端非法！");
        }
        // 获取除签名相关数据以外的数据
        $input = $request->input();

        // 判断加密
        $serviceSign = ifu_sign($input, $clientKey, $timestamp);
        if ($sign != $serviceSign) {
            throw new BaseException('system', 'signature_error', '请求签名校验失败');
        }
        return $next($request);
    }
}
