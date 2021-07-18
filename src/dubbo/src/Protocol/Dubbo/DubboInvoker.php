<?php
namespace Hyperf\Dubbo\Protocol\Dubbo;

use Hyperf\Dubbo\Protocol\Invoker;
use Hyperf\Dubbo\Remoting\Swoole\SwooleClient;

/**
 * @author monkeycraps
 */

class DubboInvoker implements Invoker
{
    public function invoke()
    {
        // build request message
        $req = new DubboRequest();

        // use transporter to trans
        $client = new SwooleClient();
        $client->connect();

        // 处理 client 选择
        $rs = $client->send($req);
        return $rs;
    }
}