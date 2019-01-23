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
        require(__DIR__ . '/include/var.php');
        env_check($env_items);
        dirfile_check($dirfile_items);
        function_check($func_items);
        break;
    case 3:
        $install_error = '';
        $install_recover = '';
        $demo_data = file_exists('../data/utf8_add.sql') ? true : false;
        $step3_show = true;
        step3($install_error, $install_recover, $step3_show);
        break;
}

include("step_{$_GET['step']}.php");

function step3(&$install_error, &$install_recover, &$step3_show)
{
    global $html_title, $html_header, $html_footer;
    if ($_POST['submitform'] != 'submit') return;
    $db_host = $_POST['db_host'];
    $db_port = $_POST['db_port'];
    $db_user = $_POST['db_user'];
    $db_pwd = $_POST['db_pwd'];
    $db_name = $_POST['db_name'];
    $db_prefix = $_POST['db_prefix'];
    $admin = $_POST['admin'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    if (!$db_host || !$db_port || !$db_user || !$db_pwd || !$db_name || !$db_prefix || !$admin || !$password) {
        $install_error = '<span style="color: red"><small>输入不完整，请检查</small></span>';
    }
    if (strpos($db_prefix, '.') !== false) {
        $install_error .= '<span style="color: red"><small>数据表前缀为空，或者格式错误，请检查</small></span>';
    }
    if (strlen($admin) > 15 || preg_match("/^$|^c:\\con\\con$|　|[,\"\s\t\<\>&]|^游客|^Guest/is", $admin)) {
        $install_error .= '<span style="color: red"><small>非法用户名，用户名长度不应当超过 15 个英文字符，且不能包含特殊字符，一般是中文，字母或者数字</small></span>';
    }
    if ($password != $rpassword) {
        $install_error .= '<span style="color: red"><small>两次密码不一致</small></span>';
    }
    if ($install_error == '') {
        $mysqli = @ new mysqli($db_host, $db_user, $db_pwd, '', $db_port);
        if ($mysqli->connect_error) {
            $install_error = '<span style="color: red"><small>数据库连接失败</small></span>';
            return;
        }

        if ($mysqli->get_server_info() > '5.0') {
            $mysqli->query("CREATE DATABASE IF NOT EXISTS `$db_name` DEFAULT CHARACTER SET " . DBCHARSET);
        } else {
            $install_error = '<span style="color: red"><small>数据库必须为MySQL5.0版本以上</small></span>';
            return;
        }
        if ($mysqli->error) {
            $install_error = $mysqli->error;
            return;
        }
        if ($_POST['install_recover'] != 'yes' && ($query = $mysqli->query("SHOW TABLES FROM $db_name"))) {
            while ($row = mysqli_fetch_array($query)) {
                if (preg_match("/^$db_prefix/", $row[0])) {
                    $install_error = '<span style="color: red"><small>数据表已存在，继续安装将会覆盖已有数据</small></span>';
                    $install_recover = 'yes';
                    return;
                }
            }
        }
        require('step_4.php');
        $step3_show = false;
        $sitepath = strtolower(substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')));
        $sitepath = str_replace('/install', "", $sitepath) . '/';
        $auto_site_url = strtolower('http://' . $_SERVER['HTTP_HOST'] . $sitepath);
        //var_dump($auto_site_url);
        write_config($auto_site_url);
        $_charset = strtolower(DBCHARSET);
        $mysqli->select_db($db_name);
        $mysqli->set_charset($_charset);
        $sql = file_get_contents("../data/{$_charset}.sql");
        //判断是否安装测试数据
        if ($_POST['demo_data'] == '1') {
            $sql .= file_get_contents("../data/{$_charset}_add.sql");
        }
        $sql = str_replace("\r\n", "\n", $sql);
        runquery($sql, $db_prefix, $mysqli);
        showjsmessage('<span class="label label-info">初始化数据</span> ... 成功 ');
        /**
         * 转码
         */
        $sitename = $_POST['site_name'];
        $username = $_POST['admin'];
        $password = $_POST['password'];
        /**
         * 产生随机的md5_key，来替换系统默认的md5_key值
         */
        $md5_key = md5(random(4).substr(md5($_SERVER['SERVER_ADDR'].$_SERVER['HTTP_USER_AGENT'].$db_host.$db_user.$db_pwd.$db_name.substr(time(), 0, 6)), 8, 6).random(10));
        //$mysqli->query("UPDATE {$db_prefix}setting SET value='".$sitename."' WHERE name='site_name'");

        //管理员账号密码
        $mysqli->query("INSERT INTO {$db_prefix}admin (`admin_id`,`admin_name`,`admin_password`,`admin_login_time`,`admin_login_num`,`admin_is_super`) VALUES ('1','$username','". md5($password) ."', '".time()."' ,'0',1);");

        //测试数据
        if ($_POST['demo_data'] == '1'){
            $sql .= file_get_contents("../data/{$_charset}_add.sql");
        }
        //新增一个标识文件，用来屏蔽重新安装
        $fp = @fopen('../lock','wb+');
        @fclose($fp);
        exit("<script type=\"text/javascript\">document.getElementById('install_process').innerHTML = '安装完成，下一步...';document.getElementById('install_process').href='install.php?step=5&sitename={$sitename}&username={$username}&password={$password}';</script>");
        exit();

    } else {
        return;
    }
}

function write_config($url)
{
    extract($GLOBALS, EXTR_SKIP);
    $config = '../data/config.php';
    $configfile = @file_get_contents($config);
    $configfile = trim($configfile);
    $configfile = substr($configfile, -2) == '?>' ? substr($configfile, 0, -2) : $configfile;
    $charset = 'UTF-8';
    $db_host = $_POST['db_host'];
    $db_port = $_POST['db_port'];
    $db_user = $_POST['db_user'];
    $db_pwd = $_POST['db_pwd'];
    $db_name = $_POST['db_name'];
    $db_prefix = $_POST['db_prefix'];
    $admin = $_POST['admin'];
    $password = $_POST['password'];
    $db_type = 'mysql';
    $cookie_pre = strtoupper(substr(md5(random(0, 100) . substr($_SERVER['HTTP_USER_AGENT'] . md5($_SERVER['SERVER_ADDR'] . $db_host . $db_user . $db_pwd . $db_name . substr(time(), 0, 6)), 8, 6) . random(0, 100)), 0, 4)) . '_';
    $configfile = str_replace("===url===", $url, $configfile);
    $configfile = str_replace("===db_prefix===", $db_prefix, $configfile);
    $configfile = str_replace("===db_charset===", $charset, $configfile);
    $configfile = str_replace("===db_host===", $db_host, $configfile);
    $configfile = str_replace("===db_user===", $db_user, $configfile);
    $configfile = str_replace("===db_pwd===", $db_pwd, $configfile);
    $configfile = str_replace("===db_name===", $db_name, $configfile);
    $configfile = str_replace("===db_port===", $db_port, $configfile);
    //var_dump($configfile);
    @file_put_contents('../conf/config.php', $configfile);
}

function runquery($sql, $db_prefix, $mysqli)
{
//  global $lang, $tablepre, $db;
    if (!isset($sql) || empty($sql)) return;
    $sql = str_replace("\r", "\n", str_replace('#__', $db_prefix, $sql));
    $ret = array();
    $num = 0;
    foreach (explode(";\n", trim($sql)) as $query) {
        $ret[$num] = '';
        $queries = explode("\n", trim($query));
        foreach ($queries as $query) {
            $ret[$num] .= (isset($query[0]) && $query[0] == '#') || (isset($query[1]) && isset($query[1]) && $query[0] . $query[1] == '--') ? '' : $query;
        }
        $num++;
    }
    unset($sql);
    foreach ($ret as $query) {
        $query = trim($query);
        if ($query) {
            if (substr($query, 0, 12) == 'CREATE TABLE') {
                $line = explode('`', $query);
                $data_name = $line[1];
                showjsmessage('<span class="label label-info">数据表</span>  ' . $data_name . ' ... 创建成功');
                $mysqli->query(droptable($data_name));
                $mysqli->query($query);
                unset($line, $data_name);
            } else {
                $mysqli->query($query);
            }
        }
    }
}

//抛出JS信息
function showjsmessage($message) {
    echo '<script type="text/javascript">showmessage(\''.addslashes($message).' \');</script>'."\r\n";
    flush();
    ob_flush();
}