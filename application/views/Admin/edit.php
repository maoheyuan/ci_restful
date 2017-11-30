<style>
    .errortip{
        color: red;
    }
</style>
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
                    <h4>管理员修改</h4>
                </div>
            </div>

            <div class="row-fluid form-wrapper">
                <!--  column -->
                <div class="span12 column" style="margin-left: 30px;margin-top: 20px;">

                    <?php echo form_open('/Admin/edit?id='.$admin['id'],array("class"=>"inline-input")) ?>
                    <div class="span12 field-box">
                        <label>管理员名称:</label>
                        <input class="span10" type="text" name="username" value="<?=$admin['username']?>"/>
                        <div class="errortip"><?php echo form_error('username'); ?></div>
                    </div>



                    <div class="span12 field-box">
                        <label>真实姓名:</label>
                        <input class="span10" type="text" name="realname" value="<?=$admin['realname']?>"/>
                        <div class="errortip"><?php echo form_error('realname'); ?></div>
                    </div>



                    <div class="span12 field-box textarea">
                        <label>手机号码:</label>
                        <input class="span10" type="text" name="mobile" value="<?=$admin['mobile']?>"/>
                        <div class="errortip"><?php echo form_error('mobile'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>密码:</label>
                        <input class="span10" type="password" name="password" />
                        <div class="errortip"><?php echo form_error('password'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>确认密码:</label>
                        <input class="span10" type="password" name="rpassword" />
                        <div class="errortip"><?php echo form_error('rpassword'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>状态:</label>
                        <div class="span10">
                            <label class="radio">
                                <input type="radio" name="status" id="status1" value="1" <?php if($admin['status']==1){ echo "checked"; }; ?>/>
                                启用
                            </label>
                            <label class="radio">
                                <input type="radio" name="status" id="status2" value="2" <?php if($admin['status']==2){ echo "checked"; }; ?>/>
                                禁用
                            </label>
                        </div>
                    </div>
                    <div class="errortip"><?php echo form_error('status'); ?></div>
                    <div class="span10 field-box actions" style="text-align: right;">
                        <input type="hidden" class="btn-glow primary" name="id" value="<?=$admin['id']?>" />
                        <input type="submit" class="btn-glow primary" value="修改" />
                        <span>OR</span>
                        <input type="reset" value="重置" class="reset" />
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end main container -->
<script src="/static/js/base.js"></script>