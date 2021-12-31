<div class="col-sm-3">
					<div class="left-sidebar">
						<br>
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
                                <?php foreach ($data['category'] as $item => $category) {
                                    
                                ?>
								<div class="panel-heading">
									<h4 class="panel-title">
										<a  href="<?php echo BASE_URL;?>/product/product_category/<?php echo $category['id_category_product'];?>">
											<?php echo $category['title_category_product']?>
										</a>
									</h4>
								</div>
                                <?php }?>
							</div>
						</div><!--/category-products-->

					</div>
				</div>