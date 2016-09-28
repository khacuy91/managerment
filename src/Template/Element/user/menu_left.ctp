 <?php
    $session    = $this->request->session();
    $userLogin  = $session->read('userLogin');
?>
   <?php  use app\controller\VacationController;  ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="UTF-8" />
<title>My_Page</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/reset.css"/><link rel="stylesheet" href="<?php echo $this->request->webroot?>css/style.css"/>
<link rel="stylesheet" href="<?php echo $this->request->webroot?>css/bootstrap.min.css"/><link rel="stylesheet" href="<?php echo $this->request->webroot?>css/light-bootstrap-dashboard.css"/>
<script src="<?php echo $this->request->webroot?>/js/jquery-2.1.4.js"></script><script src="<?php echo $this->request->webroot?>js/bootstrap.min.js"></script><script src="/managerment/js/jquery.validate.js"></script>
<style type="text/css" media="screen">
  .error-message{
    color:red;
  }  
</style>
</head>
<body >
   
    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/list.css"/> 
 
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper" style="background-color: #44a1dc;">
             
             
            <ul class="nav">
                <?php // if(empty($checkisLeader)){ ?>
                <li class="active-pro">
                    <a href="<?php echo $this->request->webroot?>vacation/addVacation">
                        <i class="pe-7s-rocket"></i>
                        <p>Create Form dayOff</p>
                    </a>
                </li>
                <?php // } ?>
                <li class="active-pro">
                    <a href="<?php echo $this->request->webroot?>vacation/yourVacation">
                        <i class="pe-7s-rocket"></i>
                        <p>View Annual-leave-(<?php echo VacationController::total() ?> )   </p>
                    </a>
                </li>
                
              
                 <?php if(isset($checkisLeader)){ ?>
                 <li class="active-pro">
                    <a href="<?php echo $this->request->webroot?>vacation/listApprove">
                        <i class="pe-7s-rocket"></i>
                        <p>List Annual-leave-(<?php // echo VacationController::totalApprove() ?>)</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="<?php echo $this->request->webroot?>vacation/leaderDayoff">
                        <i class="pe-7s-rocket"></i>
                        <p>Form Dayoff for leader</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="<?php echo $this->request->webroot?>vacation/listdayoff">
                        <i class="pe-7s-rocket"></i>
                        <p>DayOff for Team</p>
                    </a>
                </li>
                <?php  } ?>
                 
            </ul>
        </div>
    </div>