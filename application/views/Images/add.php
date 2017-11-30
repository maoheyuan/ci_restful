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
                    <h4>图片新增</h4>
                </div>
            </div>

            <div class="row-fluid form-wrapper">
                <!--  column -->
                <div class="span12 column" style="margin-left: 30px;margin-top: 20px;">
                    <?php echo form_open_multipart('/Images/add',array("class"=>"inline-input")) ?>
                    <div class="errortip"><?php echo form_error('error_tip'); ?></div>

                    <div class="span12 field-box textarea">
                        <label>图片:</label>
                        <input class="span10" type="file" name="image" />
                        <div class="errortip"><?php echo form_error('image'); ?></div>
                    </div>



                    <div class="span10 field-box actions" style="text-align: right;">
                        <input type="submit" class="btn-glow primary" value="新增" />
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
