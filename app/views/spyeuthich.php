<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASE_URL;?>">Trang chủ</a></li>
				  <li class="active">Sản phẩm yêu thích</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php if($data['list_yeuthich'] != null){?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Đơn giá</td>
							<td></td>
						</tr>
					</thead>
					<form action="<?php echo BASE_URL;?>/cart/update" method="POST">
					<tbody>
						<?php 
						
						if($data['list_yeuthich']!= null){
							foreach ($data['list_yeuthich'] as $item => $yeuthich_item) {
								
						?>
						<tr>
							<td class="cart_product">
								<a href="<?php echo BASE_URL;?>/product/chitietsanpham/<?php echo $yeuthich_item['id_product'];?>"><img width="150" src="<?php echo BASE_URL;?>/public/uploads/product/<?php echo $yeuthich_item['image_product'];?>" alt="<?php echo $cart_item['title_product'];?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href="<?php echo BASE_URL;?>/product/chitietsanpham/<?php echo $yeuthich_item['id_product'];?>"><?php echo $yeuthich_item['title_product'];?></a></h4>
							
							</td>
							<td class="cart_price">
								<p><?php echo number_format($yeuthich_item['price_product'],0,',','.')." VNĐ";?></p>
							</td>
							
						
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo BASE_URL.'/product/delete_yeuthich/'.$yeuthich_item['id_yeuthich'];?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
							}
						}
						?>
					</tbody>
				</table>
				<?php }else{
					echo '<center style="padding:30px;"><span style="color:red;font-weight:bold;">KHÔNG CÓ SẢN PHẨM NÀO</span></center>';
				}?>
			</div>
		</div>
	</section> <!--/#cart_items-->

	