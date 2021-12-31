<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASE_URL;?>">Trang chủ</a></li>
				  <li class="active">Thanh toán</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php if($data['cart'] != null){?>
				<table class="table table-condensed">
					<thead>
                        <h2 style="text-align: center;">Sản phẩm sẽ đặt</h2>
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
					<div class="total_area" style="height: 300px;">
                   
						<center><p>Thông tin người nhận</p></center>
						<?php 
							if(!empty($_GET['msg'])){
								$msg = unserialize(urldecode($_GET['msg']));
								foreach ($msg as $item => $value) {
									echo '<p style="color:green; text-align:center">'.$value.'</p>';
								}
							}
						?>
						<?php foreach ( $data['user_infor'] as $item => $infor) {
							?>
							<form action="<?php echo BASE_URL;?>/order/dathang" method="post">
							
                            <ul>
							<li  style="background-color: white;"><input size="55" value="<?php echo $infor['customer_name']?>" name="hoten" type="text" placeholder="Họ Tên"></li>
							<li style="background-color: white;"><input size="55" value="<?php echo $infor['customer_phone']?>" name="sodt" type="text" placeholder="Số điện thoại"></li>
							<li style="background-color: white;"><input size="55" value="<?php echo $infor['customer_address']?>" name="diachi" type="text" placeholder="Địa chỉ"></li>
						</ul>
						<?php }?>
						
					</div>
				</div>

                <div class="col-sm-6">
					<div class="total_area" style="height: 300px;">
						<ul>
							<li>Tổng tiền: <span><?php echo number_format( $tongtien, 0,',','.').' VNĐ';?></span></li>
							<li>Thuế <span>0%</span></li>
							<li>Phí ship <span>Free</span></li>
							<li>Tổng thanh toán: <span><?php echo number_format( $tongtien, 0,',','.').' VNĐ';?></span></li>
						</ul>
							<center><button type="submit" class="btn btn-default check_out">Đặt hàng</button></center>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	<?php }else{
		echo "";
	}?>