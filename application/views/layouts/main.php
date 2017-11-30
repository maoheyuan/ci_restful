<!DOCTYPE html>
<html>
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
    <link href="/static/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <!-- this page specific styles -->
    <link rel="stylesheet" href="/static/css/compiled/tables.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <link rel="stylesheet" href="/static/css/compiled/tables.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="/static/css/compiled/form-showcase.css" type="text/css" />

    <!-- scripts -->
    <script src="/static/js/jquery-latest.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/theme.js"></script>
    <script src="/static/js/jquery-ui-1.10.2.custom.min.js"></script>
<body>

<!-- navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="brand" href="index.html"><img src="/static/img/logo1.png" /></a>
        <ul class="nav pull-right">
            <li class="notification-dropdown hidden-phone">
                <a href="#" class="trigger">
                    <i class="icon-envelope-alt"></i>
                    <span class="count">8</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                    <?php
                        $admin= $this->session->userdata('admin');
                        echo $admin["username"]?$admin["username"]:"";
                    ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/Admin/self"><i class="icon-share-alt"></i>&nbsp;个人信息</a></li>

                    <li><a href="/Common/loginOut"> <i class="icon-share-alt"></i><span>&nbsp;退出</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end navbar -->



<!-- start sidebar-nav -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <?php if ($controller== 'Index'): ?>
    <li class="active">
    <div class="pointer">
        <div class="arrow"></div>
        <div class="arrow_border"></div>
    </div>
    <?php else: ?>
        <li>
            <?php endif; ?>
            <a href="/Index/index">
                <i class="icon-home"></i>
                <span>主&nbsp;&nbsp;页</span>
            </a>
        </li>
        <?php if ($controller== 'Category'): ?>
    <li class="active">
    <div class="pointer">
        <div class="arrow"></div>
        <div class="arrow_border"></div>
    </div>
    <?php else: ?>
        <li>
            <?php endif; ?>
            <a href="/Category/index">
                <i class="icon-folder-open-alt"></i>
                <span>分类管理</span>
            </a>
        </li>

        <?php if ($controller== 'Goods'): ?>

    <li class="active">
    <div class="pointer">
        <div class="arrow"></div>
        <div class="arrow_border"></div>
    </div>

    <?php else: ?>
        <li>
            <?php endif; ?>



            <a href="/Goods/index">
                <i class="icon-spinner"></i>
                <span>商品管理</span>
            </a>
        </li>


        <?php if ($controller== 'Member'): ?>

    <li class="active">
    <div class="pointer">
        <div class="arrow"></div>
        <div class="arrow_border"></div>
    </div>

    <?php else: ?>
        <li>
            <?php endif; ?>

            <a href="/Member/index">
                <i class="icon-user-md"></i>
                <span>会员管理</span>
            </a>
        </li>




<!--        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="/Images/index">
                <i class="icon-picture"></i>
                <span>图片管理</span>
            </a>
        </li>
-->


        <?php if ($controller== 'Order'): ?>

    <li class="active">
    <div class="pointer">
        <div class="arrow"></div>
        <div class="arrow_border"></div>
    </div>

    <?php else: ?>
        <li>
            <?php endif; ?>
            <a href="/Order/index">
                <i class="icon-check"></i>
                <span>订单管理</span>
            </a>
        </li>

        <?php if ($controller== 'Admin'): ?>

    <li class="active">
    <div class="pointer">
        <div class="arrow"></div>
        <div class="arrow_border"></div>
    </div>
    <?php else: ?>
        <li>
            <?php endif; ?>
            <a href="/Admin/index">
                <i class="icon-user"></i>
                <span>管理员管理</span>
            </a>
        </li>
        <?php if ($controller=='Logs'): ?>

    <li class="active">
    <div class="pointer">
        <div class="arrow"></div>
        <div class="arrow_border"></div>
    </div>
    <?php else: ?>
        <li>
            <?php endif; ?>

            <a href="/Logs/index">
                <i class="icon-calendar"></i>
                <span>日志管理</span>
            </a>
        </li>

        <?php if ($controller== 'Config'): ?>
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <?php else: ?>
        <li>
            <?php endif; ?>
            <a href="/Config/index">
                <i class="icon-cog"></i>
                <span>系统设置</span>
            </a>
        </li>
    </ul>
</div>

<!-- end sidebar-nav -->

<div>
    <?php echo $content; ?>
</div>


</body>
</html>