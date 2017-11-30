<style>
    .errortip{ color: red;}
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
                    <h4>系统设置</h4>
                </div>
            </div>

            <div class="row-fluid form-wrapper">
                <!--  column -->
                <div class="span12 column" style="margin-left: 30px;margin-top: 20px;">

                    <?php echo form_open('/Config/index',array("class"=>"inline-input")) ?>
                    <div class="span12 field-box">
                        <label>域名:</label>
                        <input class="span10" type="text" name="domain" value="<?=$config['domain']?>" placeholder="域名"/>
                        <div class="errortip"><?php echo form_error('domain'); ?></div>
                    </div>

                    <div class="span12 field-box textarea">
                        <label>邮箱:</label>
                        <input class="span10" type="text" name="email" value="<?=$config['email']?>" placeholder="邮箱"/>
                        <div class="errortip"><?php echo form_error('email'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>统计代码:</label>
                        <input class="span10" type="text" name="statistical_code" value="<?=$config['statistical_code']?>" placeholder="统计代码"/>
                        <div class="errortip"><?php echo form_error('statistical_code'); ?></div>
                    </div>
                    <div class="span12 field-box">
                        <label>支付宝APPID:</label>
                        <input class="span10" type="text" name="alipay_appid" value="<?=$config['alipay_appid']?>" placeholder="APPID"/>
                        <div class="errortip"><?php echo form_error('alipay_appid'); ?></div>
                    </div>
                    <div class="span12 field-box">
                        <label>支付宝商户私钥:</label>
                        <input class="span10" type="password" name="alipay_merchant_private_key" value="<?=$config['alipay_merchant_private_key']?>" placeholder="merchant_private_key"/>
                        <div class="errortip"><?php echo form_error('alipay_merchant_private_key'); ?></div>
                    </div>
                    <div class="span12 field-box">
                        <label>支付宝公钥:</label>
                        <input class="span10" type="password" name="alipay_public_key" value="<?=$config['alipay_public_key']?>" placeholder="alipay_public_key"/>
                        <div class="errortip"><?php echo form_error('alipay_public_key'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>微信APPID</label>
                        <input class="span10" type="text" name="weixin_appid" value="<?=$config['weixin_appid']?>" placeholder="APPID"/>
                        <div class="errortip"><?php echo form_error('weixin_appid'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>微信支付商户号:</label>
                        <input class="span10" type="text" name="weixin_mch_id" value="<?=$config['weixin_mch_id']?>" placeholder="mch_id"/>
                        <div class="errortip"><?php echo form_error('weixin_mch_id'); ?></div>
                    </div>
                    <div class="span12 field-box">
                        <label>微信API密钥:</label>
                        <input class="span10" type="text" name="weixin_private_key" value="<?=$config['weixin_private_key']?>" placeholder="API密钥"/>
                        <div class="errortip"><?php echo form_error('weixin_private_key'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>微信Appsecret:</label>
                        <input class="span10" type="text" name="weixin_appsecret" value="<?=$config['weixin_appsecret']?>" placeholder="Appsecret"/>
                        <div class="errortip"><?php echo form_error('weixin_appsecret'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>网站状态:</label>
                        <div class="span10">
                            <label class="radio">
                                <input type="radio" name="status" id="status1" value="1" <?php if($config['status']==1){ echo "checked"; }; ?> />
                                启用
                            </label>
                            <label class="radio">
                                <input type="radio" name="status" id="status2" value="2" <?php if($config['status']==2){ echo "checked"; }; ?>/>
                                禁用
                            </label>
                        </div>
                    </div>
                    <div class="errortip "><?php echo form_error('status'); ?></div>

                    <div class="span10 field-box actions" style="text-align: right;">
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