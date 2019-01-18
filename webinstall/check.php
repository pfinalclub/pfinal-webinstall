<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/1/18
 * Time: 15:41
 *
 *
 *                      _ooOoo_
 *                     o8888888o
 *                     88" . "88
 *                     (| ^_^ |)
 *                     O\  =  /O
 *                  ____/`---'\____
 *                .'  \\|     |//  `.
 *               /  \\|||  :  |||//  \
 *              /  _||||| -:- |||||-  \
 *              |   | \\\  -  /// |   |
 *              | \_|  ''\---/''  |   |
 *              \  .-\__  `-`  ___/-. /
 *            ___`. .'  /--.--\  `. . ___
 *          ."" '<  `.___\_<|>_/___.'  >'"".
 *        | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *        \  \ `-.   \_ __\ /__ _/   .-` /  /
 *  ========`-.____`-.___\_____/___.-`____.-'========
 *                       `=---='
 *  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 *           佛祖保佑       永无BUG     永不修改
 *
 */
header("Content-type:text/html;charset=utf-8");
define("ROOT_PATH", str_replace("\\", "/", dirname(__FILE__)));
require_once __DIR__.'/install/helper.php';
//判断是否已安装
if (!is_file(__DIR__."/install/lock.txt") && is_file(__DIR__."/install/install.php")) {
    //echo 123;
//    echo '<pre>';
//    print_r($_SERVER);EXIT;
    $base_url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    @header("location:".$base_url."webinstall/install/install.php");
} else {


}

echo "我的系统";
