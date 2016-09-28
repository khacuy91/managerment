<?php 
    $session    = $this->request->session();
    $userLogin  = $session->read('userLogin');
 ?>
<nav role="navigation">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $userLogin->full_name; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo $this->request->webroot?>users/updateProfile/<?php echo $userLogin->id; ?>">UpdateProfile</a></li>
                        <li><a href="<?php echo $this->request->webroot?>users/changePassword">ChangePassword</a></li>
                        <li><a href="<?php echo $this->request->webroot?>users/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div> 
