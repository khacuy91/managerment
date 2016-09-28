
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/admin/login-ad.css" />
<div style="padding-bottom:50px">
<div class="ttl_form">
	<div class="txt_form">Login</div>
</div>
<style type="text/css">
	button#touroku_submit_button{
		margin-left: -3em;
	}
</style>
<?php echo $this->Html->script('jquery-2.1.4'); ?>

<div class="login_bg-ad">
	<?php  echo $this->Form->create(null,['id'=>'login_form-ad', 'class'=>'form-horizontal',]) ?>
	 
	<?php if(isset($error_message)){?>
	  <p style="color:red;text-align: center;"><?php echo $error_message;?></p>  
	<?php }?>
	
		<dl>
			<div id="ketqua">

			</div>
			<dt>UserName</dt>
			<dd class="essential">
				<?php echo $this->Form->input('username', array('type'=>'text','id'=>"username", 'label'=>false, 'div'=>false,'placeholder'=>"Tên Đăng Nhập" , 'required'=>false))?>
			</dd>  

			<dt>Password</dt>
			<dd class="essential">
				<?php echo $this->Form->input('password', array('type'=>'password', 'id'=>"password", 'label'=>false, 'placeholder'=>"Mật Khẩu", 'div'=>false, 'required'=>false))?>
			</dd>  
 
									
			<dd class="essential" style="width:100%;">
				<div class="touroku_btn">
					<button type="submit" id="touroku_submit_button"/>Đăng Nhập</button>
				</div>
			</dd> 
			<?php echo $this->Form->end(); ?>
			
	 		<script src="<?php  echo $this->request->webroot ?>js/jquery-2.1.4.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#touroku_submit_button").click(function(){
						var user = $("#username").val();
						var pass = $("#password").val();
						$.ajax({
							type:"POST",
							url :"<?php echo $this->request->webroot?>admin/users/login",
							data:{username : user, password :pass},
							dataType :"text",							
							async:false,
							success:function(data){
								if(data != ''){
									$("#ketqua").html(data);
								}
								else {
									$("#login_form-ad").hide();
								}
								 
								console.log(data);
							},
							error: function(data){
								alert('error');
							}
						});
						return false;
					})
				})		 
			</script>
		</dl>
	</form>			  
</div>
<style>
	.error-message{
		color:red;
	}
</style>