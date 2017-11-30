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
                        <h4>会员管理</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <form action="/Member/index" method="get">
                            <input type="text" class="search" name="keyword" placeholder="用户名/手机号" id="keyword"/>
                            <a class="btn-flat success new-product" href="/Member/add">+新增</a>
                        </form>


                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span1">
                                Id
                            </th>
                            <th class="span2">
                                会员名称
                            </th>
                            <th class="span2">
                                真实姓名
                            </th>
                            <th class="span2">
                                <span class="line"></span>手机号
                            </th>
                            <th class="span2">
                                <span class="line"></span>账户金额
                            </th>

                            <th class="span2">
                                <span class="line"></span>地址
                            </th>

                            <th class="span2">
                                <span class="line"></span>状态
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($members as $item): ?>
                            <!-- start row -->
                            <tr >
                                <td>
                                    <?=$item['id']?>
                                </td>

                                <td>

                                    <!--   <div class="img">
                                           <img src="/static/img/table-img.png" />
                                       </div>-->
                                    <?=$item['username']?>
                                </td>

                                <td>
                                    <?=$item['realname']?>
                                </td>
                                <td class="description">
                                    <?=$item['mobile']?>
                                </td>
                                <td class="description">
                                    <?=$item['account']?>
                                </td>
                                <td class="description">
                                    <?=$item['address']?>
                                </td>
                                <td>
                                    <span > <?=$item['status']?></span>
                                    <ul class="actions">
                                        <li><a href="/Member/edit?id=<?=$item['id']?>">修改</a></li>
                                        <li class="last"><a href="/Member/delete?id=<?=$item['id']?>">删除</a></li>
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