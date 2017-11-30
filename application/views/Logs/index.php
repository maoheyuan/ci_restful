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
                        <h4>日志管理</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <form action="/Logs/index" method="get">
                        <input type="text" class="search" name="keyword"  placeholder="操作内容"/>
                        </form>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span2">
                                编号
                            </th>

                            <th class="span4">
                                <span class="line"></span>操作内容
                            </th>
                            <th class="span2">
                                <span class="line"></span>操作模块
                            </th>

                            <th class="span2">
                                <span class="line"></span>操作人
                            </th>
                            <th class="span2">
                                <span class="line"></span>新增时间
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($logs as $item): ?>
                            <!-- start row -->
                            <tr >
                                <td>
                                    <?=$item['id']?>
                                </td>
                                <td class="description">
                                    <?=$item['content']?>
                                </td>
                                <td class="description">
                                    <?=$item['module']?>
                                </td>
                                <td class="description">
                                    <?=$item['operator']?>
                                </td>

                                <td class="description">
                                    <?=$item['addtime']?>
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