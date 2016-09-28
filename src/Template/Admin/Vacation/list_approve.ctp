<style>
table.tbl_list-ad{
	width: 70%;
	font-size: 90%;
}

</style>
<title>Approve for leader</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/admin/list-ad.css" />
<div class="ttl_list">
  	<div div class="txt_list">Approve for Team Leader</div>
</div>
		 
<div id="list_wrap">	  
	<table border="0" cellspacing="0" cellpadding="0" class="tbl_list-ad">
	  	<thead>
			<tr>
		  		<th>ID.</th>
		  		<th>FullName</th>
		  		<th>Start Date</th>
		  		<th>End Date</th>
		  		<th>Status</th>
		  		<th>Aaction</th>
			</tr>
	  	</thead>
	  	<tbody>
	  	<?php
			foreach ($leaderDayoff as $value) { 
		?>
			<tr>
		  		<td><?php echo $value->id;?></td>
		  		<td style="text-align:center"><?php echo $value->full_name;?></td>
		  		<td><?php echo $value->start_date; ?></td>
		  		<td><?php echo $value->end_date; ?></td>
		  		<?php if($value->status == 0){ ?>
		  		<td style='text-align:center'><?php echo "Pending" ?></td>
		  		<?php } else { ?>
		  		<td><?php echo "Confirm" ?></td>
		  		<?php } ?>
		  		<td style="text-align:center" >
	                <form name="post_<?php echo $value->id ?>" style="display:none;" method="post" action="<?php echo $this->request->webroot;?>admin/vacation/approve/<?php echo $value->id ?>"><input type="hidden" name="_method" value="POST"></form>
	                <a href="#" onclick="if (confirm('Are you sure?')) { document.post_<?php echo $value->id ?>.submit(); } event.returnValue = false; return false;"><?php echo __('Approve');?></a> 
	                <a href="cancelVacation/<?php echo $value->id; ?>" onclick="return confirm( 'Are you sure ?');"> Not Agree</a>
	            </td>
			</tr>
	  <?php } ?>
	  	</tbody>
	</table> 
</div>



