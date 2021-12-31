<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					
					
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ Online</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Trạng thái đặt hàng</a></li>
								<li><a href="#">Thay đổi vị trí</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều kiện sử dụng</a></li>
								<li><a href="#">Chính sách riêng tư</a></li>
								<li><a href="#">Chính sách đền bù</a></li>
								<li><a href="#">Hệ thống thanh toán</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thông tin Website</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin công ty</a></li>
								<li><a href="#">Nghề nghiệp</a></li>
								<li><a href="#">Địa chỉ</a></li>
								<li><a href="#">Chi nhánh</a></li>
								<li><a href="#">Bản quyền Website thuộc về Minh Hiếu</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>	
	</footer><!--/Footer-->
	

  
    <script src="<?php echo BASE_URL;?>/public/js/jquery.js"></script>
	<script src="<?php echo BASE_URL;?>/public/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL;?>/public/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo BASE_URL;?>/public/js/price-range.js"></script>
    <script src="<?php echo BASE_URL;?>/public/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo BASE_URL;?>/public/js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<?php 
         if(!empty($_GET['msg'])){
			 ?>
			 <?php
			 if(isset($_GET['msg'])){
			$msg = unserialize(urldecode($_GET['msg']));
			foreach ($msg as $item => $value) {
			?>
				<script>swal("Thành công!", "<?php echo $value;?>", "success");</script>
			
				<?php }}}?>
	
		<?php 
         if(!empty($_GET['error'])){
			 ?>
			 <?php
			 if(isset($_GET['error'])){
			$msg = unserialize(urldecode($_GET['error']));
			foreach ($msg as $item => $value) {
			?>
				<script>swal("Thất bại!", "<?php echo $value;?>", "error");</script>
			
				<?php }}}?>	

				<?php 
         if(!empty($_GET['warning'])){
			 ?>
			 <?php
			 if(isset($_GET['warning'])){
			$msg = unserialize(urldecode($_GET['warning']));
			foreach ($msg as $item => $value) {
			?>
				<script>swal("Thất bại!", "<?php echo $value;?>", "warning");</script>
			
				<?php }}}?>	
	
</body>
</html>
