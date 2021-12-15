
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Đăng nhập admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?php echo BASE_URL;?>/public/template/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo BASE_URL;?>/public/template/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo BASE_URL;?>/public/template/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo BASE_URL;?>/public/template/css/font.css" type="text/css"/>
<link href="<?php echo BASE_URL;?>/public/template/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?php echo BASE_URL;?>/public/template/js/jquery2.0.3.min.js"></script>
</head>
<body style="background-color:#f0bcb4 ;">
<div class="log-w3">
<div class="w3layouts-main">
	<h2>ĐĂNG NHẬP</h2>
    <?php 
        if(isset($message['msg'])){
        ?>
            <p style="color: green;"><?php echo $message['msg'];?></p>
        <?php 
        }
        ?>
		<form autocomplete="off" action="<?php echo BASE_URL;?>/login/authentication_login" method="post">
			<input type="text" class="ggg" name="username" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Nhớ tài khoản</span>
			<h6><a href="#">Quên mật khẩu ?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
		<p>Chưa có tài khoản ?<a href="registration.html">Đăng ký</a></p>
</div>
</div>
<script src="<?php echo BASE_URL;?>/public/template/js/bootstrap.js"></script>
<script src="<?php echo BASE_URL;?>/public/template/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo BASE_URL;?>/public/template/js/scripts.js"></script>
<script src="<?php echo BASE_URL;?>/public/template/js/jquery.slimscroll.js"></script>
<script src="<?php echo BASE_URL;?>/public/template/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo BASE_URL;?>/public/template/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo BASE_URL;?>/public/template/js/jquery.scrollTo.js"></script>
</body>
</html>

