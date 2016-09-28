<nav class="block-paging padding">
  <ul class="pagination">										  							  
	<li><?php echo $this->paginator->prev('Previous'); ?></li>
	<li><?= $this->paginator->numbers() ?></li>
	<li><?php echo $this->paginator->next('Next'); ?></li>						  
</nav>