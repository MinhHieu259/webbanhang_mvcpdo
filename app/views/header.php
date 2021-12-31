<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Minh Hiếu</title>
    <link href="<?php echo BASE_URL;?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/public/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/public/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/public/css/price-range.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/public/css/animate.css" rel="stylesheet">
	<link href="<?php echo BASE_URL;?>/public/css/main2.css" rel="stylesheet">
	<link href="<?php echo BASE_URL;?>/public/css/responsive.css" rel="stylesheet">
	                      
    
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo BASE_URL;?>/public/uploads/logo.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo BASE_URL;?>/public/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo BASE_URL;?>/public/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo BASE_URL;?>/public/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo BASE_URL;?>/public/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="<?php echo BASE_URL;?>"><img width="100" src="<?php echo BASE_URL;?>/public/uploads/logo.jpg" alt="" /></a>
						</div>
						
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
							<?php 
									if(Session::get("customer_login") == true){
							?>
								<li><a href="<?php echo BASE_URL?>/customer/Account"><i class="fa fa-user"></i> Tài khoản</a></li>
								<?php }?>

							<?php 
									if(Session::get("customer_login") == true){
							?>
								<li><a href="<?php echo BASE_URL;?>/product/sanphamyeuthich"><i class="fa fa-star"></i> Yêu thích</a></li>
								<?php }?>
								<?php 
									if(Session::get("customer_login") == true){
							?>
								<li><a href="<?php echo BASE_URL;?>/order/listorder"><i class="fa fa-crosshairs"></i>Đơn hàng</a></li>
								<?php }?>
								<li><a href="<?php echo BASE_URL;?>/cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php 
									if(Session::get("customer_login") == true){
								?>
									<li><a href="<?php echo BASE_URL;?>/customer/dangxuat"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								<?php }else{?>
									<li><a href="<?php echo BASE_URL;?>/customer/dangnhap_dangky"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<?php }?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo BASE_URL;?>/index" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<?php 
											foreach ($data['category'] as $item => $category) {
										?>
                                        <li class="dropdown"><a href="<?php echo BASE_URL;?>/product/product_category/<?php echo $category['id_category_product']?>">
										<?php echo $category['title_category_product']?></a></li>
										<?php 
											}
										?>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Thương hiệu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Apple</a></li>
										
                                    </ul>
                                </li> 
								<li><a href="<?php echo BASE_URL;?>/product/tatcasanpham">Sản phẩm</a></li>
								<li><a href="<?php echo BASE_URL;?>/index/lienhe">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->