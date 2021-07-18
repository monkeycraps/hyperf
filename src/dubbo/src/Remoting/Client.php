<?php

namespace Hyperf\Dubbo\Remoting;

use Hyperf\Dubbo\Protocol\Request;

/**
 * @author monkeycraps
 * 
 * client 属于 remoting 
 * 应该支持 spi 扩展不同的 protocol 
 */
interface Client extends Transporter
{
    public function connect();
    public function send(Request $request);
}