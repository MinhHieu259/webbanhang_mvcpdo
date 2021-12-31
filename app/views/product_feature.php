<body>
	<section>
		<div class="container">
			<div class="row">
				<?php include_once("sidebar.php");?>
				<div class="col-sm-9 padding-right">

					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm nổi bật</h2>
						<?php foreach ($data['list_product_feature'] as $item => $product) {?>
						<form action="<?php echo BASE_URL;?>/cart/addCart" method="post">
							<input type="hidden" name="product_id" value="<?php echo $product['id_product'];?>">
							<input type="hidden" name="product_quantity" value="1">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $product['image_product'];?>" alt="" />
											<h2><?php echo $product['title_product']?></h2>
											<p><?php echo $product['desc_product']?></p>
										
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo number_format($product['price_product'],0,',','.').' VNĐ';?></h2>
												<p><?php echo $product['desc_product']?></p>
												<button type="submit" href="<?php echo $product['id_product'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="<?php echo BASE_URL;?>/product/chitietsanpham/<?php echo $product['id_product'];?>"><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
										<li><a href="<?php echo BASE_URL;?>/product/add_yeuthich/<?php echo $product['id_product'];?>"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									</ul>
								</div>
							</div>
						</div>
						</form>
							<?php }?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	