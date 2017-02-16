<?php
return array(
    // '配置项'=>'配置值'
    'DB_PREFIX' => 'hm_', // 数据库表前缀
    'SESSION_AUTO_START' => true,
    'SESSION_PREFIX' => 'Sess_',
    // 'SESSION_TYPE' => 'Redis',
    'SESSION_EXPIRE' => 3600,
    // Redis相关配置
    'REDIS_HOST' => 'bf460836086844ab.m.cnbja.kvstore.aliyuncs.com',
    'REDIS_PORT' => '6379',
    'REDIS_AUTH' => 'bf460836086844ab:cAwejtwT56U7znQxdP',
    'SESSION_TYPE' => 'Db',
    'SESSION_TABLE' => 'think_session'
);