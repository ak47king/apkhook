<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>缥缈轩网络验证 后台管理</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="keywords" content="缥缈轩网络验证系统 软件验证 脚本验证">
    <meta name="description" content="免费的网络验证系统 提卡免费 可以管理多个软件 功能丰富">
    <link rel="stylesheet" href="/Public/css/a100e2e6.app.css">
    <link rel="stylesheet" href="/Public/css/common.css">
    <script src="/Public/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/common.js"></script>
</head>
<style>
    div.form-group {
        margin-bottom: 8px;
    }
</style>
<body>

<nav class="lc-bd ng-scope">
    <nav class="dashboard-subnav navbar  navbar-static-top" role="navigation">
        <div class="container-fluid">
            <ul>
                <li class="logo"><a href="/"  target="_blank"><img src="/Public/image/logo.png" alt="进入官网"></a></li>
                <li class="dropdown" <?php echo ($username==''?'hidden':''); ?>>
                    <a role="button" class="dropdown-toggle user-name" data-toggle="dropdown">
                        <span class="user-name-text">
                            <?php echo ($username); ?>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="/Home/modifypassword">修改密码</a>
                        </li>
                        <li>
                            <a href="/Home/?a=logout">退出登录</a>
                        </li>
                    </ul>
                </li>
                <li class="browser_tip">（如页面显示有问题请使用谷歌或火狐浏览器）</li>
            </ul>
        </div>
    </nav>
</nav>
<div class="left-container">
    <ul class="nav sidenav" style="margin-top:-15px">
        <li>
            <a class="disable" href="javascript:void(0)">商户信息 </a>
            <ul class="nav">
                <li>
                    <a class="<?php echo ($home_selected); ?>" href="/Home">商户概况 </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="disable" href="javascript:void(0)">软件提卡 </a>
            <ul class="nav">
                <li>
                    <a class="<?php echo ($managesoft_selected); ?>" href="/Home/managesoft">软件管理 </a>
                </li>
                <li>
                    <a class="<?php echo ($createcode_selected); ?>" href="/Home/createcode">生成注册码 </a>
                </li>
                <li>
                    <a class="<?php echo ($managecode_selected); ?>" href="/Home/managecode">注册码管理</a>
                </li>
                <li>
                    <a class="<?php echo ($batchopera_selected); ?>" href="/Home/batchopera">批量操作</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="disable" href="javascript:void(0)">其他 </a>
            <ul class="nav">
                <li>
                    <a class="<?php echo ($contact_selected); ?>" href="/Home/contact">联系我们</a>
                </li>
            </ul>
        </li>
    </ul>
</div>

<div class="right-container">
    <form method="get" id="form">
        <label>注册码</label>
        <div class="form-group input-group-half ng-scope">
            <textarea class="form-control ng-pristine ng-valid" rows="10" placeholder="请用回车分隔注册码" name="codes"><?php echo I(codes);?></textarea>
        </div>
        <input type="text" name="op" id="op" hidden>
    </form>
    <button type="button" class="btn btn-primary" onclick="unbind()">解绑</button>
    <button type="button" class="btn btn-primary" onclick="frozen()">冻结</button>
    &emsp;
    <button type="button" class="btn btn-danger" onclick="del()">删除</button>
</div>
</body>
<script>
    function unbind() {
        document.getElementById('op').value = 'unbind';
        document.getElementById('form').submit();
    }
    function frozen() {
        document.getElementById('op').value = 'frozen';
        document.getElementById('form').submit();
    }
    function del() {
        if (confirm("确定要提交?")) {
            document.getElementById('op').value = 'del';
            document.getElementById('form').submit();
        }
    }
</script>
</html>