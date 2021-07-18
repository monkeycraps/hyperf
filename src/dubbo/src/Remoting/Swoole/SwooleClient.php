<?php
namespace Hyperf\Dubbo\Remoting\Swoole;

use Hyperf\Dubbo\Protocol\Request;
use Hyperf\Dubbo\Remoting\Client;
use Swoole\Coroutine\Socket;

/**
 * @author monkeycraps
 */

/**
 * Class SwooleClient
 *
 * 1. php 是多进程的，如果不能共享会很浪费 ？
 * 2. 协程可以共享，只要不阻塞即可，所以每个进程如果有多个连接，就可以并发处理了，但是还是会有可能会阻塞，连接池用完了
 * 3. 和 netty server 之间应该建立几个连接呢 ？
 * 4. dubbo 服务协议，默认单连接，单独一个进程负责发送
 * 5. 如果做的话，是否应该也做这样的设计，单进程好好服务，发送本身就丢给异步做处理，发送者本身如果要同步，自己阻塞等待
 * 6. 进程间共享是否应该
 * 7. 没有server 就是没有环境，就是没有jvm，无法进行协程，这个有点坑 
 *
 * @package Hyperf\Dubbo\Remoting\Swoole
 */
class SwooleClient implements Client
{
    /**
     * @var Socket;
     */
    private $socket;

    public function __construct()
    {
        // int4，tcp，最后的参数 0 不确定 
        $this->socket = new Socket(AF_INET, SOCK_STREAM, 0);
    }

    public function connect()
    {
        $this->socket->connect('192.168.50.221', 20880);
    }

    public function send(Request $request)
    {
        // send to dubbo process
        $socket = $this->socket;
        $requestMessage = "hello\n";
        $n = $socket ->send($requestMessage);

        $data = $socket->recv();

        if($data === false || $data === ''){
            // fail 
            $msg = "errCode: {$socket->errCode}, {$socket->errMsg}\n";
            $socket->close();
            throw new \RuntimeException($msg);
        }
        
        return $data;
    }

}