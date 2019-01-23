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
<div style="position: relative;width: 100%;background-color: #FFFFFF;z-index: 1000">
    <div class="container">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">程序已成功安装</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li class="shop">
                        <div class="ico"></div>
                        <h5><a href="<?php echo $auto_site_url; ?>" target="_blank">首页</a></h5>
                        <h6>系统首页</h6>
                    </li>

                    <li class="admin">
                        <div class="ico"></div>
                        <h5><a href="<?php echo $auto_site_url; ?>admin" target="_blank">系统管理</a></h5>
                        <h6>系统后台</h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>