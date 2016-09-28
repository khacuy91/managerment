 <!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="UTF-8" />
<title>Login</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<!-- <link rel="stylesheet" type="text/css" href="css/import.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" /> -->
<?php echo $this->Html->css('reset'); ?>
<?php echo $this->Html->css('style'); ?>
<?php echo $this->Html->css('login'); ?>
<?php echo $this->Html->script('jquery-2.1.4'); ?>
</head>

<body>


<div class="login_all">


<div class="login_left">

    <div class="ttl_form" style="background-color:#e56360"><div class="txt_form"><?php echo __(' Admin Login ')?></div></div>

    <div class="login_bg">

  <!--<div class="login_txt"><a href="<?php // echo $this->request->webroot;?>authors/forgot_password">ID・パスワードを忘れた</a></div> -->

    <?php echo $this->Form->create(null, ['id'=> 'login_form']); ?>
    <dl>
    <?php if (isset($error_message)) {?>
    <p style="color:red;text-align: center;"><?php echo $error_message;?></p>
    <?php }?>
        <dt>UserName</dt>
        <dd class="essential">
            <input type="text" name="username" id="username" placeholder="Your Username">
        </dd>
        <dt>Password</dt>
        <dd class="essential"> 
            <input type="password" name="password" id="password" placeholder="Your Password">         
    </dl>
      <div class="login_btn"><input type="submit" id="login_submit_button" name="login_submit_button" value="Login" style ="height :10%;" /></div>
    </form>
  
  

    </div>
    </div>

  </div>
</body>
</html>

