<body>
	<section>
		<div class="container">
			<div class="row">
				<?php include_once("sidebar.php");?>
				<div class="col-sm-9 padding-right">
					<?php include_once("product_feature.php");?>
				
					<?php foreach ($data['category'] as $item => $cate) {?>
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center"><a href="<?php echo BASE_URL;?>/product/product_category/<?php echo $cate['id_category_product']?>"><?php echo $cate['title_category_product'];?></a></h2>
						<?php foreach ($data['list_product'] as $item => $product_cate_home) {
							if($cate['id_category_product'] == $product_cate_home['id_category_product']){
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $product_cate_home['image_product'];?>" alt="" />
											<h2><?php echo $product_cate_home['title_product']?></h2>
											<p><?php echo $product_cate_home['desc_product']?></p>
										
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo number_format($product_cate_home['price_product'],0,',','.').' VNĐ';?></h2>
												<p><?php echo $product_cate_home['desc_product']?></p>
												<a href="<?php echo $product_cate_home['id_product'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="<?php echo BASE_URL;?>/product/chitietsanpham/<?php echo $product_cate_home['id_product'];?>"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php }
					}?>
					</div><!--/recommended_items-->
					<?php }?>
				</div>
			</div>
		</div>
	</section>
	
	