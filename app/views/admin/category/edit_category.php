<section id="main-content">
	<section class="wrapper">
    <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php 
                                    if(!empty($_GET['msg'])){
                                        $msg = unserialize(urldecode($_GET['msg']));
                                        foreach ($msg as $item => $value) {
                                            echo '<span style="color:blue;font-weight:bold;>'.$value.'</span>';
                                        }
                                    }
                                ?>
                                <?php
                                foreach ($data['categorybyid'] as $key => $value) {
                                ?>
                                <form action="<?php echo BASE_URL;?>/category/update_category/<?php echo $value['id_category_product'];?>" method="POST">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" value="<?php echo $value['title_category_product'];?>" name="title_category_product" class="form-control"  placeholder="Nhập tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea rows="5" style="resize: none;" name="desc_category_product" class="form-control"  placeholder="Nhập mô tả"><?php echo $value['desc_category_product'];?></textarea>
                                </div>
                               
                              
                                <button type="submit" class="btn btn-info">Cập nhật danh mục</button>
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