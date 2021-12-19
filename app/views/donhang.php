<section>
		<div class="container">
        <div class="col-sm-12 padding-right">
					
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#choxacnhan" data-toggle="tab">Chờ xác nhận</a></li>
								<li><a href="#danggiao" data-toggle="tab">Đang giao</a></li>
								<li><a href="#damua" data-toggle="tab">Đã mua</a></li>
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="choxacnhan" >
                                <?php if( $data['order_choxn'] != null){?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">ID đơn hàng</th>
                                    <th scope="col">Xem chi tiết</th>
                                    <th scope="col">Hủy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                    foreach ( $data['order_choxn'] as $item => $order_choxn) {
                                        $i++;
                                     ?>
                                    <tr>
                                    <th scope="row"><?php echo $i;?></th>
                                    <td><?php echo $order_choxn['order_id'];?></td>
                                    <td><a href="<?php echo BASE_URL;?>/order/chitietorder/<?php echo $order_choxn['order_id'];?>">Xem chi tiết</a></td>
                                    <td><a href="<?php echo BASE_URL;?>/order/huydon/<?php echo $order_choxn['order_id'];?>">Hủy đơn</a></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                            <?php }else{?>
                                <center><p style="color: blue;">KHÔNG CÓ ĐƠN HÀNG NÀO</p></center>
                                <?php }?>
							</div>
							
							<div class="tab-pane fade" id="danggiao" >
                            <?php if( $data['order_danggiao'] != null){?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">ID đơn hàng</th>
                                    <th scope="col">Xem chi tiết</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                    foreach ( $data['order_danggiao'] as $item => $order_danggiao) {
                                        $i++;
                                     ?>
                                    <tr>
                                    <th scope="row"><?php echo $i;?></th>
                                    <td><?php echo $order_danggiao['order_id'];?></td>
                                    <td><a href="<?php echo BASE_URL;?>/order/chitietorder/<?php echo $order_danggiao['order_id'];?>">Xem chi tiết</a></td>
                                   
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                            <?php }else{?>
                                <center><p style="color: blue;">KHÔNG CÓ ĐƠN HÀNG NÀO</p></center>
                                <?php }?>
							</div>
							
							<div class="tab-pane fade" id="damua" >
                            <?php if( $data['order_damua'] != null){?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">ID đơn hàng</th>
                                    <th scope="col">Xem chi tiết</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                    foreach ( $data['order_damua'] as $item => $order_damua) {
                                        $i++;
                                     ?>
                                    <tr>
                                    <th scope="row"><?php echo $i;?></th>
                                    <td><?php echo $order_damua['order_id'];?></td>
                                    <td><a href="<?php echo BASE_URL;?>/order/chitietorder/<?php echo $order_damua['order_id'];?>">Xem chi tiết</a></td>
                                    
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                            <?php }else{?>
                                <center><p style="color: blue;">KHÔNG CÓ ĐƠN HÀNG NÀO</p></center>
                                <?php }?>
							</div>
							
							
							
						</div>
					</div><!--/category-tab-->
	
				</div>
        </div>
</section>



