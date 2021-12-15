<body>
<section id="form"><!--form-->
		<div class="container">
			<?php 
				 if(!empty($_GET['msg'])){
					$msg = unserialize(urldecode($_GET['msg']));
					foreach ($msg as $item => $value) {
						echo '<p style="color:green; text-align:center">'.$value.'</p>';
					}
				}
			?>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form autocomplete="off" action="<?php echo BASE_URL;?>/customer/dangnhap" method="POST">
							
							<input name="txtEmailLogin" type="email" placeholder="Email" />
                            <input name="txtPassLogin" type="password" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Lưu thông tin
							</span>
							<button type="submit" name="dangnhap" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">HOẶC</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký!</h2>
						<form action="<?php echo BASE_URL;?>/customer/dangky" method="POST">
							<input type="text" name="name" placeholder="Tên khách hàng"/>
                            <input type="text" name="phone" placeholder="Số điện thoại">
							<input type="email" placeholder="Email" name="email"/>
							<input type="password" placeholder="Mật khẩu" name="password"/>
                            <input type="text" name="address" placeholder="Địa chỉ">
							<button type="submit" name="dangky" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
</body>