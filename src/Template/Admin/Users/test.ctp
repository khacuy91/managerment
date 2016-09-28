   
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>vacation form</title>
  <link href="../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>/admin/list-ad.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <?php echo $this->Html->script('jquery.validate'); ?>
  <?php echo $this->Html->css('style1'); ?>
  <script>
 $(document).ready(function () {

    $("#startdate").datepicker({
        dateFormat: "yy/mm/dd", 
        minDate: 0,
        onSelect: function (date) {
            var dt2 = $('#enddate');
            var startDate 	 = $(this).datepicker('getDate');
            var minDate 	   = $(this).datepicker('getDate');
            startDate.setDate(startDate.getDate() + 3600);
            dt2.datepicker('option', 'maxDate', startDate);
            dt2.datepicker('option', 'minDate', minDate);
            $(this).datepicker('option', 'minDate', minDate);
        }
    });
    $('#enddate').datepicker({
       dateFormat: "yy/mm/dd"
    });
});
  </script>
  <script language="javascript">
  $(document).ready(function(){
      $("#register_form").validate({
          rules:{
              fullname :"required",
              phone:{
              	 number:true,
              	 maxlength:11,
              	 minlength:10,
              },
              start_date:"required",
              end_date:"required",                  
              content:"required"
          },
          messages:{
              fullname :"Fullname not empty",
              phone:{
              	number:"Phone number is numeric",
              	maxlength:"Max is 11 characters",
              	minlength:"Min is 10 characters"
              },
              start_date: "start date not empty",
              end_date:"end date not empty",        
              content:"content not empty"
          }
      })
  })
  </script>
  <script>
      document.getElementById("#reset").reset();
  </script>
</head>
 
<body> 
 
      <div class="col-lg-6">
        <div class="well bs-component" style="margin-top:-0%">
            
           	<?php echo $this->Form->create(null, ['type'=>'file', 'class'=>'form-horizontal','id'=>'login_form-ad']); ?>
            <fieldset>
            <legend>Form Vacation </legend>
            <?php if (isset($error_message)) {?>
        		<p style="color:red;text-align: center;"><?php echo $error_message;?></p>
            <?php }?>
            <div class="form-group">
                <label   class="col-lg-2 control-label">FullName <span style="color: red">*</span></label>
                <div class="col-lg-10">
                    <input type="text"   id="fullname" name="fullname" required value="">                    
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-2 control-label">Start Date <span style="color: red">*</span></label>
                <div class="col-lg-10">
                     <input type="text"   required id="startdate" name = "start_date" style="width: 50%"   >  
                    <?php // echo $this->Form->input('start_date',['type'=>'text','id'=>'datepicker','name'=>'startday','label'=>false,'required'=>true]); ?> 
                </div>
                
                </div>

                <div class="form-group">
                <label class="col-lg-2 control-label">End Date <span style="color: red">*</span></label>
                <div class="col-lg-10">
                    <input type="text"   required id="enddate" name = "end_date"  style="width: 50%" > 
                </div>
                
                </div>        
                
            <div class="form-group">
                <label class="col-lg-2 control-label">Phone </label>
                <div class="col-lg-10">
                    <input type="text"   name="phone" id="phone">
                </div>
            </div>
              
             
                <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Content <span style="color: red">*</span></label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="6" id="content" name="content" required></textarea>
                    <span class="help-block"></span>
                </div>
                </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary" id="add" name="add" style : width='30px;'>Add</button>
                    <button type="reset" id="reset" name="reset" class="btn btn-primary"style="float:right;">Reset</button>    
                </div>
            </div>
            </fieldset>
        </form>
     </div>
   </div>
     
    </div>  
</body>
</html>