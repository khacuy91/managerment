<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/admin/list-ad.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/admin/menu.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/bootstrap.min.css" />

<script src="<?php echo $this->request->webroot;?>js/jquery-2.1.4.js"></script>
<script src="<?php echo $this->request->webroot;?>js/admin_menu.js"></script>
<script src="<?php echo $this->request->webroot;?>js/bootstrap.min.js"></script>

<div style="text-align: center; width:1000px !important;"  class="tbl_list-ad2">
    <h4 style="font-size:15px; color:#e56360; margin-bottom: 20px;">DASHBOARD FOR ADMIN</h4>
    <div id='cssmenu' style="float:left;">
        <ul>
           <li><a target="_blank" class="btn btn-default" href="<?php echo $this->request->webroot ?>admin/vacation/listApprove"><span>Approve for Leader</span></a></li>
           <li><a target="_blank" class="btn btn-default" href="<?php echo $this->request->webroot ?>admin/users/register"><span>Register Users</span></a> </li>
           <li><a target="_blank" class="btn btn-default" href="<?php echo $this->request->webroot ?>admin/authors/index"><span>View Report</span></a></li>
           <li><a target="_blank" class="btn btn-default" href="<?php echo $this->request->webroot ?>admin/teams/listTeam"><span>Managerment Team</span></a></li>
           <li><a target="_blank" class="btn btn-default" href="<?php echo $this->request->webroot ?>admin/users/list_admin"><span>List Users</span></a></li>
           <li><a target="_blank" class="btn btn-default" href="<?php echo $this->request->webroot ?>admin/users/configs"><span> </span></a></li>
           <li><a target="_blank" class="btn btn-default" href="<?php echo $this->request->webroot ?>admin/users/change_password"><span></span></a></li>
        </ul>
    </div>
    
     

    
</div> 

    
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">ChangePassword</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


    <table border="0" cellspacing="0" cellpadding="0" style="width:400px;" class="tbl_list-ad2">
        <tbody>

            

        </tbody>
    </table> 
</div> 
