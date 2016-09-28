   
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>vacation form</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>css/admin/login-ad.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <?php echo $this->Html->script('jquery.validate'); ?>
  <script>
 	$(document).ready(function () {

    $("#birthday").datepicker({
        dateFormat: "yy/mm/dd",changeMonth :true, changeYear:true, yearRange:"1970:2000",
        onSelect: function (date) {
            var dt2 			= $('#enddate');
            var startDate 	 	= $(this).datepicker('getDate');
        }
    });
});
  </script>
  <script>
	$(document).ready(function () {

    $("#joindate").datepicker({
        dateFormat: "yy/mm/dd",changeMonth :true, changeYear:true, yearRange:"2015:2050",
        onSelect: function (date) {
            var dt2 			= $('#enddate');
            var startDate 	 	= $(this).datepicker('getDate');
        }
    });
});
  </script>
  <script language="javascript">
  $(document).ready(function(){
      $("#login_form-ad").validate({
          rules:{
              full_name :"required",
              phone:{
              	 number:true,
              	 maxlength:11,
              	 minlength:10,
              },                
               birthdate:"required",
               role:"required",
          },
          messages:{
              full_name :"Fullname not empty",
              phone:{
              	number:"Phone number is numeric",
              	maxlength:"Max is 11 characters",
              	minlength:"Min is 10 characters"
              },                
               birthdate:"birthdate not empty",
               role:"role not empty",
          }
      })
  })
  </script>
  <div style="margin-top:-10%"> 
  <div class="ttl_form">
		<div class="txt_form">Register User</div>
	</div>
      <div class="login_bg-ad">
	<?php echo $this->Form->create($dataUser, ['id'=>'login_form-ad', 'class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
		<dl>
			<?php if (isset($error_message)) {?>
				<p style="color:red;text-align: center;"><?php echo $error_message;?></p>
			<?php }?>
			<dt>Fullname</dt>
			<dd class="essential">
				<?php echo $this->Form->input('full_name', array('type'=>'text','id'=>"full_name", 'label'=>false, 'div'=>false,'required'=>true,'class'=>'form-control'))?>
			</dd>  	
			<dt>BirthDate</dt>
			<dd class="essential">
				<?php echo $this->Form->input('birthday', array('type'=>'text','id'=>"birthday", 'label'=>false, 'div'=>false,'required'=>true,'class'=>'form-control'))?> 
			</dd>
			<dt>Join Date</dt>
			<dd class="essential">
				<?php echo $this->Form->input('date_join', array('type'=>'text','id'=>"joindate", 'label'=>false, 'div'=>false,'required'=>true,'class'=>'form-control'))?> 
			</dd>
			<dt>Phone</dt>
			<dd class="essential">
				<?php echo $this->Form->input('phone', array('type'=>'tel', 'id'=>"phone", 'label'=>false, 'div'=>false,  'required'=>false))?>
			</dd>	 
			<dt>Address</dt>
			<dd class="essential">
				<?php echo $this->Form->input('address', array('class'=>'form-control', 'div'=>false, 'label'=>false,'id'=>'address' , 'required'=>true));?>
			</dd>		 
			<dt>Role</dt>
			<dd class="essential">
				<?php echo $this->Form->input('role', array('class'=>'form-control', 'div'=>false, 'label'=>false,'id'=>'role' , 'required'=>true));?>
			</dd>
            <dt>Description</dt>    
                <dd class="essential">
                    <textarea class="form-control" rows="6" id="description" name="description"><?php echo $dataUser->description;?></textarea>
             </dd>
             <dt>experience</dt>    
                <dd class="essential">
                    <textarea class="form-control" rows="6" id="experience" name="experience"><?php echo $dataUser->experience; ?></textarea>
             </dd>    
			  			 
			<dd class="essential" style="width:100%;">
				<div class="touroku_btn">
					<button type="submit" id="touroku_submit_button"/>Apply</button>
				</div>
			</dd> 
			 
		</dl>
	</form>			  
</div>
</div>
</body>
</html>