<?php use app\controller\admin\SerVicesController; ?>
<!DOCTYPE html>
<html>
<head>
  <?php echo $this->Html->css('style'); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/AdminLTE.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/_all-skins.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/AdminLTE.min.css" />
<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo $this->request->webroot?>images/logo.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Admin</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview">
            <a href="<?php echo $this->request->webroot?>admin/intro/listIntro">
              <i class="fa fa-files-o"></i>
              <span><?php echo __('Bài Giới Thiệu');?></span>     
            </a>
          </li>
          <li class="treeview">
            <a href="<?php echo $this->request->webroot?>admin/contacts/listContacts">
              <i class="fa fa-files-o"></i>
              <span><?php echo __('Liên Hệ');?></span>     
            </a>
          </li>
  		 <li>
            <a href="<?php echo $this->request->webroot?>admin/emails/list_emails">
              <i class="fa fa-th"></i> <span><?php echo __('Quản Lý Email');?></span>  
            </a>
          </li>
          <li>
            <a href="<?php echo $this->request->webroot?>admin/news/listNews">
              <i class="fa fa-th"></i> <span><?php echo __('Tin Tức & Sự Kiện');?></span>  
            </a>
          </li>
          <li>
            <a href="<?php echo $this->request->webroot?>admin/banners/listBanners ">
              <i class="fa fa-calendar"></i> <span><?php echo __('Banner');?></span>
            </a>
          </li>
          <li>
            <a href="<?php echo $this->request->webroot?>admin/jobs/listJobs">
              <i class="fa fa-envelope"></i> <span><?php echo __('Quản Lý Công VIệc');?></span>
            </a>
          </li>
          <li class="treeview">
            <a href="<?php echo $this->request->webroot?>admin/ServicesType/listServicesType">
              <i class="fa fa-folder"></i> <span><?php echo __('Quản Lý Dịch Vụ');?></span>
              
            </a>
             
          </li>
          <li class="treeview">
            <a href="<?php echo $this->request->webroot?>admin/videos/list_videos">
              <i class="fa fa-folder"></i> <span><?php echo __('Quản Lý Video');?></span>
               
            </a>
            
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span><?php echo __('Quản Trị');?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo $this->request->webroot?>admin/users/changePassword"><i class="fa fa-circle-o"></i>Đổi Mật Khẩu</a></li>
              <li>
                <a href="<?php echo $this->request->webroot?>admin/users/logout"><i class="fa fa-circle-o"></i><?php echo __('Đăng Xuất');?> <i class="fa fa-angle-left pull-right"></i></a>
              </li>
            </ul>
          </li>
      </section>  
    <footer>          
    </aside> 
  </div><!-- ./wrapper -->

   
  <?php echo $this->Html->script('bootstrap.min.js'); ?>>
  <?php echo $this->Html->script('app.min.js'); ?>
  <?php echo $this->Html->script('dashboard2'); ?>

</body>
</html>
