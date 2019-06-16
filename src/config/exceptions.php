<?php
/**
 * Created by IntelliJ IDEA.
 * User: zfm
 * Date: 2018/7/24
 * Time: 上午10:26
 */

return [
    'system' => [
        'not_found_api' => ['message' => '接口未找到', 'code' => '404'],
        'method_not_allowed' => ['message' => '请求方式拒绝', 'code' => '403'],
        'signature_error' => ['message' => '签名认证失败', 'code' => '10001'],
        'params_error' => ['message' => '参数认证失败', 'code' => '10002'],
        'user_error' => ['message' => '用户认证失败', 'code' => '10003'],
        'service_error' => ['message' => '服务请求失败', 'code' => '10004'],
    ],

    'manage' => [
        'user_not_found' => ['message' => '用户名和密码错误', 'code' => '99901'],
        'authorization' => ['message' => '认证令牌失效', 'code' => '99902'],
        'data_not_found' => ['message' => '数据不存在', 'code' => '99903'],
        'data_not_full' => ['message' => '数据不完整', 'code' => '99904'],
        'not_allow_option' => ['message' => '不允许的操作', 'code' => '99906'],
        'get_address_by_ip_error' => ['message' => '根据IP获取地区失败', 'code' => '99907'],
        'mobile_not_found' => ['message' => '手机号未注册', 'code' => '99908'],
        'no_permission' => ['message' => '无权限操作', 'code' => '99909'],
        'params_validate_error' => ['message' => '参数校验失败', 'code' => '99909'],
    ]
];
