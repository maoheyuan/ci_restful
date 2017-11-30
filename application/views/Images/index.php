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
                        <h4>图片管理</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                    <form action="/Images/index" method="get">
                        <input type="text" class="search" name="keyword" placeholder="Id"/>
                        <a class="btn-flat success new-product" href="/Images/add">+新增</a>
                    </form>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span1">
                               编号
                            </th>

                            <th class="span3">
                                <span class="line"></span>图片
                            </th>
                            
                            <th class="span3">
                                <span class="line"></span>新增时间
                            </th>

                            <th class="span4">
                                <span class="line"></span>修改时间
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($images as $item): ?>
                            <!-- start row -->
                            <tr >
                                <td>
                                    <?=$item['id']?>
                                </td>
                                <td class="description">
                                        <img src="/upload/image/<?=$item['name']?>"  style="height: 50px;width: 50px;"/>
                                </td>
                                <td class="description">
                                    <?=$item['add_time']?>
                                </td>
                                <td>
                                    <span > <?=$item['edit_time']?></span>
                                    <ul class="actions">
                                        <li><a href="/Images/edit?id=<?=$item['id']?>">修改</a></li>
                                        <li class="last"><a href="/Images/delete?id=<?=$item['id']?>">删除</a></li>
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

