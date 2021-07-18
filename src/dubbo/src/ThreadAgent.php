<?php
/**
 * @author monkeycraps
 */

namespace Hyperf\Dubbo;

use Hyperf\Dubbo\Protocol\Request;
use Swoole\Process;
use Swoole\Coroutine;

/**
 * Class ThreadAgent
 *
 * 1. 依赖 swoole pool
 * 2. 提供 remoting io 处理
 * 3. 提供 和 registry 的长连线程容器
 * 4. 和 worker 通过 ipc 调用
 * 5. 
 *
 * @package Hyperf\Dubbo
 */
class ThreadAgent
{
    public function __construct()
    {
        $pool = new Process\Pool(1);

        $pool->set([
            'enable_coroutine' => true, 
        ]);
    }

    

    public function handleRequest(Request $var = null)
    {
        
    }


}