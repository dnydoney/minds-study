<?php


//定义DB
$db_cls_file =  APP_ROOT_PATH."system/db/db.php";
if(file_exists($db_cls_file))
{
    require_once $db_cls_file;
    if(class_exists("mysql_db"))
    {
    if(!file_exists(APP_ROOT_PATH.'public/runtime/app/db_caches/'))
        mkdir(APP_ROOT_PATH.'public/runtime/app/db_caches/',0777);
    $pconnect = false;
    $db = new mysql_db(app_conf('DB_HOST').":".app_conf('DB_PORT'), app_conf('DB_USER'),app_conf('DB_PWD'),app_conf('DB_NAME'),'utf8',$pconnect);
    }
}
//end 定义DB


//定义模板引擎
$tmpl_cls_file = APP_ROOT_PATH.'system/template/template.php';
if(file_exists($tmpl_cls_file))
{
    require_once  $tmpl_cls_file;
    if(class_exists("AppTemplate"))
    {
        if(!file_exists(APP_ROOT_PATH.'public/runtime/app/tpl_caches/'))
            mkdir(APP_ROOT_PATH.'public/runtime/app/tpl_caches/',0777);
        if(!file_exists(APP_ROOT_PATH.'public/runtime/app/tpl_compiled/'))
            mkdir(APP_ROOT_PATH.'public/runtime/app/tpl_compiled/',0777);
        $tmpl = new AppTemplate;
    }       
}
