<?php echo $this->element('user/menu_left'); ?>
<?php echo $this->element('user/navbar');?>
<?php $session = $this->request->session(); 
$lang = $session->read('language');
?>

 <style type="text/css">
.bs-component{
    margin-left: 20%;
    margin-top: -4%;
}
 ul.pagination{
    float: right;
    margin-right: 25%;
 }
 </style>

<div class="bs-docs-section">
<div class="row">
  <div class="col-lg-10">
    <div class="page-header">
       
    </div>     
    <div class="bs-component" >
        
    </div>
    <form class="navbar-form " role="search" method="get">
       
    </form>
 
    <div class="bs-component">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
                <th>Id</th>
                <th>Fullname</th>
                <th>Start Date </th>
                <th>End Date</th>
                <th>Status</th>

          </tr>
        </thead>
        <tbody>
            <?php foreach ($listVacations as $value): ?>          
            <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->full_name; ?></td>
                <td><?php echo $value->start_date; ?></td>
                <td><?php echo $value->end_date ; ?></td>
                <?php if($value->status == 0) { ?>
                <td><?php echo "Pending"; ?></td>
                <?php } else if ($value->status == 1) { ?>
                <td> <?php echo "Cancel"; ?></td>
                <?php } else if ($value->status == 2) { ?>
                 <td> <?php echo  "Confirm"; ?><td>
                <?php } ?>
                                                 
                <td>
                     
                </td>
            </tr>
            <?php endforeach; ?>
                
            
        </tbody>
    </table>    
    </div>
    <ul class="pagination">                                                                     
                <li><?php echo $this->Paginator->prev('previous'); ?></li>
                <li><?= $this->Paginator->numbers() ?></li>
                <li><?php echo $this->Paginator->next('Next'); ?></li>
            </ul> 
</div>
<div id="cach">

</div>
<footer>

</footer>

    