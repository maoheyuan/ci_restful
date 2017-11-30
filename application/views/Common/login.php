<!DOCTYPE html>
<html class="login-bg">
<head>
    <title>后台管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="/static/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/static/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/static/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/static/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="/static/css/lib/font-awesome.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="/static/css/compiled/signin.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <style>
        .errortip{
            color: red;
            text-align: left;
        }
    </style>
<body>


<form method="post" action="/Common/login">
    <div class="row-fluid login-wrapper">
        <a href="javasrcip:void(0);">
        </a>


        <div class="span4 box">
            <div class="content-wrap">
                <h6>登&nbsp;&nbsp;录</h6>

                <input class="span12" type="text" name="username" placeholder="账号" value="<?=$admin['username']?>" />
                <div class="errortip span12"><?php echo form_error('username'); ?></div>
                <input class="span12" type="password" name="password" placeholder="密码"   value="<?=$admin['password']?>"/>
                <div class="errortip span12"><?php echo form_error('password'); ?></div>
                <a href="#" class="forgot">忘记密码</a>
         <!--       <div class="remember">
                    <input id="remember-me" type="checkbox" />
                    <label for="remember-me">记住我</label>
                </div>-->
                <div class="errortip span12"><?php echo form_error('error_tip'); ?></div>
                <input type="submit" class="btn-glow primary login"  value="提交"/>
            </div>
        </div>
    </div>
</form>
<!-- scripts -->
<script src="/static/js/jquery-latest.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script src="/static/js/theme.js"></script>
</body>
</html>