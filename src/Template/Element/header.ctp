<?php $session = $this->request->session(); 

$lang = $session->read('language');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Selfwing</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<meta name="description" content="mô t? website" />
	<meta name="keywords" content="nh?ng t? khóa c?a website b?n" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/bootstrap.min.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/bootstrap-theme.min.css" type="text/css" media="screen" />   

<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/datepicker.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/swiper.min.css" type="text/css" media="screen" />   

<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/jquery.mmenu.all.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/hover.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/jquery.fancybox.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/common.css" type="text/css" media="screen" />      

<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,900,300,500' rel='stylesheet' type='text/css'>

</head>
<style>
button.btn.dropdown-toggle{
margin-left:27px;
}
</style>
<body>
	<div id="wd-wrapper">
		<div id="wd-head-container">
		<div class="container">
			<h1 id="logo" style = 'margin-left:-4.5%;'><a href="#"><img src="<?php echo $this->request->webroot?>images/logo.png" alt="" /></a></h1>
				<a class="icon-menu" href="#menu"></a>
				<div class="language">
				<div class="btn-group">
				 <?php if($lang == 'vi_VN') { ?>   

				<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

				<img src="<?php echo $this->request->webroot?>images/vn.png" alt="" /> <span class="caret"></span>

				</button>

				<?php } else { ?>
				<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

				<img src="<?php echo $this->request->webroot?>images/jp.png" alt="" /> <span class="caret"></span>

				</button>

				<?php }?>

		<ul class="dropdown-menu">

			<li><a href='<?php echo $this->request->webroot?>users/changeLanguage/vi_VN'><img src="<?php echo $this->request->webroot?>images/vn.png"></a></li>

			<li><a href='<?php echo $this->request->webroot?>users/changeLanguage/ja_JP'><img src="<?php echo $this->request->webroot?>images/jp.png"></a></li>

		</ul>
			</div>
				</div>
				<div class="menu-header">
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							 <li class=""><a href="<?php echo $this->request->webroot?>"><?php echo __('homepage');?> </a></li> 
							 <li><?php echo $this->Html->link( __('news.event'),'/tin-tuc-su-kien'); ?></li>
								 <li><?php echo $this->Html->link( __('intro'),'/gioi-thieu'); ?></li>
							<li class="dropdown">

        					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('label.ser');?></a>

       						 <ul class="dropdown-menu">

           					 <?php if($lang =='vi_VN') { ?>

            					<?php foreach ($servicesType as $key => $value): ?>

            

                			<li><?php echo $this->Html->link($value->name,array('controller'=>'ServicesType','action'=>'detail',$value->id)); ?></li>

           				 <?php endforeach; ?>

           				 <?php } else { ?>

           				  <?php foreach ($servicesType as $key => $value): ?>

           				<li><?php echo $this->Html->link($value->name_jp,array('controller'=>'ServicesType','action'=>'detail',$value->id)); ?></li>

           				  <?php endforeach; ?>

         				   <?php }?>

       					 </ul>

   				 </li>            
			  <li >

        		<?php echo $this->Html->link( __('job'),'/cam-nang-viec-lam'); ?>                          

  			  </li>
					<li>  <?php echo $this->Html->link( __('video'),'/video'); ?></li>
					<li>  <?php echo $this->Html->link( __('contact'),'/lien-he'); ?></li>

				  
						</ul>
					  </div>
				</div>
			</div>
		</div>