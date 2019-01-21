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
                           <label class="system_all">
                               <input type="radio" name="iCheck" value="full" id="radio-1" class="green-radio" checked>
                               <span class="label label-info"><i class="fa fa-cogs"></i> 完全安装 pfinalcms系统</span>
                           </label>
                        </div>
                        <div class="panel panel-default select-module" style="display:block">
                              <div class="panel-heading">
                                    <h3 class="panel-title">选择系统</h3>
                              </div>
                              <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail model_list"> 
                                            <span><i class="fa fa-shopping-bag"></i>  </span>
                                            <div class="caption">
                                                <h4>商城</h4>
                                                <p>商城模块是一套功能完善的多用户商城系统，也是整套电商门户的核心程...</p>
                                                <p><input type="checkbox" name="shop" id="shop" value="1" checked="checked"  disabled=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail model_list">
                                            <span><i class="fa fa-file-archive-o"></i>  </span>
                                            <div class="caption">
                                                <h4>CMS</h4>
                                                <p>CMS模块拥有文章、画报、专题发布等功能，自定义编辑模板,可在文章内容中关联商品...</p>
                                                <p><input type="checkbox" name="cms" id="cms" value="1" checked="checked"  disabled=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail model_list">
                                            <span><i class="fa fa-comments-o"></i>  </span>
                                            <div class="caption">
                                                <h4>圈子</h4>
                                                <p>圈子模块是会员交流互动的理想环境，增强站点人气。主题帖中可与商品关联，特色鲜明...</p>
                                                <p><input type="checkbox" name="circle" id="circle" value="1" checked="checked"  disabled=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail model_list">
                                            <span><i class="fa fa-cart-plus"></i>  </span>
                                            <div class="caption">
                                                <h4>微商城</h4>
                                                <p>微商城模块以新颖的形式展示会员已购商品、实物秀图，提高商品浏览量，促进商城经营...</p>
                                                <p><input type="checkbox" name="microshop" id="microshop" value="1" checked="checked"  disabled=""></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-next">
                        <a href="install.php" class="btn btn-primary btn-xs">上一步</a><a href="###" id="next"  class="btn btn-primary btn-xs">下一步</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script>
        
    </script>
</body>
</html>

