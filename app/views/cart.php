
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASE_URL;?>">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php if($data['cart'] != null){?>
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
					<form action="<?php echo BASE_URL;?>/cart/update" method="POST">
					<tbody>
						<?php 
						$tongtien = 0;
						if($data['cart'] != null){
							foreach ($data['cart'] as $item => $cart_item) {
								$thanhtien = $cart_item['quantity_product_cart'] * $cart_item['price_product'];
								$tongtien+= $thanhtien;
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img width="150" src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $cart_item['image_product'];?>" alt="<?php echo $cart_item['title_product'];?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href="#"><?php echo $cart_item['title_product'];?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p><?php echo number_format($cart_item['price_product'],0,',','.')." VNĐ";?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
		
									<input class="cart_quantity_input" type="number" name="quantity[]" value="<?php echo $cart_item['quantity_product_cart'];?>" autocomplete="off" size="2">
									<input type="hidden" name="id_product[]" value="<?php echo $cart_item['id_product'];?>">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($thanhtien,0,',','.').' VNĐ';?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo BASE_URL.'/cart/delete/'.$cart_item['id_cart_detail'];?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
							}
						}
						?>
					</tbody>
				</table>
				<?php }else{
					echo '<center style="padding:30px;"><span style="color:red;font-weight:bold;">GIỎ HÀNG ĐANG TRỐNG</span></center>';
				}?>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<?php if($data['cart'] != null){?>
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
							<button type="submit" class="btn btn-default update" href="">Cập nhật</button>
							<a href="<?php echo BASE_URL;?>/order" class="btn btn-default check_out" href="">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	</form>
	<?php }else{
		echo "";
	}?>