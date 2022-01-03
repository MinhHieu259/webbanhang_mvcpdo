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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

			<script>
				function changeImage(imgs) {
							var expandImg = document.getElementById("expandedImg");
							
							expandImg.src = imgs.src;
							
							expandImg.parentElement.style.display = "block";
						}
			</script>

<script type="text/javascript">
				$(document).ready(function(){
					var action = "search";
					$('#txt_Search').keyup(function(){
						var search_name = $("#txt_Search").val();
						if($("#txt_Search").val() != ''){
							$.ajax({
							url: "<?php echo BASE_URL;?>/product/search_product",
							method:"POST",
							data:{action:action,search_name:search_name},
							success:function(data){
								$('#output_search').html(data);
							}
						});
						}else{
							$('#output_search').html("");
						}
						
						console.log(action);
					});

					
				});
			</script>
	
</body>
</html>
<div class="modal fade" id="review_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Viết đánh giá</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-center mt-2 mb-4">
				<i class="fas fa-star star-light submit_star mr-1" 
				id="submit_star_1" data-rating="1"></i>
				<i class="fas fa-star star-light submit_star mr-1" 
				id="submit_star_2" data-rating="2"></i>
				<i class="fas fa-star star-light submit_star mr-1" 
				id="submit_star_3" data-rating="3"></i>
				<i class="fas fa-star star-light submit_star mr-1" 
				id="submit_star_4" data-rating="4"></i>
				<i class="fas fa-star star-light submit_star mr-1" 
				id="submit_star_5" data-rating="5"></i>
		</h4>
		<div class="form-group">
			<textarea placeholder="Viết đánh giá" class="form-control" name="text_comment" id="user_review"></textarea>
		</div>
		<div class="form-group text-center mt-4">
				<button type="button" class="btn btn-primary" id="save_review">Đánh giá</button>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		var rating_data = 0;
		$('#add_review').click(function(){
			$('#review_modal').modal('show');
		});

		$(document).on('mouseenter', '.submit_star', function(){
			var rating = $(this).data('rating');

			 reset_background();
			for(var count = 1; count <= rating; count++){
				$('#submit_star_'+count).addClass('text-primary');
			}
		});
		function reset_background() {
			for (var count = 1; count <=5; count++) {
				
				$('#submit_star_'+count).addClass('star-light');

				$('#submit_star_'+count).removeClass('text-primary');
				
			}
		}

		$(document).on('mouseleave', '.submit_star', function(){
			reset_background();
		});

		$(document).on('click', '.submit_star', function(){
			rating_data = $(this).data('rating');
		});
		<?php foreach ($data['detail_product'] as $item => $detail_pro) {
					$id_pro = $detail_pro['id_product'];
				}?>
		$('#save_review').click(function(){
			var user_review = $('#user_review').val();
			if (user_review == '') {
				
				swal("Lỗi!", "Chưa nhập đánh giá!", "warning");
				return false;
			}else{
				
				$.ajax({
					url:"<?php echo BASE_URL;?>/product/binhluan/<?php echo $id_pro;?>",
					method:"POST",
					data:{rating_data:rating_data, user_review:user_review},
					success:function(data){
						$('#review_modal').modal('hide');
						load_rating_data();
						swal(data);
					}
				});
			}
		});
		load_rating_data();
		function load_rating_data()
		{
			$.ajax({
				url:"<?php echo BASE_URL;?>/product/loadSoSao/<?php echo $id_pro;?>",
				method:"POST",
				data:{action:'load_data'},
				dataType:"JSON",
				success:function(data){
					$('#average_rating').text(data.average_rating);
					$('#total_review').text(data.total_review);

					var count_star =0;
					$('.main_star').each(function(){
						count_star++;
						if(Math.ceil(data.average_rating) >= count_star){
							$(this).addClass('text-primary');
							$(this).addClass('star-light');
						}
					});
					$('#total_file_star_review').text(data.five_star_review);
					$('#total_four_star_review').text(data.four_star_review);
					$('#total_three_star_review').text(data.three_star_review);
					$('#total_two_star_review').text(data.two_star_review);
					$('#total_one_star_review').text(data.one_star_review);

					$('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 +
					'%');
					$('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 +
					'%');
					$('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 +
					'%');
					$('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 +
					'%');
					$('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 +
					'%');

					if(data.review_data.length > 0){
						var html = '';
						for(var count = 0 ; count < data.review_data.length; count++){
							html+= '<div class="row mb-3">';

							html+= '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].name_customer.charAt(0)+'</h3></div></div>';

							html+= '<div class="col-sm-11">';

							html+= '<div class="card">';

							html+= '<div class="card-header"><b>'+data.review_data[count].name_customer+'</b></div>'

							html += '<div class="card-body">';
								for(var star =1; star<=5; star++){
									var class_name = '';
									if(data.review_data[count].rating >= star){
										class_name= 'text-primary';

									}else{
										class_name = 'star-light';
									}
									html+= '<i class="fas fa-star '+class_name+' mr-1"></i>';
								}

							html+= '<br>';
							
							html+= data.review_data[count].content;

							html+= '</div>';

							

							html+= '</div>';

							html+= '</div>';

							html+= '</div>';
							html+= '<br>';
						}

						$('#review_content').html(html);
					}
				}
			});
		}
	});
</script>
