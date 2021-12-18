<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<div class="example">
            <div class="container">
                <div class="row">
                    <h2 class="text-center">LIỆT KÊ ĐƠN HÀNG</h2>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#chuaduyet" data-toggle="tab">Chưa duyệt</a></li>
                        <li><a href="#daduyet" data-toggle="tab">Đã duyệt</a></li>
                        <li><a href="#hoantat" data-toggle="tab">Đã hoàn tất</a></li>
                    </ul>
 
                    <div class="tab-content">
                        <div style="padding: 10px;" class="tab-pane active" id="chuaduyet">
						<div class="panel panel-default">
    <div class="panel-heading">
      Danh sách các đơn hàng chưa duyệt
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <?php 
                  if(!empty($_GET['msg'])){
                     $msg = unserialize(urldecode($_GET['msg']));
                     foreach ($msg as $item => $value) {
                      echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
                   }
                    }
            ?>
      <table class="table table-striped b-t b-light" style="font-size: 16px;">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>ID đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         <?php 
		 	$i = 0;
		 foreach ($data['order_chuaduyet'] as $item => $order_chuaduyet) {
			$i ++;
		 ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo $i;?></td>
            <td><span class="text-ellipsis"><?php echo $order_chuaduyet['order_id'];?></span></td>
            <td><span class="text-ellipsis"><?php echo $order_chuaduyet['order_date'];?></span></td>
            <td>
			<a class="active" href="<?php echo BASE_URL?>/order/chitietdonhang/<?php echo $order_chuaduyet['order_id'];?>">Xem </a>
              <a class="active" href="<?php echo BASE_URL?>/order/duyetdon/<?php echo $order_chuaduyet['order_id'];?>">Duyệt</a>
            </td>
          </tr>
         <?php }?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
						</div>
                        <div style="padding: 10px;" class="tab-pane" id="daduyet">
						<div class="panel panel-default">
    <div class="panel-heading">
      Danh sách các đơn hàng đã duyệt
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <?php 
                  if(!empty($_GET['msg'])){
                     $msg = unserialize(urldecode($_GET['msg']));
                     foreach ($msg as $item => $value) {
                      echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
                   }
                    }
            ?>
      <table class="table table-striped b-t b-light" style="font-size: 16px;">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         
		<?php 
		 	$i = 0;
		 foreach ($data['order_daduyet'] as $item => $order_daduyet) {
			$i ++;
		 ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo $i;?></td>
            <td><span class="text-ellipsis"><?php echo $order_daduyet['order_id'];?></span></td>
            <td><span class="text-ellipsis"><?php echo $order_daduyet['order_date'];?></span></td>
            <td>
			<a class="active" href="<?php echo BASE_URL?>/order/chitietdonhang/<?php echo $order_daduyet['order_id'];?>">Xem </a>
              <a class="active" href="<?php echo BASE_URL?>/order/hoantat/<?php echo $order_daduyet['order_id'];?>">Hoàn tất</a>
            </td>
          </tr>
         <?php }?>
         
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
						</div>
                       
						<div style="padding: 10px;" class="tab-pane" id="hoantat">
						<div class="panel panel-default">
    <div class="panel-heading">
      Danh sách các đơn hàng đã hoàn tất
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <?php 
                  if(!empty($_GET['msg'])){
                     $msg = unserialize(urldecode($_GET['msg']));
                     foreach ($msg as $item => $value) {
                      echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
                   }
                    }
            ?>
      <table class="table table-striped b-t b-light" style="font-size: 16px;">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         
		<?php 
		 	$i = 0;
		 foreach ($data['order_hoantat'] as $item => $order_hoantat) {
			$i ++;
		 ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo $i;?></td>
            <td><span class="text-ellipsis"><?php echo $order_hoantat['order_id'];?></span></td>
            <td><span class="text-ellipsis"><?php echo $order_hoantat['order_date'];?></span></td>
            <td>
			<a class="active" href="<?php echo BASE_URL?>/order/chitietdonhang/<?php echo $order_hoantat['order_id'];?>">Xem </a>
              <a class="active" href="<?php echo BASE_URL?>/category/delete_category/"><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
         <?php }?>
         
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
</section>