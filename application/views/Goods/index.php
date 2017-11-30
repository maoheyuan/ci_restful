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
                        <h4>商品管理</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <form action="/Goods/index" method="get">
                            <input type="text" class="search" name="keyword" placeholder="商品名称"/>
                            <a class="btn-flat success new-product" href="/Goods/add">+新增</a>
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
                                商品名称
                            </th>
                            <th class="span2">
                                <span class="line"></span>商品描述
                            </th>
                            <th class="span2">
                                <span class="line"></span>商品原价
                            </th>
                            <th class="span1">
                                <span class="line"></span>商品销售价
                            </th>

                            <th class="span1">
                                <span class="line"></span>库存
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
                        <!-- row -->

                        <?php foreach ($goods as $item): ?>
                            <!-- start row -->
                            <tr >
                                <td>
                                    <?=$item['id']?>
                                </td>
                                <td>
                                    <img src="/upload/image/goods/<?=$item['image']?>" style="width: 32px;height: 32px;"/>
                                    <?=$item['name']?>
                                </td>
                                <td class="description">
                                    <?=$item['discription']?>
                                </td>
                                <td class="description">
                                    <?=$item['market_price']?>
                                </td>
                                <td class="description">
                                    <?=$item['sales_price']?>
                                </td>
                                <td class="description">
                                    <?=$item['stock']?>
                                </td>
                                <td class="description">
                                    <?=$item['addtime']?>
                                </td>
                                <td>
                                    <span > <?=$item['status']?></span>
                                    <ul class="actions">
                                        <li><a href="/Goods/edit?id=<?=$item['id']?>">修改</a></li>
                                        <li class="last"><a href="/Goods/delete?id=<?=$item['id']?>">删除</a></li>
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