<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vacation form</title>

    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>js/jquery-2.1.4.js">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot?>css/admin/multiselect.css">    
   
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
     div#checkboxes {
        margin-left: 0%;
       width: 100%;
        display: none;
        border: 1px #dadada solid;
    }
    </style>
 
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
 
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
 
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
                            <label class="col-lg-2 control-label">Name </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-lg-2 control-label">Description <span style="color: red">*</span></label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="6" id="description" name="description" required></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <label class="col-lg-2 control-label">Select User </label>
                            <div class="multiselect" style="margin-left:40%">                  
                                <div class="selectBox" onclick="showCheckboxes()">
                                <select >
                                    <option>Select an option</option>
                                </select>
                                <div class="overSelect"></div>
                                </div>
                                <div id="checkboxes">
                                    <?php foreach ($dataUsers as $key => $value): ?>           
                                    <label><input type="checkbox" name="userteam[]" value="<?php echo $value->id ?>"><?php echo $value->full_name; ?></label>                              
                                    <?php endforeach;  ?>
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
            </div>
        </div>  

</body>
</html>