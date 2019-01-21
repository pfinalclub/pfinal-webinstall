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
            base_url: 'http://localhost/pfinal-webinstall/webinstall/install/'
        };
    </script>
    <script src="./pfinaljs/require.js"></script>
    <script src="./pfinaljs/config.js"></script>
    <script> require(['jquery', 'bootstrap', 'pfinaljs'])</script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php echo $html_header; ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Step.2 选择安装方式
                <small>根据需要选择系统模块完全或手动安装</small>
            </h3>
        </div>
        <div class="panel-body">
            <div class="procedure-nav" id="step2">

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
                    <h3 class="panel-title">选择系统模块</h3>
                </div>
                <div class="panel-body" style="padding-left:50px;">
                    <form class="form-horizontal select_system">
                        <div class="form-group">
<!--                            <label class="system_all">-->
<!--                                <input type="hidden" name="iCheck" value="full" id="radio-1" class="green-radio" checked>-->
<!--                                <span class="label label-info"><i class="fa fa-cogs"></i> 完全安装 pfinalcms系统</span>-->
<!--                            </label>-->
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

