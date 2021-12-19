<section id="cart_items">
		<div class="container">
		<center><p style="font-size: 20px; color: blue;">Chi tiết đơn hàng</p></center>
			<div class="table-responsive cart_info">
				
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Đơn giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>
						<?php 
						$tongtien = 0;
						
							foreach ( $data['order_details'] as $item => $orderitem) {
								$thanhtien = $orderitem['product_quantity'] * $orderitem['price_product'];
								$tongtien+= $thanhtien;
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img width="150" src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $orderitem['image_product'];?>" alt="<?php echo $orderitem['title_product'];?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href="#"><?php echo $orderitem['title_product'];?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p><?php echo number_format($orderitem['price_product'],0,',','.')." VNĐ";?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
		
									<input class="cart_quantity_input" type="number" name="quantity[]" value="<?php echo $orderitem['product_quantity'];?>" autocomplete="off" size="2">
									<input type="hidden" name="id_product[]" value="<?php echo $orderitem['id_product'];?>">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($thanhtien,0,',','.').' VNĐ';?></p>
							</td>
						
						</tr>
						<?php 
							}
						
						?>
					</tbody>
				</table>
				
			</div>
		</div>
	</section> <!--/#orderitems-->

	
    <section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền: <span><?php echo number_format( $tongtien, 0,',','.').' VNĐ';?></span></li>
							<li>Thuế <span>0%</span></li>
							<li>Phí ship <span>Free</span></li>
							<li>Tổng thanh toán: <span><?php echo number_format( $tongtien, 0,',','.').' VNĐ';?></span></li>
						</ul>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	