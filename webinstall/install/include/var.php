<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/1/18
 * Time: 11:38 PM
 * Email: Lampxiezi@163.com
 * Blog:  http://friday-go.cc/
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
 *         佛祖保佑       永无BUG     永不修改
 *
 */
$env_items = [];
$dirfile_items = [
    ['type' => 'dir', 'path' => 'data'],
    ['type' => 'dir', 'path' => 'install']
];

$func_items = [
    ['name' => 'mysqli_connect'],
    ['name' => 'fsockopen'],
    ['name' => 'file_get_contents'],
    ['name' => 'json_encode'],
    ['name' => 'gethostbyname'],
    ['name' => 'curl_init'],
    ['name' => 'mb_convert_encoding']
];