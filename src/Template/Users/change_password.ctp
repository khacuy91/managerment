<html>
    <head></head>
    <link rel="stylesheet" href="<?php echo $this->request->webroot?>js/bootstrap.min.js">
    <link href="<?php echo $this->request->webroot?>css/bootstrap.css" rel="stylesheet" type="text/css"/> 
    <?php echo $this->Html->script('jquery-2.1.4');?>
    <?php echo $this->Html->script('jquery.validate');?>
    <body>
     <script type="text/javascript" >
    $(document).ready(function(){
    $("#login_form").validate({
       rules:{
           current_password:"required",
           new_password :{
               required: true,
           },
           password_confirm :{
               required:true,
               equalTo :"#new_password",
           }
             
       },
       messages:{
           current_password:"Current password not Empty",
           new_password :{
               required :"New Password not Empty",
           },
          password_confirm:{
              required:"confirm password not Empty",
              equalTo :"password and password confirm not match"
          }
       }
   })
});
</script>
    <div class="modal-dialog">
        <div class="modal-content col-md-8">
            <div class="modal-header">
                <h4 class="modal-title"><i class="icon-paragraph-justify2"></i>Change Password</h4>
            </div>
            <?php if (isset($error_message)) {?>
                <p style="color:red;text-align: center;"><?php echo $error_message;?></p>
            <?php }?>
            <form method="post" id="login_form" >
            <div class="modal-body with-padding">    
                <div class="form-group">  
                    <div class="row">
                        <div class="col-sm-10">
                            <label>Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="form-control required" required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">  
                    <div class="row">
                        <div class="col-sm-10">
                            <label>New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control required" required/>
                        </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-10">
                         <label>Confirm Password</label>
                         <input type="password" id="password_confirm" name="password_confirm" class="form-control required"  required/>
                </div>
            </div>
        </div>
                <input type="submit" name="login" id="login" class="btn btn-primary"value="Apply">
                </div>
            </form>
        </div>
    </div>
    </body>
</html>