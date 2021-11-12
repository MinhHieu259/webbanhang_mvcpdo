<section id="main-content">
<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
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
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;
                foreach ($data['product'] as $item => $product) {
                    $i++;
            ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?php echo $i;?></td>
            <td><span class="text-ellipsis"><?php echo $product['title_product'];?></span></td>
            <td><img width="50" src="<?php echo BASE_URL.'/public/uploads/product/'.$product['image_product'];?>" alt="Ảnh sp"></td>
            <td><?php echo $product['title_category_product'];?></td>
            <td><span class="text-ellipsis"><?php echo number_format($product['price_product'],0,',','.').' VNĐ';?></span></td>
            <td><span class="text-ellipsis"><?php echo $product['quantity_product'];?></span></td>
            <td>
              <a class="active" href="<?php echo BASE_URL?>/product/edit_category/<?php echo $product['id_category_product'];?>"><i class="far fa-edit"></i></a>
              <a class="active" href="<?php echo BASE_URL?>/product/delete_product/<?php echo $product['id_product'];?>"><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          <?php 
                }
          ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"><?php echo 'Có tất cả '.$i.' sản phẩm';?></small>
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
</section>
