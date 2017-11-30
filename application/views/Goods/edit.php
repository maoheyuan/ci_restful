<!-- 配置文件 -->
<script type="text/javascript" src="/static/ueditor1_4_3_3/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/ueditor1_4_3_3/ueditor.all.js"></script>
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
                    <h4>商品修改</h4>
                </div>
            </div>
            <div class="row-fluid form-wrapper">
                <!--  column -->
                <div class="span12 column" style="margin-left: 30px;margin-top: 20px;">

                    <?php echo form_open_multipart('/Goods/edit?id='.$goods['id'],array("class"=>"inline-input")) ?>

                    <div class="errortip"><?php echo form_error('error_tip'); ?></div>
                    <div class="span12 field-box">
                        <label>商品名称:</label>
                        <input class="span10" type="text" name="name" value=" <?=$goods['name']?>" />
                        <div class="errortip"><?php echo form_error('name'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>商品图片:</label>
                        <input class="span10" type="file" name="image" />
                        <div class="errortip"><?php echo form_error('image'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>商品原图片:</label>
                        <img src="/upload/image/goods/<?=$goods['image']?>" style="height: 100px;width: 100px;">
                    </div>
                    <div class="span12 field-box textarea">
                        <label>介简:</label>
                        <input class="span10" type="text"  name="discription" value="<?=$goods['discription']?>"/>
                        <div class="errortip"><?php echo form_error('discription'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>市场价:</label>
                        <input class="span10" type="text" name="market_price" value=" <?=$goods['market_price']?>"/>
                        <div class="errortip"><?php echo form_error('market_price'); ?></div>
                    </div>
                    <div class="span12 field-box">
                        <label>销售价:</label>
                        <input class="span10" type="text" name="sales_price" value=" <?=$goods['sales_price']?>"/>
                        <div class="errortip"><?php echo form_error('sales_price'); ?></div>
                    </div>

                    <div class="span12 field-box">
                        <label>	库存:</label>
                        <input class="span10" type="text" name="stock" value="<?=$goods['stock']?>" />
                        <div class="errortip"><?php echo form_error('stock'); ?></div>
                    </div>

                    <div class="span12 field-box textarea">
                        <label>内容:</label>
                        <textarea class="span10" style="margin-left: 0 !important;" id="container"  name="content" >
                            <?=$goods['content']?>
                        </textarea>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                        </script>

                    </div>
                    <div class="errortip"><?php echo form_error('content'); ?></div>

                    <div class="span12 field-box">
                        <label>状态:</label>
                        <div class="span10">
                            <label class="radio">
                                <input type="radio" name="status" id="status1" value="1" <?php if($goods['status']==1){ echo "checked"; }; ?>/>
                                启用
                            </label>
                            <label class="radio">
                                <input type="radio" name="status" id="status2" value="2" <?php if($goods['status']==2){ echo "checked"; }; ?>/>
                                禁用
                            </label>
                        </div>
                    </div>
                    <div class="errortip "><?php echo form_error('status'); ?></div>

                    <div class="span10 field-box actions" style="text-align: right;">
                        <input type="hidden" name="id" value="<?=$goods['id']?>">
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

