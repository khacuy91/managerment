<html>
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>css/bootstrap.css "> 
 	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/admin/login-ad.css"/>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<div style="margin-top:-10%">
	<div class="ttl_form">
		<div class="txt_form">Register User</div>
	</div>
     	
<div class="login_bg-ad">
	<?php echo $this->Form->create(null, ['id'=>'login_form-ad', 'class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
		<dl>
			<?php if (isset($error_message)) {?>
				<p style="color:red;text-align: center;"><?php echo $error_message;?></p>
			<?php }?>
			<dt>Fullname</dt>
			<dd class="essential">
				<?php echo $this->Form->input('fullname', array('type'=>'text','id'=>"fullname", 'label'=>false, 'div'=>false,'required'=>true))?>
			</dd>  

			<dt>Email</dt>
			<dd class="essential">
				<?php echo $this->Form->input('email', array('type'=>'email', 'id'=>"email", 'label'=>false, 'div'=>false, 'required'=>true))?>
			</dd>
			
			<dt>BirthDate</dt>
			<dd class="essential">
				 <input type="text" class="form-control" required id="birthdate" name = "birthdate" style="width: 50%"> 
			</dd>

			<dt>Phone</dt>
			<dd class="essential">
				<?php echo $this->Form->input('phone', array('type'=>'tel', 'id'=>"phone", 'label'=>false, 'div'=>false,  'required'=>false))?>
			</dd>
  	
			 
			<dt>UserName</dt>
			<dd class="essential">
				<?php echo $this->Form->input('username', array('class'=>'form-control', 'div'=>false, 'label'=>false,'id'=>'username' , 'required'=>true));?>
			</dd>

			<dt>Password</dt>
			<dd class="essential">
				<?php echo $this->Form->input('password', array('type'=>'password', 'id'=>"password", 'label'=>false, 'div'=>false,  'required'=>false))?>
			</dd>
			 <dt>Leader</dt>
			 	<dd class="essential">
			 	<input type="checkbox" name="is_leader" id='is_leader' value="1"> 
			 	</dd>
			<dt>Team</dt> 
				<dd class="essential">	 
                    <select class="form-control" name="id_team" id="team"  >
                    <option>Select Team</option>
                    <?php foreach ($teams as $key => $value): ?>
                    	 <option value="<?php echo $value->id ?>"><?php echo $value->name; ?></option>
                    <?php endforeach; ?>                 
                  </select>
				</dd>
			<dd class="essential" style="width:100%;">
				<div class="touroku_btn">
					<button type="submit" id="touroku_submit_button"  />Register</button>
				</div>
			</dd> 
			 
		</dl>
	</form>			  
</div>
<style>
	.error-message{
		color:red;
	}
</style>
 <script src="<?php echo $this->request->webroot ?>js/jquery-2.1.4.js"></script>
 <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
	<script>
	$(document).ready(function)(){
		$("#datepicker").datepicker();
	}
	</script>
  <script language="javascript">
  $(document).ready(function(){
      $("#login_form-ad").validate({
          rules:{
              fullname :"required",
              email:{
              	required:true,
              	email:true,
              },
              phone:{
              	 number:true,
              	 maxlength:11,
              	 minlength:10,
              },
              username:"required",
              password:"required",
                                
               
          },
          messages:{
              fullname :"Fullname not empty",
              email:{
              	required:"your email not empty",
              	email:"Your email is not valid"
              },
              phone:{
              	number:"Phone number is numeric",
              	maxlength:"Max is 11 characters",
              	minlength:"Min is 10 characters"
              },
              username: "username not empty",
              password:"password not empty", 
                                
          }
      })
  })
  </script>