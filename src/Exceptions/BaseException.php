<?php
/**
 * Created by IntelliJ IDEA.
 * User: zfm
 * Date: 2018/12/10
 * Time: 1:35 PM
 */

namespace Ifucloud\Signature\Exception;

use JsonSerializable;
use Exception;

class BaseException extends Exception implements JsonSerializable
{
    /**
     * BaseException constructor.
     * @param string $prefix
     * @param string $config
     * @param null $message
     * @param null $code
     */
    public function __construct($prefix = 'system', $config = '', $message = null, $code = null){
        $exception = config("exceptions.{$prefix}.{$config}");
        $code  = is_null($code)? $exception['code'] : $code;
        $message = is_null($message) ? $exception['message'] : $message;
        parent::__construct($message, $code);
    }

    /**
     * 序列化错误信息
     * @return array|mixed
     */
    public function jsonSerialize(){
        return [
            'errCode' => $this->getCode(),
            'message' => $this->getMessage()
        ];
    }

    /**
     * 设置错误提示
     * @param $message
     */
    public function setMessage($message){
        $this->message = $message;
    }

    /**
     * 设置错误代号
     * @param $code
     */
    public function setCode($code){
        $this->code = $code;
    }
}
