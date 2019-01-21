<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/1/18
 * Time: 15:51
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
set_time_limit(0);   //设置运行时间
error_reporting(E_ALL & ~E_NOTICE);  //显示全部错误
define('ROOT_PATH', dirname(dirname(__FILE__)));  //定义根目录
define('DBCHARSET', 'UTF8');   //设置数据库默认编码
define('BASE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
require_once __DIR__ . '/helper.php';
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Asia/Shanghai');
}
input($_GET);
input($_POST);
function input(&$data)
{
    foreach ((array)$data as $key => $value) {
        if (is_string($value)) {
            if (!get_magic_quotes_gpc()) {
                $value = htmlentities($value, ENT_NOQUOTES);
                $value = addslashes(trim($value));
            }
        } else {
            $data[$key] = input($value);
        }
    }
}

if (is_file('lock.txt') && $_GET['step'] != 5) {
    @header("Content-type: text/html; charset=UTF-8");
    echo "系统已经安装过了，如果要重新安装，那么请删除install目录下的lock文件";
    exit;
}
$html_title = '程序安装向导';
$sys_name = 'pfinal-cms';
$html_header = '
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <i class="sys_name">' . $sys_name . '</i>
            <div class="header_bottom"><span>程序安装向导</span><span></span><span>版本: 2019.01.18.0001</span></div>
        </div>
    </div>
</div>
';
require(__DIR__ . '/include/function.php');

$html_footer = "

";
if (!in_array($_GET['step'], array(1, 2, 3, 4, 5))) {
    $_GET['step'] = 0;
}

switch (intval($_GET['step'])) {
    case 1:
         require(__DIR__.'/include/var.php');
         env_check($env_items);
         dirfile_check($dirfile_items);
         function_check($func_items);
         break;
    case 3:

        break;
}


include("step_{$_GET['step']}.php");