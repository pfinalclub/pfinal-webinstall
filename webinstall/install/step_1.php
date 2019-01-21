<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $html_title; ?></title>
    <script>
        window.pfinaljs = {
            base: './',
            base_url:'http://localhost/pfinal-webinstall/webinstall/install/'
        };
    </script>
    <script src="./pfinaljs/require.js"></script>
    <script src="./pfinaljs/config.js"></script>
    <script> require(['jquery', 'bootstrap'])</script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php echo $html_header; ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Step1 开始安装
                <small>检测服务器环境及文件目录</small>
            </h3>
        </div>
        <div class="panel-body">
            <div class="procedure-nav" id="step1">

                <div class="schedule-ico"><span class="a"></span><span class="b"></span><span class="c"></span><span
                            class="d"></span></div>
                <div class="schedule-point-now"><span class="a"></span><span class="b"></span><span
                            class="c"></span><span class="d"></span></div>
                <div class="schedule-point-bg"><span class="a"></span><span class="b"></span><span
                            class="c"></span><span class="d"></span></div>
                <div class="schedule-line-now"><em></em></div>
                <div class="schedule-line-bg"></div>
                <div class="schedule-text"><span class="a">检查安装环境</span><span class="b">选择安装方式</span><span
                            class="c">创建数据库</span><span
                            class="d">安装</span></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">环境检查</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>项目</th>
                            <th>程序所需</th>
                            <th>最佳配置推荐</th>
                            <th>当前服务器</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($env_items as $v) { ?>
                            <tr>
                                <td><span class="label label-info"><?php echo $v['name'] ?></span></td>
                                <td><?php echo $v['min']; ?></td>
                                <td><?php echo $v['good']; ?></td>
                                <td>
                                    <span class="<?php echo $v['status'] ? 'label label-success' : 'label label-danger no'; ?>"><i></i><?php echo $v['cur']; ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">目录文件权限检查</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>目录文件</th>
                            <th>所需状态</th>
                            <th>当前状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dirfile_items as $k => $v) { ?>
                            <tr>
                                <td><span class="label label-info"><?php echo $v['path'] ?></span></td>
                                <td><span>可写</span></td>
                                <td>
                                    <span class="<?php echo $v['status'] == 1 ? 'label label-success' : 'label label-danger no'; ?>"><?php echo $v['status'] == 1 ? '可写' : '不可写'; ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">函数检查</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>函数名称</th>
                            <th>所需状态</th>
                            <th>当前状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($func_items as $k => $v) { ?>
                            <tr>
                                <td><span class="label label-info"><?php echo $v['name'] ?></span></td>
                                <td><span>可写</span></td>
                                <td>
                                    <span class="<?php echo $v['status'] == 1 ? 'label label-success' : 'label label-danger no'; ?>"><?php echo $v['status'] == 1 ? '支持' : '不支持'; ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="btn-next">
                <a href="install.php" class="btn btn-primary btn-xs">上一步</a><a href="###" id="next"  class="btn btn-primary btn-xs">下一步</a>
            </div>
        </div>
    </div>
</div>
<script>
    require(['jquery','pfinaljs'],function($,pfinaljs){
        $(document).ready(function(){
            $('#next').on('click',function(){
                if (typeof($('.no').html()) == 'undefined'){
                    $(this).attr('href','install.php?step=2');
                }else{
                    pfinaljs.error($('.no').eq(0).parent().parent().find('td:first').text()+' 未通过检测!');
                    $(this).attr('href','###');
                }
            });
        });
    })
</script>
</body>
</html>