<html>
<head>

<!--------------------
LOGIN FORM
by: Amit Jakhu
www.amitjakhu.com
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>

<!--STYLESHEETS-->
<link href="<?php echo base_url();?>asset/js/plugins/chosen/chosen/chosen.css" rel="stylesheet">
<link href="<?php echo base_url();?>asset/css/twitter/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>asset/css/base.css" rel="stylesheet">
<link href="<?php echo base_url();?>asset/css/twitter/responsive.css" rel="stylesheet">
<link href="<?php echo base_url();?>asset/css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="<?php echo base_url();?>asset/js/plugins/modernizr.custom.32549.js"></script>
<link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" type="text/css" />


</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	
<!--END LOGIN FORM-->

<div class="span5">
          <div class="box paint color_2">
            <div class="title">
              <h4> <i class="icon-calendar"></i> <span>Login form</span> </h4>
            </div>
            <div class="content ">
              <form class="bs-docs-example form-horizontal" method="POST">
               <?php if($this->session->flashdata('message')):?>
<?php echo $this->session->flashdata('message');?>
<?php endif;?>
<?php echo validation_errors();?>
<?php echo form_open('user/login') ?>
                <div class="control-group row-fluid">
                  <label class="control-label span3" for="inputPassword">Username</label>
                  <div class="controls span9 input-append">
                    <input type="text"  id="inputUsername" placeholder="Username" name="username" class="row-fluid">
                    <span class="add-on"><i class="icon-user"></i></span> </div>
                </div>
                <div class="control-group row-fluid">
                  <label class="control-label span3" for="inputPassword">Password</label>
                  <div class="controls span9 input-append">
                    <input type="password" id="inputPassword" name="password" placeholder="Password" class="row-fluid">
                    <span class="add-on"><i class="icon-lock"></i></span> </div>
                </div>
               
                <div class="control-group row-fluid">
                 <div class="span3 visible-desktop"></div>
                  <div class="controls span5">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

</div>
<!--END WRAPPER-->



</body>
</html>
