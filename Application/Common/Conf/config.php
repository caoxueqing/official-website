<?php
return array(
    // '配置项'=>'配置值'
    'AUTOLOAD_NAMESPACE' => array(
        'Addons' => './Addons/'
    ),
    /* 阿里云数据库设置 */

    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'ainia-develop.mysql.rds.aliyuncs.com', // 服务器地址
    'DB_NAME' => 'healthmanager', // 数据库名
    'DB_USER' => 'healthmanager', // 用户名
    'DB_PWD' => 'KDWke34vv8AqtF', // 密码
    'DB_PORT' => '3306', // 端口

    'DB_PARAMS' => array(), // 数据库连接参数
    'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE' => true, // 启用字段缓存
    'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE' => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE' => false, // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM' => 1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO' => '', // 指定从服务器序号
    'SHOW_PAGE_TRACE' => false,
    'SESSION_AUTO_START' => true,
    'SESSION_PREFIX' => 'Sess_',
    // 'SESSION_TYPE' => 'Redis',
    'SESSION_EXPIRE' => 3600,
    'SESSION_TYPE' => 'Db',
    'SESSION_TABLE' => 'think_session',
    // Redis相关配置
    'REDIS_HOST' => 'bf460836086844ab.m.cnbja.kvstore.aliyuncs.com',
    'REDIS_PORT' => '6379',
    'REDIS_AUTH' => 'bf460836086844ab:cAwejtwT56U7znQxdP',
    // 设置缓存的驱动信息
    'DATA_CACHE_TYPE' => 'Db', // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'DATA_CACHE_TABLE' => 'think_cache'
); // 显示调试信息
