   
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>create Projects form</title>
  <link href="../css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>css/bootstrap.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <?php echo $this->Html->script('jquery.validate'); ?>
  <?php echo $this->Html->css('style1'); ?>
  <script>
 $(document).ready(function () {

    $("#startdate").datepicker({
        dateFormat: "yy/mm/dd", changeMonth:true, changeYear:true,
       
        onSelect: function (date) {
            var dt2 = $('#enddate');
            var startDate    = $(this).datepicker('getDate');
            var minDate        = $(this).datepicker('getDate');
            startDate.setDate(startDate.getDate() + 3600);
            dt2.datepicker('option', 'maxDate', startDate);
            dt2.datepicker('option', 'minDate', minDate);
            $(this).datepicker('option', 'minDate', minDate);
        }
    });
    $('#enddate').datepicker({
       dateFormat: "yy/mm/dd",changeMonth:true, changeYear:true,
    });
});
  </script>
  <script language="javascript">
  $(document).ready(function(){
      $("#register_form").validate({
          rules:{
              name :"required",
              start_date:"required",                           
              description:"required"
          },
          messages:{
              fullname :"Fullname not empty",              
              start_date: "start date not empty",   
              description:"description not empty"
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
            
            <?php echo $this->Form->create(null, ['type'=>'file', 'class'=>'form-horizontal','id'=>'register_form']); ?>
            <fieldset>
            <legend>Form Vacation </legend>
            <?php if (isset($error_message)) {?>
                <p style="color:red;text-align: center;"><?php echo $error_message;?></p>
            <?php }?>
            <div class="form-group">
                <label   class="col-lg-2 control-label">Name Project</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="name" name="name" required value="">                    
                </div>
            </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Description </label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="6" id="description" name="description" required></textarea>
                    <span class="help-block"></span>
                </div>
            </div>

             <div class="form-group">
                <label class="col-lg-2 control-label" style="float:left">Start Date</label>
                <div class="col-lg-10">
                     <input type="text" class="form-control" required id="startdate" name = "start_date" style="width: 50%"   >  
                    <?php // echo $this->Form->input('start_date',['type'=>'text','id'=>'datepicker','name'=>'startday','label'=>false,'required'=>true]); ?> 
                </div>
           </div>

            <div class="form-group">
                <label class="col-lg-2 control-label" style="float:left">End Date</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" required id="enddate" name = "end_date"  style="width: 50%" > 
                </div>      
            </div>        
     
                <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Choose Tean</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="team_id" id="team_id" >
                            <option>Select Team</option>
                            <?php foreach ($listTeam as $key => $value): ?>                 
                                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                            <?php endforeach; ?>                 
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group" id="result">
                    <label for="textArea" class="col-lg-2 control-label">Choose Leader</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="team_id" id="team_id" >
                            <option>Select leader </option>
                                          
                                <option></option>
                                       
                        </select>
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
<script>
$(document).ready(function(){
    $('#team_id').on('change',function () {
        var getid   = $(this).val();
        var team_id = $(this).id;
           
        $.ajax({
                type: "POST",
                url: "<?php echo $this->request->webroot?>admin/Projects/createProjects",
                data:{ getid : getid },
                async :true,
                success: function(data) {
                    console.log(data);
                }

      })
  });
});
    </script>
</body>
</html>