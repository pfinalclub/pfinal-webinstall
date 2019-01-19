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
            base: './pfinaljs/'
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
                <h3 class="panel-title">Step1 开始安装 <small>检测服务器环境及文件目录</small></h3>
          </div>
          <div class="panel-body">
             <div class="procedure-nav">
                <div class="schedule-ico"> <span class="a"></span><span class="b"></span><span class="c"></span><span class="d"></span></div>
             </div>
          </div>
    </div>
    
</div>
</body>
</html>