<?php

namespace Hyper\Dubbo\Protocol\Dubbo;

use Hyperf\Dubbo\Protocol\Codec;

/**
 * as follow 
 * ## dubbo protocol 
    1. 0, 32: header
        1. 0, 8: magic high  
        2. 8, 16: magic low 
        3. 16, req/res
        4. 17, 2way
        5. 18, event 
        6. 19, 24, serialization Id 
        7. 24, 32: Status
    2. 32, 96: rpc id 
    3. 96, 128: data length  
    4. 128, ....:
        1. request:
            1. Dubbo version
            2. Service name
            3. Service version
            4. Method name
            5. Method parameter types
            6. Method arguments
            7. Attachments
        2. response: 
            1. value type: null, value, exception 
            2. value: .... 
 */
class DubboCodec implements Codec{

    public function encode(){

        /**
         * versio  
         * 
         */
    }
}