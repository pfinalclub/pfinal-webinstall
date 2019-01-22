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
            <h3 class="panel-title">Step.3 创建数据库
                <small>填写数据库及站点相关信息</small>
            </h3>
        </div>
        <div class="panel-body">
            <div class="procedure-nav" id="step3">
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
        <form class="form-horizontal select_system form-inline" id="install_form" action="" method="post">
            <input type="hidden" value="submit" name="submitform">
            <input type="hidden" value="<?php echo $install_recover; ?>" name="install_recover">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">数据库信息</h3>
                </div>
                <div class="panel-body" style="padding: 50px;">
                    <div class="form-group">
                        <label for="exampleInputEmail1">数据库服务器: </label>
                        <input type="text" name="db_host" maxlength="20"
                               value="<?php echo $_POST['db_host'] ? $_POST['db_host'] : 'localhost'; ?>"
                               class="form-control" data-validation="db_host" data-validation-error-msg="请输入数据库服务器">
                        <small style="color: darkgreen">数据库服务器地址，一般为localhost</small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">数据库名: &nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;
                        <input type="text" name="db_name" maxlength="40"
                               value="<?php echo $_POST['db_name'] ? $_POST['db_name'] : 'pfinal'; ?>"
                               class="form-control" data-validation="db_name" data-validation-error-msg="请输入数据库名">
                        <small style="color: darkgreen"></small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">数据库用户名:</label>
                        <input type="text" name="db_user" maxlength="20"
                               value="<?php echo $_POST['db_user'] ? $_POST['db_user'] : ''; ?>"
                               class="form-control" data-validation="db_user" data-validation-error-msg="请输入数据库用户名">
                        <small style="color: darkgreen"></small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">数据库密码: &nbsp;</label>&nbsp;&nbsp;
                        <input type="text" name="db_pwd" maxlength="20"
                               value="<?php echo $_POST['db_pwd'] ? $_POST['db_pwd'] : ''; ?>"
                               class="form-control" data-validation="db_pwd" data-validation-error-msg="请输入数据库用户名">
                        <small style="color: darkgreen"></small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">数据库表前缀: </label>
                        <input type="text" name="db_prefix" maxlength="20"
                               value="<?php echo $_POST['db_prefix'] ? $_POST['db_prefix'] : 'pfinal_'; ?>"
                               class="form-control" data-validation="db_port" data-validation-error-msg="请输入数据数据库端口">
                        <small style="color: darkgreen">同一数据库运行多个程序时，请修改前缀</small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">数据库端口: &nbsp;</label>&nbsp;&nbsp;
                        <input type="text" name="db_port" maxlength="20"
                               value="<?php echo $_POST['db_port'] ? $_POST['db_port'] : '3306'; ?>"
                               class="form-control" data-validation="db_port" data-validation-error-msg="请输入数据数据库端口">
                        <small style="color: darkgreen">数据库默认端口一般为3306</small>
                    </div>
                    <br>
                    <?php if ($demo_data) { ?>
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="checkbox"
                                   name="demo_data" <?php echo($_POST['demo_data'] == 1 ? 'checked' : ''); ?>
                                   id="demo_data" value="1" class="form-control">
                            <small style="color: darkgreen">安装演示数据</small>
                        </div>
                        <br>
                    <?php } ?>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">网站信息</h3>
                </div>
                <div class="panel-body" style="padding: 50px;">
                    <div class="form-group">
                        <label for="exampleInputEmail1">站点名称: &nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;
                        <input name="site_name" value="<?php echo $_POST['site_name']; ?>" maxlength="100" type="text"
                               class="form-control">
                        <small style="color: darkgreen">输入站点名称，安装后可在平台设置中进行修改</small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">管理员账号: &nbsp;</label>&nbsp;&nbsp;
                        <input name="admin" value="<?php echo $_POST['admin']; ?>" maxlength="20" type="text"
                               class="form-control">
                        <small style="color: darkgreen"></small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">管理员密码: &nbsp;</label>&nbsp;&nbsp;
                        <input name="password" id="password" maxlength="20" value="<?php echo $_POST['password']; ?>"
                               type="password"
                               class="form-control">
                        <small style="color: darkgreen">管理员密码不少于6个字符</small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">重复密码: &nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;
                        <input name="rpassword" value="<?php echo $_POST['rpassword']; ?>" maxlength="20"
                               type="password"
                               class="form-control">
                        <small style="color: darkgreen">确保两次输入的密码一致</small>
                    </div>
                    <br>
                    <?php if ($install_error != '') { ?>
                        <div class="form-group">
                            <label></label>
                            <span class="error"><?php echo $install_error; ?></span>
                        </div>
                        <br>
                    <?php } ?>
                </div>
            </div>
            <div class="panel-footer">
                <div class="btn-next">
                    <a href="install.php?step=2" class="btn btn-primary btn-xs">上一步</a>
                    <button class="btn btn-primary btn-xs" type="submit">下一步</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <!--    <script src="https://cdn.bootcss.com/jquery-validate/1.19.0/jquery.validate.js"></script>-->
    <script src="https://cdn.bootcss.com/iCheck/1.0.2/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        });
        require(['pfinaljs'], function (pfinaljs) {
            pfinaljs.validate("#install_form", {
                errorElement: "font",
                rules: {
                    db_host: {required: true},
                    db_name: {required: true},
                    db_user: {required: true},
                    db_port: {required: true, digits: true},
                    site_name: {required: true},
                    admin: {required: true, lettersonly: true},
                    password: {required: true, minlength: 6},
                    rpassword: {required: true, equalTo: '#password'},
                },
                messages: {
                    db_host: {required: '服务器名称必须'}
                },
                onkeyup: false,
                focusCleanup: false,
                success: "valid",
                debug: true, //调试模式取消submit的默认提交功能
                submitHandler: function (form) {
                    alert("提交表单");
                    console.log(form)
                    return false;
                }
            });
        })
    </script>
</body>
</html>