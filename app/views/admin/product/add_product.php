<section id="main-content">
	<section class="wrapper">
    <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form action="<?php echo BASE_URL;?>/product/insert_product" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label style="font-size: 15px;">Tên sản phẩm</label>
                                    <input type="text" name="title_product" class="form-control"  placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Hình ảnh sản phẩm</label>
                                    <input type="file" name="image_product" class="form-control"  placeholder="Nhập số lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Hình ảnh mô tả</label>
                                    <input multiple="multiple" type="file" name="image_product_desc[]" class="form-control"  placeholder="Nhập số lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Giá sản phẩm</label>
                                    <input type="text" name="price_product" class="form-control"  placeholder="Nhập giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Mô tả sản phẩm</label>
                                    <textarea style="resize: none;"  class="form-control"  placeholder="Nhập mô tả sản phẩm" name="desc_product" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Số lượng sản phẩm</label>
                                    <input type="text" name="quantity_product" class="form-control"  placeholder="Nhập số lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;">Danh mục sản phẩm</label>
                                    <select class="form-control" name="category_product">
                                        <?php 
                                            foreach ($data['category'] as $item => $value) {
                                        ?>
                                        <option value="<?php echo $value['id_category_product'];?>"><?php echo $value['title_category_product'];?></option>
                                            
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
</section>