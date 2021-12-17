<body>
	<section >
		<div class="container" style="margin: 0 auto;">
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="shopper-info">
						<center><p>Cập nhật thông tin cá nhân</p></center>
						<?php foreach ( $data['user_infor'] as $item => $infor) {
							?>
							<form method="POST" action="<?php echo BASE_URL;?>/customer/update_infor">
								<input value="<?php echo $infor['customer_name']?>" name="hoten" type="text" placeholder="Họ Tên">
								<input value="<?php echo $infor['customer_phone']?>" name="sodt" type="text" placeholder="Số điện thoại">
								<input value="<?php echo $infor['customer_address']?>" name="diachi" type="text" placeholder="Địa chỉ">
								<button type="submit" class="btn btn-primary" href="">Cập nhật</button>
							</form>
						<?php }?>
						</div>
					</div>
					
									
				</div>
			</div>
			</div>
	</section>