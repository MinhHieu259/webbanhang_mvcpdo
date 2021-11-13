<section id="main-content">
	<section class="wrapper">
    <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php 
                                    if(!empty($_GET['msg'])){
                                        $msg = unserialize(urldecode($_GET['msg']));
                                        foreach ($msg as $item => $value) {
                                            echo $value;
                                        }
                                    }
                                ?>
                                <?php 
                                    foreach ($data['productbyid'] as $item => $value) {
                                ?>
                                <form action="<?php echo BASE_URL;?>/product/update_product/<?php echo $value['id_product']?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label style="font-size: 15px;">Tên sản phẩm</label>
                                    <input value="<?php echo $value['title_product']?>" type="text" name="title_product" class="form-control"  placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Hình ảnh sản phẩm</label>
                                    <input  type="file" name="image_product" class="form-control"  placeholder="Nhập số lượng sản phẩm">
                                    <p><img width="90" src="<?php echo BASE_URL.'/public/uploads/product/'.$value['image_product'];?>" alt="Ảnh sp"></p>
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Giá sản phẩm</label>
                                    <input value="<?php echo $value['price_product']?>" type="text" name="price_product" class="form-control"  placeholder="Nhập giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Mô tả sản phẩm</label>
                                    <textarea style="resize: none;"  class="form-control"  placeholder="Nhập mô tả sản phẩm" name="desc_product" rows="5"><?php echo $value['desc_product']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Số lượng sản phẩm</label>
                                    <input value="<?php echo $value['quantity_product']?>" type="text" name="quantity_product" class="form-control"  placeholder="Nhập số lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Danh mục sản phẩm</label>
                                    <select class="form-control" name="category_product">
                                        <?php 
                                            foreach ($data['category'] as $item => $category) {
                                        ?>
                                        <option <?php if($value['id_category_product'] == $category['id_category_product']) echo 'selected'; else echo ''; ?> value="<?php echo $category['id_category_product'];?>">
                                        <?php echo $category['title_category_product'];?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                           <?php 
                                    }
                           ?>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
</section>