 <?php use app\controller\admin\TeamsController; ?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>Approve for leader</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/admin/list-ad.css" />
<div class="ttl_list">
  	<div div class="txt_list">Approve for Team Leader</div>
</div>
		 
<div id="list_wrap">	  
	<table border="0" cellspacing="0" cellpadding="0" class="tbl_list-ad">
	  	<thead>
			<tr>
		  		<th>Id</th>
		  		<th>Name</th>
		  		<th>Aaction</th>
		  		  
			</tr>
	  	</thead>
	  	<tbody>
	  	<?php
			foreach ($listTeam as $value) { 
		?>
			<tr>
		  		<td><?php echo $value->id;?></td>
		  		<td style="text-align:center"><?php echo $value->name;?></td>		 
		  		<td style="text-align:center" >
		  	 
	            <form name="post_<?php echo $value->id ?>" style="display:none;" method="post" action="<?php echo $this->request->webroot;?>admin/teams/listUser/<?php echo $value->id ?>"><input type="hidden" name="_method" value="POST"></form>
	                <button class = "btn btn-primary" data-toggle="modal" data-target="#myModal" >View List</button>
    <!-- Modal content-->
    <div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	            </td> 
			</tr>
	  <?php } ?>
	  	</tbody>
	</table> 
</div>
 



