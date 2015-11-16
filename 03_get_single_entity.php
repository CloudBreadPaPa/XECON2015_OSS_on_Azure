<?php
require_once 'vendor\autoload.php';
//ini_set('display_errors', 1);
//error_reporting(~0);

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

// Storage의 connection string 제공
$connectionString = "DefaultEndpointsProtocol=http;AccountName=xecondemo01;AccountKey=<어카운트키>";

// Azure의 table storage를 위한 REST proxy 생성
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

/////////////////////////////////////////////////////////////////
// 03 SELECT 1건 조회 처리
/////////////////////////////////////////////////////////////////
try {
    // 조회
    $result = $tableRestProxy->getEntity("xecondev01", "XECON", "{8B0FD6F9-2F53-4CFB-4FA6-EA049BB1C2BB}");      //guid값
}
catch(ServiceException $e){
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

//결과 조회
$entity = $result->getEntity();
echo $entity->getPartitionKey().":".$entity->getRowKey();

?>