<?php $this->load->view("Common/headerNav");?>
<!-- end navbar -->
<link rel="stylesheet" href="/static/css/compiled/tables.css" type="text/css" media="screen" />
<!-- sidebar -->
<?php $this->load->view("Common/sidebarNav");?>
<!-- end sidebar -->
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
                        <h4>分类管理</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <input type="text" class="search"  placeholder="分类名称"/>
                        <a class="btn-flat success new-product">+新增</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                分类名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>新增时间
                            </th>
                            <th class="span3">
                                <span class="line"></span>修改时间
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
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/static/img/table-img.png" />
                                </div>
                                <a href="#" class="name">毛何远 </a>
                            </td>
                            <td class="description">
                              2014-11-12
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td>
                                <span class="label label-success">启用</span>
                                <ul class="actions">
                                    <li><a href="/Category/edit/id/111">修改</a></li>
                                    <li class="last"><a href="/Category/delete/id/111">删除</a></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/static/img/table-img.png" />
                                </div>
                                <a href="#" class="name">毛何远 </a>
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td>
                                <span class="label label-info">禁用</span>
                                <ul class="actions">
                                    <li><a href="#">修改</a></li>
                                    <li class="last"><a href="#">删除</a></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->

                        <!-- row -->
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/static/img/table-img.png" />
                                </div>
                                <a href="#" class="name">毛何远 </a>
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td>
                                <span class="label label-success">启用</span>
                                <ul class="actions">
                                    <li><a href="#">修改</a></li>
                                    <li class="last"><a href="#">删除</a></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/static/img/table-img.png" />
                                </div>
                                <a href="#" class="name">毛何远 </a>
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td>
                                <span class="label label-info">禁用</span>
                                <ul class="actions">
                                    <li><a href="#">修改</a></li>
                                    <li class="last"><a href="#">删除</a></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->

                        <!-- row -->
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/static/img/table-img.png" />
                                </div>
                                <a href="#" class="name">毛何远 </a>
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td>
                                <span class="label label-success">启用</span>
                                <ul class="actions">
                                    <li><a href="#">修改</a></li>
                                    <li class="last"><a href="#">删除</a></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr>
                            <td>
                                <input type="checkbox" />
                                <div class="img">
                                    <img src="/static/img/table-img.png" />
                                </div>
                                <a href="#" class="name">毛何远 </a>
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td class="description">
                                2014-11-12
                            </td>
                            <td>
                                <span class="label label-info">禁用</span>
                                <ul class="actions">
                                    <li><a href="#">修改</a></li>
                                    <li class="last"><a href="#">删除</a></li>
                                </ul>
                            </td>
                        </tr>
                        <!-- row -->

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->

            <!-- start pagination -->
            <div class="pagination pull-right">
                <ul>
                    <li><a href="#">‹</a></li>
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">›</a></li>
                </ul>
            </div>
            <!-- end pagination -->
        </div>
    </div>
</div>
<!-- end main container -->

<!-- scripts -->
<script src="/static/js/jquery-latest.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script src="/static/js/theme.js"></script>
<script src="/static/js/base.js"></script>
</body>
</html>