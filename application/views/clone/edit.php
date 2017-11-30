<?php $this->load->view("Common/headerNav");?>
<!-- end navbar -->
<link rel="stylesheet" href="/static/css/compiled/form-showcase.css" type="text/css" />
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
        <div id="pad-wrapper" class="form-page">

            <div class="row-fluid head">
                <div class="span12">
                    <h4>分类新增</h4>
                </div>
            </div>

            <div class="row-fluid form-wrapper">
                <!--  column -->
                <div class="span12 column" style="margin-left: 30px;margin-top: 20px;">
<!--                    <form />

                    <div class="field-box">
                        <label>分类名称:</label>
                        <input class="span10 inline-input" placeholder="分类名称" type="text" />
                    </div>



                    <div class="field-box">
                        <label>状态:</label>
                        <div class="span10">
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" />
                                启用
                            </label>
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                禁用
                            </label>
                        </div>
                    </div>


                    </form>-->


                    <form class="inline-input" />
                    <div class="span12 field-box">
                        <label>分类名称:</label>
                        <input class="span10" type="text" />
                    </div>
                    <div class="span12 field-box">
                        <label>状态:</label>
                        <div class="span10">
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" />
                                启用
                            </label>
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                禁用
                            </label>
                        </div>
                    </div>



                    <div class="span12 field-box">
                        <label>State:</label>
                        <div class="ui-select span10">
                            <select>
                                <option value="AK" />Alaska
                                <option value="HI" />Hawaii
                                <option value="CA" />California
                                <option value="NV" />Nevada
                                <option value="OR" />Oregon
                                <option value="WA" />Washington
                                <option value="AZ" />Arizona
                            </select>
                        </div>
                    </div>





                    <div class="span12 field-box">
                        <label>Company:</label>
                        <input class="span10" type="text" />
                    </div>
                    <div class="span12 field-box">
                        <label>Email:</label>
                        <input class="span10" type="text" />
                    </div>
                    <div class="span12 field-box">
                        <label>Phone:</label>
                        <input class="span10" type="text" />
                    </div>
                    <div class="span12 field-box">
                        <label>Website:</label>
                        <input class="span10" type="text" />
                    </div>

                    <div class="span12 field-box">
                        <label>Address:</label>
                        <div class="address-fields">
                            <input class="span10" type="text" placeholder="Street address" />
                        </div>
                    </div>
                    <div class="span12 field-box">
                        <label></label>
                        <div class="address-fields">
                            <input class="span10 small" type="text" placeholder="City" />
                        </div>
                    </div>
                    <div class="span12 field-box">
                        <label></label>
                        <div class="address-fields">

                            <input class="span10 small" type="text" placeholder="State" />

                        </div>
                    </div>
                    <div class="span12 field-box">
                        <label></label>
                        <div class="address-fields">


                            <input class="span10 small last" type="text" placeholder="Postal Code" />
                        </div>
                    </div>


                    <div class="span12 field-box textarea">
                        <label>Notes:</label>
                        <textarea class="span10"></textarea>
                        <span class="span10 charactersleft">90 characters remaining. Field limited to 100 characters</span>
                    </div>
                    <div class="span11 field-box actions">
                        <input type="button" class="btn-glow primary" value="Create user" />
                        <span>OR</span>
                        <input type="reset" value="Cancel" class="reset" />
                    </div>
                    </form>
                </div>

            </div>
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