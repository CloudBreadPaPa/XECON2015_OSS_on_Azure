<?php
require_once 'vendor\autoload.php';
//ini_set('display_errors', 1);
//error_reporting(~0);

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

// https://azure.microsoft.com/ko-kr/documentation/articles/storage-php-how-to-use-table-storage/

// Storage의 connection string 제공
$connectionString = "DefaultEndpointsProtocol=http;AccountName=xecondemo01;AccountKey=<어카운트키>";

// Azure의 table storage를 위한 REST proxy 생성
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

/////////////////////////////////////////////////////////////////
// 01 테이블 생성
/////////////////////////////////////////////////////////////////
try {
    // 테이블 생성
    $tableRestProxy->createTable("xecondev01");
}
catch(ServiceException $e){
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

?>