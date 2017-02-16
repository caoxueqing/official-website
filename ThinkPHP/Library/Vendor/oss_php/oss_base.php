<?php
require_once 'sdk.class.php';
require_once 'util/oss_util.class.php';

//关于endpoint的介绍见, endpoint就是OSS访问的域名
//http://docs.aliyun.com/?spm=5176.7114037.1996646101.11.XMMlZa&pos=6#/oss/product-documentation/domain-region
class AiniaOSSUtil
{
    const endpoint = OSS_ENDPOINT;
    const accessKeyId = OSS_ACCESS_ID;
    const accesKeySecret = OSS_ACCESS_KEY;
    const bucket = OSS_TEST_BUCKET;

    public static function get_oss_client() {
        $oss = new ALIOSS(self::accessKeyId, self::accesKeySecret, self::endpoint);
        return $oss;
    }

    public static function my_echo($msg) {
        $new_line = " \n";
        echo $msg . $new_line;
    }

}
