<?php $session = $this->request->session(); 

$lang = $session->read('language');

?>

 <?php $session = $this->request->session(); 

       // $sesEmail = $session->read('ses_email');

 ?>

<style>

label#email-error.error{

    color: red;

}
.message{
    float:right;
    margin-right: 20em;
    font-size: 120%;
    color: red;
}

</style>


<nav id="menu">

        <ul>

            <li>

                <a href="<?php echo $this->request->webroot?>"><?php echo __('homepage'); ?></a>

        

            <li><a href="<?php echo $this->request->webroot?>news/listNews"><?php echo __('news.event'); ?></a></li>

            <li><a href="<?php echo $this->request->webroot?>intro/detail"><?php echo __('intro'); ?></a></li>

            <li><a href="#"><?php echo __('label.ser'); ?></a>

                    <ul>

                    <li><a href="<?php echo $this->request->webroot?>ServicesType/detail/1"><?php echo __('connect'); ?></a></li>

                    <li><a href="<?php echo $this->request->webroot?>ServicesType/detail/2"><?php echo __('people'); ?></a></li>

                    <li><a href="<?php echo $this->request->webroot?>ServicesType/detail/3"><?php echo __('work.japan'); ?></a></li>

                </ul>

            </li>

            </li>

            <li><a href="<?php echo $this->request->webroot?>jobs/listJobs"><?php echo __('job'); ?></a></li>

            <li><a href="<?php echo $this->request->webroot?>videos/list_videos"><?php echo __('video'); ?></a></li>

            <li><a href="<?php echo $this->request->webroot?>users/contact"><?php echo __('contact'); ?></a></li>

        </ul>

    </nav>

<div id="wd-footer-container">

    <div class="block-search-footer">

        <div class="container">

            <div class="row">

              <?php if(isset($sesEmail)) { ?>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    <div class="info-register">

                        <h4><?php echo __('register.info') ;?></h4>

                        <p><?php echo __('lastest.success') ;?></p>

                    </div>

                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">             

                        <div class="form-group">

                             <form method = "post" role="form" class="search-footer" action="<?php echo $this->request->webroot?> emails/add" id = "form_email">

                            </form>

                 </div>

                            <?php } else { ?>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    <div class="info-register">

                        <h4><?php echo __('register.info') ;?></h4>

                        <p><?php echo __('lastest.news') ;?></p>

                    </div>

                </div>
                            <div id="ketqua">
                            </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">             

                        <div class="form-group">

                             <form method = "post" role="form" class="search-footer" action="#" id = "form_email">

                            <input type="submit" id = "submit" class= "btn button-search hvr-float-shado" value="<?php echo __('register') ?>">

                            <div class="overflow-hidden">

                                <input type="text" class="form-control"  placeholder="<?php echo __('enter.email'); ?>" name ="email" id = "email" required >

                            </div>

                            </form>
                           

                

                        </div>

                           <?php } ?>                      

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <ul class="list-social">

                        <li><a href="https://www.facebook.com/selfwingvietnam/?fref=ts" class="icon-1 hvr-float-shadow" data-toggle="tooltip" data-placement="left" title="Facebook"></a></li>

                        <li><a href="#" class="icon-2 hvr-float-shadow" data-toggle="tooltip" data-placement="left" title="No Data"></a></li>

                        <li><a href="#" class="icon-3 hvr-float-shadow" data-toggle="tooltip" data-placement="left" title="Google +"></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <div class="block-coppyright">          

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="container">

                    <div class="right-footer">

                        <ul>

                            <li><a href="<?php echo $this->request->webroot?>pages/home"><?php echo __('homepage');?></a></li>

                <li><a href="<?php echo $this->request->webroot?>news/listNews"><?php echo __('news.event');?></a></li>

                <li><a href="<?php echo $this->request->webroot?>intro/detail"><?php echo __('intro');?></a></li>

                <li><a href="#"><?php echo __('label.ser');?></a></li>

                <li><a href="<?php echo $this->request->webroot?>jobs/listJobs"><?php echo __('job');?></a></li>

                <li><a href="<?php echo $this->request->webroot?>videos/list_videos"><?php echo __('video');?></a></li>

                <li><a href="<?php echo $this->request->webroot?>users/contact"><?php echo __('contact');?></a></li>

                        </ul>

                        <a href="http://nal.vn" class="tk  flr hvr-buzz-out"></a>

                    </div>

                    <div class="block-logo-footer">

                        <a href="#" class="logo-footer"></a>

                        <p>41 Lê Duẩn, Hải Châu, Đà Nẵng. <?php echo __('phone'); ?>: 0511.3968.181. Email: <a href="#">contact@selfwingvn.com</a></p>

                        <span>Copyright © 2016 - SELFWING VIET NAM</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

<!--
<script language="javascript">
$(document).ready(function(){
    $("#submit").click(function(){
        e = $("#email").val();
        if(e == "") {
            alert('');
        }
        else{
            $.ajax({
                type:"POST",
                url :"/selfwing/Emails/add",
                data:{email :e},
                dataType:"text",
                async:true,
                success: function(data){
                    $("#ketqua").html(data);
                    $("#form_email").hide();
                    $("#ketqua").addClass('message');
                },
                error: function (data) {
                    alert('error');
                }

            });
            return false;
        } 
    })
})
</script>
-->

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

        <script type="text/javascript">

        $( "#form_email" ).validate({

        rules: {       

            email :{

                  required :true,

                  email :true,

              },

             

        }

});

    jQuery.extend(jQuery.validator.messages, {

    required: "<?php echo __('required'); ?>",

    email :"<?php echo __('email.valid'); ?>"

 

});

    </script>

 

 

<?php echo $this->Html->script('jquery-1.11.0.min.js'); ?>

<?php echo $this->Html->script('bootstrap.min.js'); ?>

<?php echo $this->Html->script('jquery.mmenu.min.all.js'); ?>

<?php echo $this->Html->script('bootstrap-datepicker.js'); ?>

<?php echo $this->Html->script('swiper.min.js'); ?>

<?php echo $this->Html->script('jquery.fancybox.js'); ?>

<?php echo $this->Html->script('common.js'); ?>
<!--

-->