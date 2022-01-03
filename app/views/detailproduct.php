<?php 
foreach ($data['detail_product'] as $item => $value) {
	$name_product = $value['title_product'];
	$name_cate_product = $value['title_category_product'];
	$id_cate = $value['id_category_product'];
}
?>
<section>
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASE_URL;?>">Trang chủ</a></li>
				  <li class="active">> <a href="<?php echo BASE_URL;?>/product/product_category/<?php echo $id_cate;?>"><?php echo $name_cate_product;?></a></li>
				  <li class="active">> <?php echo $name_product;?></li>
				</ol>
			</div>
			<div class="row">
					
				<div class="col-sm-12 padding-right">
					<form action="<?php echo BASE_URL;?>/cart/addCart" method="post">
					<?php foreach ($data['detail_product'] as $item => $detail) {
						
					?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img id="expandedImg" src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $detail['image_product'];?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">

										<div class="item active">
											<?php foreach ($data['image_desc'] as $item => $image_desc) {?>
										  <img onclick="changeImage(this);" width="80" src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $image_desc['image'];?>" alt="">
										  <?php }?>
		
										</div>
									</div>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $detail['title_product'];?></h2>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span><?php echo number_format($detail['price_product'],0,',','.').' VNĐ';?></span>
									<label>Số lượng:</label>
									<input type="hidden" name="product_id" value="<?php echo $detail['id_product'];?>">
									<input type="number" name="product_quantity" value="1" >
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm giỏ hàng
									</button>
								</span>
								<p><b>Tình trạng:</b> <?php if($detail['quantity_product'] > 0){
									echo "Còn hàng";
								}else{echo "hết hàng";}?></p>
								<p><b>Hàng:</b> Mới</p>
								
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<?php }?>
					</form>
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Chi tiết</a></li>
							
								
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								
								<p><?php echo $detail['desc_product'];?></p>
								
			
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
							<div class="container">
								<div class="card">
									<div class="card-header">Đánh giá sản phẩm</div>
									<div class="card-body">
										<div class="row">
											<div class="col-sm-4 text-center">
												<h1 class="text-primary mt-4 mb-4">
													<b><span id="average_rating">0.0</span> / 5</b>
												</h1>
												<div class="mb-3">
													<i class="fas fa-star star-light mr-1 main_star"></i>
													<i class="fas fa-star star-light mr-1 main_star"></i>
													<i class="fas fa-star star-light mr-1 main_star"></i>
													<i class="fas fa-star star-light mr-1 main_star"></i>
													<i class="fas fa-star star-light mr-1 main_star"></i>
												</div>
												<h3><span id="total_review">0</span> Đánh giá</h3>
											</div>
											<div class="col-sm-4">
												<p>
													<div class="progress-label-left">
														<b>5</b>
														<i class="fas fa-star text-primary"></i>
													</div>

													<div class="progress-label-right">( <span id="total_file_star_review">0</span> )</div>
													<div class="progress">
														<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" 
														aria-valuemin="0" aria-valuemax="100" id="five_star_progress" >

														</div> 
													</div>
												</p>
												<p>
												<div class="progress-label-left">
														<b>4</b>
														<i class="fas fa-star text-primary"></i>
													</div>

													<div class="progress-label-right">( <span id="total_four_star_review">0</span> )</div>
													<div class="progress">
														<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" 
														aria-valuemin="0" aria-valuemax="100" id="four_star_progress" >

														</div> 
													</div>
				
												</p>
												<p>
												<div class="progress-label-left">
														<b>3</b>
														<i class="fas fa-star text-primary"></i>
													</div>

													<div class="progress-label-right">( <span id="total_three_star_review">0</span> )</div>
													<div class="progress">
														<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" 
														aria-valuemin="0" aria-valuemax="100" id="three_star_progress" >

														</div> 
													</div>
												</p>
												<p>
												<div class="progress-label-left">
														<b>2</b>
														<i class="fas fa-star text-primary"></i>
													</div>

													<div class="progress-label-right">( <span id="total_two_star_review">0</span> )</div>
													<div class="progress">
														<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" 
														aria-valuemin="0" aria-valuemax="100" id="two_star_progress" >

														</div> 
													</div>
												</p>
												<p>
												<div class="progress-label-left">
														<b>1</b>
														<i class="fas fa-star text-primary"></i>
													</div>

													<div class="progress-label-right">( <span id="total_one_star_review">0</span> )</div>
													<div class="progress">
														<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" 
														aria-valuemin="0" aria-valuemax="100" id="one_star_progress" >

														</div> 
														
													</div>
													
												</p>
											</div>
											<div class="col-sm-4 text-center">
												<h3 class="mt-4 mb-3">Viết đánh giá</h3>
												<?php if(Session::get("customer_id") != ""){?>
												<button type="button" name="add_review" id="add_review" class="btn btn-primary">Đánh giá</button>
												<?php }else{?>
													<a href="<?php echo BASE_URL;?>/customer/dangnhap_dangky" style="color: red;">Đăng nhập để đánh giá</a>
													<?php }?>
											</div>
										</div>
									</div>
								</div>
								<div class="mt-5" id="review_content"></div>
							</div>
						
								
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm tương tự</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php foreach ($data['relate_product'] as $item => $relate) {
										
									?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="<?php echo BASE_URL;?>/product/chitietsanpham/<?php echo $relate['id_product'];?>"><img src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $relate['image_product'];?>" alt="" /></a>
													<h2><?php echo number_format($relate['price_product'],0,'.',',').' VNĐ';?></h2>
													<p><?php echo $relate['title_product'];?></p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
												</div>
											</div>
										</div>
									</div>
								<?php }?>
									
								</div>
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
