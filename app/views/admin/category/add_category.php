<section id="main-content">
	<section class="wrapper">
    <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
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
                                <form action="<?php echo BASE_URL;?>/category/insert_category" method="POST">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" name="title_category_product" class="form-control"  placeholder="Nhập tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <input type="text" name="desc_category_product" class="form-control"  placeholder="Nhập mô tả">
                                </div>
                               
                              
                                <button type="submit" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
</section>