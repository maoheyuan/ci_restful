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



        <?php if ($controller== 'Images'): ?>
    <li class="active">
    <div class="pointer">
        <div class="arrow"></div>
        <div class="arrow_border"></div>
    </div>
    <?php else: ?>
        <li>
            <?php endif; ?>

            <a href="/Images/index">
                <i class="icon-picture"></i>
                <span>图片管理</span>
            </a>
        </li>



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