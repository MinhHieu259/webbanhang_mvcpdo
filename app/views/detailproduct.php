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
					<?php include_once("sidebar.php");?>
				<div class="col-sm-9 padding-right">
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
								<p><b>Thương hiệu:</b> E-SHOPPER</p>
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
							<div class="row">
								<div class="col-sm-12">
									
									<?php if(Session::get("customer_id")!= null){?>
									<p><b>Viết đánh giá</b></p>
									
									<form method="POST" action="<?php echo BASE_URL;?>/product/binhluan/<?php echo $detail['id_product'];?>">
										
										<textarea name="text_comment" ></textarea>
	
										<button type="submit" class="btn btn-default pull-right">
											Đánh giá
										</button>
									</form>
										<?php }?>
										
										
								</div>
							</div>
							<div class="row">
							<div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Danh sách bình luận</h3>
                <span class="label label-info">
                    78</span>
            </div>
            <div class="panel-body">
                <ul class="list-group">
					<?php if($data['comment'] != null){?>
				<?php foreach ($data['comment'] as $item => $comment) {?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    
                                    <div class="mic-info">
                                        By: <a href="#"><?php echo $comment['customer_name']?></a> 
                                    </div>
                                </div>
                                <div class="comment-text">
								<?php echo $comment['content']?>
                                </div>
                               
                            </div>
                        </div>
                    </li>
					<?php }?>
					<?php }else{ echo '<center><span style="color:blue;">Chưa có bình luận nào</span></center>';}?>
                </ul>
                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> Xem thêm</a>
            </div>
        </div>
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
