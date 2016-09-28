<?php echo $this->element('user/menu_left'); ?>
<?php echo $this->element('user/navbar'); ?>
 
<?php $session = $this->request->session(); 
$lang = $session->read('language');
?>
 <style type="text/css">
.bs-component{
    margin-left: 20%;
    margin-top: -5%;
}
 </style>

 
<div class="bs-docs-section">
<div class="row">
  <div class="col-lg-10">
    <div class="page-header">
       <?php if (isset($error_message)) {?>
                <p style="color:red;text-align: center;"><?php echo $error_message;?></p>
            <?php }?> 
    </div>     
    <div class="bs-component" >
        
    </div>
     
    <div class="bs-component">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
                <th>Id</th>
                <th>Fullname</th>
                <th>Start Date </th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($listApprove as $value): ?>          
            <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->full_name; ?></td>
                <td><?php echo $value->start_date; ?></td>
                <td><?php echo $value->end_date ; ?></td>
                <?php if($value->status == 0) { ?>
                <td><?php echo "Pending"; ?></td>
                <?php } else if ($value->status == 1) { ?>
                <td> <?php echo "Cancel"; ?></td>
                <?php } else { ?>
                    <?php echo "Confirm"; ?>
                <?php } ?>
                                                 
                <td>
                   
                    <form name="post_<?php echo $value->id ?>" style="display:none;" method="post" action="<?php echo $this->request->webroot;?>vacation/approve/<?php echo $value->id ?>"><input type="hidden" name="_method" value="POST"></form>
                    <a href="#" onclick="if (confirm('Are you sure?')) { document.post_<?php echo $value->id ?>.submit(); } event.returnValue = false; return false;"><?php echo __('Agree');?></a>
                    
                    <a href="cancelVacation/<?php echo $value->id; ?>" onclick="return confirm( 'Are you sure ?');"> Not Agree</a>
                                       
       
  
 

               </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>    
    </div>
    
</div>

