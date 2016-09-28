<html>
<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/bootstrap.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/import.css" type="text/css" media="screen" />
<body>
<div class="bs-docs-section">

    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
            <h1 id="tables">View Report</h1>  
              
        </div>

        <div class="bs-component" style="float:right">
          
        </div>

        <div class="bs-component">
             <a href="<?php echo $this->request->webroot ?>admin/marketings/add" class="btn btn-default">Add New</a>
        </div>

        <div class="bs-component">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                </thead>
                 <tbody>
	  	<?php 
		 
		?>
			<tr>
		  		<td nowrap ><?php // echo $marketings['id'];?></td>
		  		<td nowrap ><?php // echo basename($marketings['pdf_file']) ?></td>
		  		<td nowrap ><?php // echo $marketings['banner_name'] ?></td> 
          <td nowrap ><?php?></td> 
		                <td><form name="post_<?php // echo $marketings['id'] ?>" style="display:none;" method="post" action="<?php // echo //$this->request->webroot;?>admin/marketings/delete/<?php //echo  $marketings['id'] ?>"><input type="hidden" name="_method" value="POST"></form>
                      <a href="#" onclick="if (confirm('Are you sure?')) { document.post_<?php //echo  $marketings['id'] ?>.submit(); } event.returnValue = false; return false;">Delete</a>
                      <a href="<?php //echo  $this->request->webroot; ?>admin/marketings/edit/<?php //echo // $marketings['id'] ?>">Edit</a>
                      <?php //$this->Html->link('Edit', ['action' => 'edit', $category->id]) ?></td>
			</tr>
	    	</tbody>
            </table>
</div>
</body>
</html>
