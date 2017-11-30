<!-- main container -->
<div class="content">

    <!-- settings changer -->
    <div class="skins-nav">
        <a href="#" class="skin first_nav selected">
            <span class="icon"></span><span class="text">Default</span>
        </a>
        <a href="#" class="skin second_nav" data-file="css/skins/dark.css">
            <span class="icon"></span><span class="text">Dark skin</span>
        </a>
    </div>

    <div class="container-fluid">
        <div id="pad-wrapper">

            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>管理员管理</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <form action="/Admin/index" method="get">
                        <input type="text" class="search" name="keyword" placeholder="管理员名称/手机号"/>
                        <a class="btn-flat success new-product" href="/Admin/add">+新增</a>
                        </form>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span1">
                                <!-- <input type="checkbox" />-->
                                ID
                            </th>
                            <th class="span2">
                               <!-- <input type="checkbox" />-->
                                管理员名称
                            </th>
                            <th class="span2">
                                <!-- <input type="checkbox" />-->
                                真实姓名
                            </th>
                            <th class="span2">
                                <span class="line"></span>手机号
                            </th>

                            <th class="span2">
                                <span class="line"></span>新增时间
                            </th>
                            <th class="span3">
                                <span class="line"></span>状态
                            </th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($admins as $item): ?>
                            <!-- start row -->
                            <tr >
                                <td>
                                    <!-- <input type="checkbox" />-->
                                    <?=$item['id']?>
                                </td>
                                <td>
                                   <!-- <input type="checkbox" />-->
                                    <!--<div class="img">
                                        <img src="/static/img/table-img.png" />
                                    </div>-->
                                    <?=$item['username']?>
                                </td>
                                <td class="description">
                                    <?=$item['realname']?>
                                </td>

                                <td class="description">
                                    <?=$item['mobile']?>
                                </td>
                                <td class="description">
                                    <?=$item['addtime']?>
                                </td>
                                <td>
                                    <span > <?=$item['status']?></span>
                                    <ul class="actions">
                                        <li><a href="/Admin/edit?id=<?=$item['id']?>">修改</a></li>
                                        <li class="last"><a href="/Admin/delete?id=<?=$item['id']?>">删除</a></li>
                                    </ul>
                                </td>
                            </tr>
                            <!-- end row -->
                        <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->

            <!-- start pagination -->
            <div class="pagination pull-right">
                <?=$page?>
            </div>
            <!-- end pagination -->
        </div>
    </div>
</div>
<!-- end main container -->
<script src="/static/js/base.js"></script>