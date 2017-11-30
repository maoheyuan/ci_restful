<link rel="stylesheet" href="/static/css/compiled/index.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">

    <!-- settings changer -->
    <div class="skins-nav">
        <a href="#" class="skin first_nav selected">
            <span class="icon"></span><span class="text">Default skin</span>
        </a>
        <a href="#" class="skin second_nav" data-file="/static/css/skins/dark.css">
            <span class="icon"></span><span class="text">Dark skin</span>
        </a>
    </div>

    <div class="container-fluid">

        <!-- upper main stats -->
        <div id="main-stats">
            <div class="row-fluid stats-row">
                <div class="span3 stat">
                    <div class="data">
                        <span class="number"><?=$goods_count?></span>
                        商品
                    </div>
                    <span class="date">所有</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number"><?=$members_count?></span>
                        用户
                    </div>
                    <span class="date">所有</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number"><?=$orders_count?></span>
                        订单
                    </div>
                    <span class="date">所有</span>
                </div>
                <div class="span3 stat last">
                    <div class="data">
                        <span class="number">$<?=$orders_money?></span>
                        销售
                    </div>
                    <span class="date">所有</span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->

        <div id="pad-wrapper">

            <!-- statistics chart built with jQuery Flot -->
            <div class="row-fluid chart">
                <h4>
                    统计
                    <div class="btn-group pull-right">
                       <!-- <button class="glow left">天</button>
                        <button class="glow middle active">月</button>
                        <button class="glow right">年</button>-->
                    </div>
                </h4>
                <div class="span12">
                    <div id="statsChart"></div>
                </div>
            </div>
            <!-- end statistics chart -->
        </div>
    </div>
</div>


<!-- scripts -->




<!-- flot charts -->
<script src="/static/js/jquery.flot.js"></script>
<script src="/static/js/jquery.flot.stack.js"></script>
<script src="/static/js/jquery.flot.resize.js"></script>


<script type="text/javascript">
    $(function () {


        // jQuery Flot Chart
        var visits = [[1, 50], [2, 40], [3, 45], [4, 23],[5, 55],[6, 65],[7, 61],[8, 70],[9, 65],[10, 75],[11, 57],[12, 59]];
        var visitors = [[1, 25], [2, 50], [3, 23], [4, 48],[5, 38],[6, 40],[7, 47],[8, 55],[9, 43],[10,50],[11,47],[12, 39]];

        var plot = $.plot($("#statsChart"),
            [ { data: visits, label: "订单"},
                { data: visitors, label: "销售金额" }], {
                series: {
                    lines: { show: true,
                        lineWidth: 1,
                        fill: true,
                        fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                    },
                    points: { show: true,
                        lineWidth: 2,
                        radius: 3
                    },
                    shadowSize: 0,
                    stack: true
                },
                grid: { hoverable: true,
                    clickable: true,
                    tickColor: "#f9f9f9",
                    borderWidth: 0
                },
                legend: {
                    // show: false
                    labelBoxBorderColor: "#fff"
                },
                colors: ["#a7b5c5", "#30a0eb"],
                xaxis: {
                    ticks: [[1, "-月"], [2, "二月"], [3, "三月"], [4,"四月"], [5,"五月"], [6,"六月"],
                        [7,"七月"], [8,"八月"], [9,"九月"], [10,"十月"], [11,"十一月"], [12,"十二月"]],
                    font: {
                        size: 12,
                        family: "Open Sans, Arial",
                        variant: "small-caps",
                        color: "#697695"
                    }
                },
                yaxis: {
                    ticks:3,
                    tickDecimals: 0,
                    font: {size:12, color: "#9da3a9"}
                }
            });



    });
</script>
<script src="/static/js/base.js"></script>