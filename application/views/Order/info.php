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
            <div class="table-wrapper products-table section" style="margin-bottom: 10px;">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>订单信息</h4>
                    </div>
                </div>
                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                订单编号
                            </th>

                            <th class="span3">
                                <span class="line"></span>收货人姓名
                            </th>
                            <th class="span3">
                                <span class="line"></span>收货人手机
                            </th>

                            <th class="span3">
                                <span class="line"></span>收货地址
                            </th>



                            <th class="span3">
                                <span class="line"></span>销售价格
                            </th>
                            <th class="span3">
                                <span class="line"></span>支付类型
                            </th>

                            <th class="span3">
                                <span class="line"></span>支付金额
                            </th>
                            <th class="span3">
                                <span class="line"></span>支付时间
                            </th>
                            <th class="span3">
                                <span class="line"></span>新增时间
                            </th>

                            <th class="span3">
                                <span class="line"></span>状态
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <?=$order['ordersn']?>
                            </td>
                            <td class="description">
                                <?=$order['name']?>
                            </td>
                            <td class="description">
                                <?=$order['mobile']?>
                            </td>

                            <td class="description">
                                <?=$order['address']?>
                            </td>

                            <td class="description">
                                <?=$order['sales_price']?>
                            </td>


                            <td class="description">
                                <?=$order['pay_type']?>
                            </td>

                            <td class="description">
                                <?=$order['pay_money']?>
                            </td>

                            <td class="description">
                                <?=$order['pay_time']?>
                            </td>
                            <td class="description">
                                <?=$order['add_time']?>
                            </td>
                            <td>
                                <?=$order['status']?>

                            </td>
                        </tr>
                        <!-- row -->

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->

            <!-- start pagination -->
            <div class="table-wrapper products-table section" style="margin-bottom: 10px;">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>订单商品</h4>
                    </div>
                </div>
                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                订单编号
                            </th>
                            <th class="span3">
                                <span class="line"></span>商品编号
                            </th>
                            <th class="span3">
                                <span class="line"></span>商品名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>商品数量
                            </th>

                            <th class="span3">
                                <span class="line"></span>商品原价
                            </th>
                            <th class="span3">
                                <span class="line"></span>销售价格
                            </th>
                            <th class="span3">
                                <span class="line"></span>退货数量
                            </th>

                            <th class="span3">
                                <span class="line"></span>新增时间
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($order_goods as $item): ?>
                            <!-- start row -->
                            <tr >
                                <td>
                                    <?=$item['order_sn']?>
                                </td>
                                <td class="description">
                                    <?=$item['goods_sn']?>
                                </td>
                                <td class="description">
                                    <?=$item['goods_name']?>
                                </td>
                                <td class="description">
                                    <?=$item['goods_num']?>
                                </td>
                                <td class="description">
                                    <?=$item['market_price']?>
                                </td>

                                <td class="description">
                                    <?=$item['sales_price']?>
                                </td>
                                <td class="description">
                                    <?=$item['return_num']?>
                                </td>


                                <td class="description">
                                    <?=$item['add_time']?>
                                </td>

                            </tr>
                            <!-- end row -->
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end pagination -->
        </div>
    </div>
</div>
<!-- end main container -->
<script src="/static/js/base.js"></script>