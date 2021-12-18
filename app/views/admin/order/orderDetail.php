<section id="main-content">
<section class="wrapper">
<section id="cart_items">
		<div class="container">
			
			<div class="table-responsive cart_info">
				
				<table class="table table-condensed">
					<thead>
                        <h2 style="text-align: center;">Chi tiết đơn hàng</h2>
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
                    foreach ($data['detail_order'] as $item => $detail_order) {
                        $thanhtien = $detail_order['product_quantity'] * $detail_order['price_product'];
                        $tongtien+= $thanhtien;
                    ?>
						<tr>
							<td class="cart_product">
								<a href=""><img width="150" src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $detail_order['image_product'];?>" alt="<?php echo $cart_item['title_product'];?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href="#"><?php echo $detail_order['title_product'];?></a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo number_format($detail_order['price_product'],0,',','.')." VNĐ";?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
		
									<input class="cart_quantity_input" type="number" name="quantity" value="<?php echo $detail_order['product_quantity'];?>" autocomplete="off" size="2">
									<input type="hidden" name="id_product[]" value="<?php echo $detail_order['id_product'];?>">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($thanhtien,0,',','.').' VNĐ';?></p>
							</td>
							
						</tr>
						<?php }?>
					</tbody>
				</table>
				
			</div>
		</div>
	</section> <!--/#cart_items-->

	
    <section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
                   
						<center><p>Thông tin người nhận</p></center>
						<?php 
							if(!empty($_GET['msg'])){
								$msg = unserialize(urldecode($_GET['msg']));
								foreach ($msg as $item => $value) {
									echo '<p style="color:green; text-align:center">'.$value.'</p>';
								}
							}
						?>
						
							
							<form action="<?php echo BASE_URL;?>/order/dathang" method="post">
                            <ul>
							<li style="background-color: white; list-style: none;"><input class="form-control" value="<?php echo $detail_order['customer_name']?>" name="hoten" type="text" placeholder="Họ Tên"></li>
							<li style="background-color: white; list-style: none;"><input class="form-control" value="<?php echo $detail_order['customer_phone']?>" name="sodt" type="text" placeholder="Số điện thoại"></li>
							<li style="background-color: white; list-style: none;"><input class="form-control" value="<?php echo $detail_order['customer_address']?>" name="diachi" type="text" placeholder="Địa chỉ"></li>
							
						</ul>
						
						
					</div>
				</div>

                <div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền: <span><?php echo number_format( $tongtien, 0,',','.').' VNĐ';?></span></li>
							<li>Thuế <span>0%</span></li>
							<li>Phí ship <span>Free</span></li>
							<li>Tổng thanh toán: <span><?php echo number_format( $tongtien, 0,',','.').' VNĐ';?></span></li>
						</ul>
							
					</div>
					</form>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	
</section>
