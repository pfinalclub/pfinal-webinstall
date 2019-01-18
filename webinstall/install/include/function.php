<?php
/**
 * Created by PhpStorm.
 * User: 运营部
 * Date: 2019/1/18
 * Time: 16:20
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
function env_check(&$env_items)
{
    $env_items[] = array('name' => '操作系统', 'min' => '无限制', 'good' => 'linux', 'cur' => PHP_OS, 'status' => 1);
    $env_items[] = array('name' => 'PHP版本', 'min' => '5.3', 'good' => '5.3', 'cur' => PHP_VERSION, 'status' => (PHP_VERSION < 5.3 ? 0 : 1));
    $tmp = function_exists('gd_info') ? gd_info() : array();
    preg_match("/[\d.]+/", $tmp['GD Version'], $match);
    unset($tmp);
    $env_items[] = array('name' => 'GD库', 'min' => '2.0', 'good' => '2.0', 'cur' => $match[0], 'status' => ($match[0] < 2 ? 0 : 1));
    $env_items[] = array('name' => '附件上传', 'min' => '未限制', 'good' => '2M', 'cur' => ini_get('upload_max_filesize'), 'status' => 1);
    $disk_place = function_exists('disk_free_space') ? floor(disk_free_space(ROOT_PATH) / (1024 * 1024)) : 0;
    $env_items[] = array('name' => '磁盘空间', 'min' => '100M', 'good' => '>100M', 'cur' => empty($disk_place) ? '未知' : $disk_place . 'M', 'status' => $disk_place < 100 ? 0 : 1);
}

function dirfile_check(&$dirfile_items)
{
    foreach ($dirfile_items as $key => $val) {
        //var_dump($val);exit;
        $val_path = '/' . $val['path'];
        if ($val['type'] == 'dir') {
            if (!dir_writeable(ROOT_PATH . $val_path)) {
                if (is_dir(ROOT_PATH . $val_path)) {
                    $dirfile_items[$key]['status'] = 0;
                    $dirfile_items[$key]['current'] = '+r';
                } else {
                    $dirfile_items[$key]['status'] = -1;
                    $dirfile_items[$key]['current'] = 'nodir';
                }
            } else {
                $dirfile_items[$key]['status'] = 1;
                $dirfile_items[$key]['current'] = '+r+w';
            }
        } else {
            if (file_exists(ROOT_PATH . $val_path)) {
                if (is_writable(ROOT_PATH . $val_path)) {
                    $dirfile_items[$key]['status'] = 1;
                    $dirfile_items[$key]['current'] = '+r+w';
                } else {
                    $dirfile_items[$key]['status'] = 0;
                    $dirfile_items[$key]['current'] = '+r';
                }
            } else {
                if ($fp = @fopen(ROOT_PATH . $val_path)) {
                    //TODO 检测权限
                }
            }
        }
    }
}


function dir_writeable($dir)
{
    $writeable = 0;
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    } else {
        @chmod($dir, 0755);
    }
    if (is_dir($dir)) {
        if ($fp = @fopen($dir . '/test.txt', "w")) {
            @fclose($fp);
            @unlink($dir . '/test.txt');
            $writeable = 1;
        } else {
            $writeable = 0;
        }
    }
    return $writeable;
}