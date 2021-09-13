<?php
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT',$_SERVER['DOCUMENT_ROOT'].DS.'work'.DS.'mosque'.DS);
    require_once(SITE_ROOT.'admin'.DS.'session'.DS.'session.php');
    $data = Session::getInstance();
    $pageTitle ="test";