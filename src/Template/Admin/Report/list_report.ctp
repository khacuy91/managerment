 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>vacation form</title>
  
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>css/bootstrap.css ">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <?php echo $this->Html->script('jquery.validate'); ?>
  <?php echo $this->Html->css('style1'); ?>
<html>
<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/bootstrap.css" type="text/css" media="screen" />

 <script>
 $(document).ready(function () {

    $("#startdate").datepicker({
        dateFormat: "yy/mm/dd", changeMonth:true,changeYear:true,
         
        onSelect: function (date) {
            var dt2         = $('#enddate');         
            var startDate   = $(this).datepicker('getDate');
            var minDate     = $(this).datepicker('getDate');
            startDate.setDate(startDate.getDate() + 3600);
            dt2.datepicker('option', 'maxDate', startDate);
            dt2.datepicker('option', 'minDate', minDate);
            $(this).datepicker('option', 'minDate', minDate);
        }
    });
    $('#enddate').datepicker({
       dateFormat: "yy/mm/dd", changeMonth:true, changeYear:true,
    });
});

  </script>       
<body>
<script language="javascript"> 
$(document).ready(function(){
    $("#btn_reportt").click(function(){
        var start_date  = $("#startdate").val();
        var end_date    = $("#enddate").val();

        $.ajax({
            type:"POST",
            url : "<?php echo $this->request->webroot?>admin/report/listReport",
            data:{startdate : startdate, enddate: end_date},
            async:true,
            success: function (data){
                $("#result").html(data);
                 
            }
            error: function (xhr, ajaxOptions, thrownError) {
                alert('faild');
            
        });
   
       
    })
})  
</script>    
 <script language="javascript">
/*
$(document).ready(function(){
    $("#btn_report").click(function(){
        var start_date = $("#startdate").val();
        var end_date   = $("#enddate").val();
        //alert(start_date + end_date);
        $.ajax({
            type:"POST",
            url:"<?php echo $this->request->webroot?>admin/report/listReport",
            data:{startdate : start_date, enddate: end_date},
            async:true,
            success: function(data) {
                $("#result").html(data);
            }
        });
    })
})
*/
 </script>
 
<div class="bs-docs-section">

    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
            <h1 id="tables">View Report</h1>  
              
        </div>
        <form method="post" action = "#" id = "form_id">  
        <!-- <form action = "<?php // echo $this->request->webroot?>admin/report/listReport" method = "post" id="form_report"> -->
        <div class="form-group">
            <label class="col-lg-2 control-label">To Date <span style="color: red">*</span></label>
            <div class="col-lg-10">
                 <input type="text" class="form-control" required id="startdate" name = "start_date"  style="width: 20%" >  
            </div>
            
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Form Date <span style="color: red">*</span></label>
            <div class="col-lg-10">
                <input type="text" class="form-control" required id="enddate" name = "end_date"  style="width: 20%" > 
            </div>
                
        </div>    
        <div class="bs-component">
              <button class='btn btn-primary' id='btn_report'>View Report</button>
        </div>

   
        <div class="bs-component">
            <table class="table table-striped table-hover "> 
                <thead>
                <tr >
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                 <?php if (isset($error_message)) {?>
                <h3 style="color:red;text-align: center;"><?php echo $error_message;?></h3>
            <?php }?>
                 <tbody>
                <?php if(isset($listReports)) { ?>
	  	    <?php foreach ($listReports as  $value){ ?>
			<tr>
		  		<td nowrap ><?php echo $value->id; ?></td>
		  		<td nowrap ><?php echo $value->full_name; ?></td>
		  		<td nowrap ><?php echo $value->start_date ; ?> </td> 
                <td nowrap ><?php echo $value->end_date ; ?> </td> 
                <?php if ($value->status == 0){ ?>
                <td nowrap><?php echo "pending"; ?></td>
                <?php } else if ($value->status == 1){ ?>
                <td nowrap><?php echo "cancel";?></td>
                <?php } else { ?>
                <td nowrap><?php echo "confirm";?></td>
                <?php } ?>
                
            <td nowrap ></td> 
		        <?php } ?>        
                <?php } ?>
	    	</tbody>
            
            </table>
</div>
 </form>
        <div id= "result">
        </div>
</body>
</html>
