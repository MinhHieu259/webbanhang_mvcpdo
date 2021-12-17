<body>
	<section >
		<div class="container">
			<div class="shopper-informations">
				<div class="row text-center padding">
					<div class="col-sm-12">
						<div class="shopper-info">
						<center><p>Cập nhật thông tin cá nhân</p></center>
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