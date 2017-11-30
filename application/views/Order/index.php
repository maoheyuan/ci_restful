

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
                        <h4>订单管理</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <form action="/Order/index" method="get">
                        <input type="text" class="search"  name="keyword" placeholder="订单编号/收货人姓名/收货人手机"/>
                        </form>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span1">
                                ID
                            </th>

                            <th class="span1">
                                订单编号
                            </th>
                            <th class="span1">
                                <span class="line"></span>收货人姓名
                            </th>
                            <th class="span1">
                                <span class="line"></span>收货人手机
                            </th>
                            <th class="span1">
                                <span class="line"></span>收货地址
                            </th>
                            <th class="span1">
                                <span class="line"></span>销售价格
                            </th>
                            <th class="span1">
                                <span class="line"></span>支付类型
                            </th>

                            <th class="span1">
                                <span class="line"></span>支付金额
                            </th>
                            <th class="span1">
                                <span class="line"></span>支付时间
                            </th>
                            <th class="span1">
                                <span class="line"></span>新增时间
                            </th>

                            <th class="span2">
                                <span class="line"></span>状态
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($orders as $item): ?>
                            <!-- start row -->
                            <tr >
                                <td>
                                    <?=$item['id']?>
                                </td>

                                <td>
                                    <?=$item['ordersn']?>
                                </td>
                                <td class="description">
                                    <?=$item['name']?>
                                </td>
                                <td class="description">
                                    <?=$item['mobile']?>
                                </td>
                                <td class="description">
                                    <?=$item['address']?>
                                </td>

                                <td class="description">
                                    <?=$item['sales_price']?>
                                </td>
                                <td class="description">
                                    <?=$item['pay_type']?>
                                </td>

                                <td class="description">
                                    <?=$item['pay_money']?>
                                </td>
                                <td class="description">
                                    <?=$item['pay_time']?>
                                </td>

                                <td class="description">
                                    <?=$item['add_time']?>
                                </td>
                                <td>
                                    <span > <?=$item['status']?></span>
                                    <ul class="actions">
                                        <li><a href="/Order/info?id=<?=$item['id']?>">详细</a></li>
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