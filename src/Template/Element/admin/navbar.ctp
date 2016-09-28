<?php $session = $this->request->session(); 
$lang = $session->read('language');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Dashboard</title>
<style>
div.wrapper{
    margin-left: -10%;
}
.incon_admin{
	float:right;
	margin-top :1.5%;
	padding-right: 3%;
}
img.incon-_admin{
width :21px;
}
</style>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/bootstrap.min.css" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/AdminLTE.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/_all-skins.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/AdminLTE.min.css" />

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Self</b>Wing</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
	
  
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

<?php echo $this->Html->script('jquery-2.1.4.min'); ?>
<?php echo $this->Html->script('bootstrap.min.js'); ?>>
<?php echo $this->Html->script('app.min.js'); ?>
<?php echo $this->Html->script('dashboard2'); ?>
   