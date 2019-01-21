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
    <script> require(['jquery', 'bootstrap'])</script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php echo $html_header; ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Step.4 安装数据库
                <small>正在执行数据库安装</small>
            </h3>
        </div>
        <div class="panel-body">
            <div class="procedure-nav" id="step4">

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
        </div>
    </div>
</body>
</html>