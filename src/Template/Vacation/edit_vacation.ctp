<?php echo $this->element('user/menu_left'); ?>
<?php echo $this->element('user/navbar');?> 
<?php 
$session 	= $this->request->session();
$userLogin 	= $session->read('userLogin'); 
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>vacation form</title>

	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>css/bootstrap.css">
	 
	<?php echo $this->Html->script('jquery.validate'); ?>
	<?php echo $this->Html->css('style1'); ?>
	<style>
	#change{
		float: right;
		margin-top: -5%;
	}
	label#startdate-error.error{
		color: black;
		margin-left: 28%;
	}
	label#enddate-error.error{
		margin-left: 28%;
		color: black;
	}
	</style>
	<script>
 $(document).ready(function () {

		$("#startdate").kendoDateTimePicker({
			format: "yyyy/MM/dd hh:mm tt",
			min: new Date(),
				 
		});
		$('#enddate').kendoDateTimePicker({
			 format: "yyyy/MM/dd hh:mm tt",
			 min: new Date(),			  
		});
});
	</script>
	<script language="javascript">
	$(document).ready(function(){
		$("#register_form").validate({
			rules:{
				phone:{
					 number:true,
					 maxlength:11,
					 minlength:10,
				},
				start_date:{
					required:true,
					date:true,
				},
				end_date:{
					required:true,
					date:true,
				},                 
				content:"required"
			},
			messages:{
				phone:{
					number:"Phone number is numeric",
					maxlength:"Max is 11 characters",
					minlength:"Min is 10 characters"
				},
				start_date:{
					required:"start date not empty",
					date:"date not valid"
				},
				end_date:{
					required:"end date not empty",
					date:"date not valid"
				},      
				content:"content not empty"
		}
		})
	})
	</script>
	<script>
	$(document).ready(function(){
		$("#other").hide();
		$("#change").click(function(){
			$("#other").slideToggle();	
		})
	})
	</script>
</head>
    <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.1.406/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.1.406/styles/kendo.material.min.css" />
    <script src="//kendo.cdn.telerik.com/2016.1.406/js/kendo.all.min.js"></script>
<body> 
 	
			<div class="col-lg-6">
				<div class="well bs-component" style="margin-top:-0%">
							
						<?php echo $this->Form->create($dataUser, ['type'=>'file', 'class'=>'form-horizontal','id'=>'register_form']); ?>

						<fieldset>
						<legend>Form Vacation </legend>
						<?php if (isset($error_message)) {?>
						<p style="color:red;text-align: center;"><?php echo $error_message;?></p>
						<?php }?>
						 
						 <div class="form-group">
							<label class="col-lg-2 control-label">Start Date <span style="color: red">*</span></label>
							<div class="col-lg-10">
								 <input type="text" class="form-control" required id="startdate" name = "start_date" style="width: 50%" value="<?php echo $dataUser->start_date; ?>"   >   
									<?php  // echo $this->Form->input('start_date',['type'=>'text','id'=>'startdate','name'=>'start_date','label'=>false,'required'=>true]); ?> 
							</div>
							
							</div>

						<div class="form-group">
							<label class="col-lg-2 control-label">End Date <span style="color: red">*</span></label>
							<div class="col-lg-10">
								<input type="text" class="form-control" required id="enddate" name = "end_date"  style="width: 50%" value="<?php echo $dataUser->end_date; ?>"  > 
							</div>						
						</div>        
								
						<div class="form-group">
							<label class="col-lg-2 control-label">Phone </label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="phone" id="phone" style="width:50%" value="<?php echo $dataUser->phone; ?>" >
							</div>
						</div>
						<div class="form-group">
							<label for="textArea" class="col-lg-2 control-label">Content <span style="color: red">*</span></label>
							<div class="col-lg-10">
								<textarea class="form-control" rows="6" id="content" name="content" required ><?php echo $dataUser->content; ?></textarea>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="textArea" class="col-lg-2 control-label">To Judge work <span style="color: red">*</span></label>
							<div class="col-lg-10">
								<textarea class="form-control" rows="6" id="judgework" name="judge_work" required><?php echo $dataUser->judge_work; ?></textarea>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							  <?php  if($checkisLeader){ ?>					
							<label for="textArea" class="col-lg-2 control-label">Leader <span style="color: red">*</span></label>
							<div class="col-lg-10">								
								<input type="text" class="form-control" required id="enddate" name = "end_date" disabled style="width: 50%" value="<?php echo $dataUser->full_name; ?>" > 
								<button type="button" id="change" class="btn btn-success">Change Leader</button>
								<span class="help-block"></span>
							</div> 			 
						</div>

						<div class="form-group" id="other">
							<label for="textArea" class="col-lg-2 control-label">Choose Leader <span style="color: red">*</span></label>
							<div class="col-lg-10">
								<select class="form-control" name="ortherleader" id="ortherleader" style="width:50%"  >
                    				<option>Select Leader</option>
                    				<?php foreach ($otherLeader as $key => $value): ?>                 
                    	 				<option value="<?php echo $value->id;?>"><?php echo $value->full_name; ?></option>
                    				<?php endforeach; ?>                 
                  				</select>
								<span class="help-block"></span>
							</div>
						</div>
				 	<?php } ?>
						<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="submit" class="btn btn-primary" id="add" name="add" style : width='30px;'>Edit</button>
									    
								</div>
						</div>
						</fieldset>
				</form>
		 </div>
	 </div>
 
		 	 
  			</div>
			</div>
		</div>  

</body>
</html>