<?php 
    class product extends DController
    {
        function __construct()
        {
           parent::__construct();
        }
        public function index()
        {
            $this->add_product();
          
        }
        // ADMIN
        public function add_product()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $table = "tbl_category_product";
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category($table);
            $this->load->view('admin/product/add_product', $data);
            $this->load->view('admin/footer');
        }
        public function insert_product()
        {
            $title = $_POST['title_product'];
            $price = $_POST['price_product'];
            $desc = $_POST['desc_product'];
            $quantity = $_POST['quantity_product'];
            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_upload = "public/uploads/product/".$unique_image;
            $category = $_POST['category_product'];

            $table = "tbl_product";
            $data = array(
                'title_product' => $title,
                'price_product' => $price,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'image_product' => $unique_image,
                'id_category_product' => $category,
            );
            $productmodel = $this->load->model('productmodel');
            $result = $productmodel->insertproduct($table, $data);
            if($result == 1 ){
                move_uploaded_file($tmp_image, $path_upload);
                $message['msg'] = "Thêm sản phẩm thành công";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else {
                $message['msg'] = "Thêm sản phẩm thất bại";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }
        }
      
        public function list_product()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $table_product = "tbl_product";
            $table_category = "tbl_category_product";
            $productmodel = $this->load->model('productmodel');
            $data['product'] = $productmodel->product($table_product, $table_category);
            $this->load->view('admin/product/list_product', $data);
            $this->load->view('admin/footer');
        }

        public function delete_product($id)
        {
            $table = "tbl_product";
            $cond = "id_product='$id'";
            $productmodel = $this->load->model('productmodel');
            $result = $productmodel->deletecategory($table, $cond);
            if($result == 1 ){
                $message['msg'] = "Xóa sản phẩm thành công";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else {
                $message['msg'] = "Xóa sản phẩm thất bại";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }
        }
        public function edit_product($id)
        {
            $table_product = "tbl_product";
            $table_category = "tbl_category_product";
            $cond = "id_product='$id'";
            $productmodel = $this->load->model('productmodel');
            $categorymodel = $this->load->model('categorymodel');
            $data['productbyid'] = $productmodel->productbyid($table_product, $cond);
            $data['category'] = $categorymodel->category($table_category);
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/product/edit_product', $data);
            $this->load->view('admin/footer');
        }
        public function update_product($id)
        {
            $productmodel = $this->load->model('productmodel');
            $cond = "id_product='$id'";
            $table = "tbl_product";
            $title = $_POST['title_product'];
            $price = $_POST['price_product'];
            $desc = $_POST['desc_product'];
            $quantity = $_POST['quantity_product'];
            $noibat = $_POST['noibat'];

            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_upload = "public/uploads/product/".$unique_image;
            $category = $_POST['category_product'];

            if($image){
                $data['productbyid'] = $productmodel->productbyid($table, $cond);
                foreach ($data['productbyid'] as $item => $value) {
                    if($value['image_product']){
                        unlink("public/uploads/product/".$value['image_product']);
                    }
                }
                
                $data = array( 
                    'title_product' => $title,
                    'price_product' => $price,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'image_product' => $unique_image,
                    'id_category_product' => $category,
                    'noibat' => $noibat
                );
                move_uploaded_file($tmp_image, $path_upload);
            }else{
                $data = array(
                    'title_product' => $title,
                    'price_product' => $price,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'id_category_product' => $category,
                    'noibat' => $noibat
                );
            }
         
            $result = $productmodel->updateproduct($table, $data, $cond);
            if($result == 1 ){
                $message['msg'] = "Cập nhật sản phẩm thành công";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else {
                $message['msg'] = "Cập nhật sản phẩm thất bại";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }
        }

        // USER
        public function product_category($id)
        {
            $categorymodel = $this->load->model("categorymodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $data['category'] = $categorymodel->category_home($table_category_product);
            $data['category_name_id'] = $categorymodel->get_name_category_byid($table_category_product, $table_product, $id);
            $data['category_by_id'] = $categorymodel->category_by_id_home($table_category_product, $table_product, $id);
            Session::init();
            $this->load->view("header", $data);
            $this->load->view("categoryproduct", $data);
            $this->load->view("footer");
        }
        public function tatcasanpham()
        {
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $data['category'] = $categorymodel->category_home($table_category_product);
            $data['list_product'] = $productmodel->list_product_home($table_product);
            Session::init();
            $this->load->view("header", $data);
            $this->load->view("list_product", $data);
            $this->load->view("footer");
        }
        public function chitietsanpham($id)
        {
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $cond = "$table_product.id_category_product = $table_category_product.id_category_product AND $table_product.id_product = '$id'";
        
            $data['category'] = $categorymodel->category_home($table_category_product);
            $data['detail_product'] = $productmodel->detail_product_home($table_product,$table_category_product, $cond);
            foreach ($data['detail_product'] as $item => $cate) {
                $id_cate = $cate['id_category_product'];
            }
            $cond_relate = "$table_product.id_category_product = $table_category_product.id_category_product AND $table_category_product.id_category_product = '$id_cate' 
            AND $table_product.id_product NOT IN('$id')  ORDER BY $table_product.id_product DESC LIMIT 3";
            $data['relate_product'] = $productmodel->relate_product_home($table_product,$table_category_product, $cond_relate);
            Session::init();
            $this->load->view("header",$data);
            $this->load->view("detailproduct", $data);
            $this->load->view("footer");
        }
       
        public function add_yeuthich($id_sanpham)
        {
            Session::init();
            $productmodel = $this->load->model("productmodel");
            $table_yeuthich = "tbl_yeuthich";
            $customer_id = Session::get("customer_id");
            $check_yeuthich = $productmodel->checkYeuthich($table_yeuthich, $customer_id, $id_sanpham);
            if($customer_id == null){
                $message['msg'] = "Bạn chưa đăng nhập";
                header("Location:".BASE_URL."/index?msg=".urlencode(serialize($message)));
        
            }else if($customer_id != null && $check_yeuthich == 1){
               
                
                $message['msg'] = "Sản phẩm đã có trong yêu thích rồi";
                header("Location:".BASE_URL."?msg=".urlencode(serialize($message)));
                
            } else{
            $data = array(
                'id_customer' => $customer_id,
                'id_product' => $id_sanpham,
            );
            
            $result = $productmodel->add_yeuthich($table_yeuthich, $data);
            if($result == 1 ){
                $message['msg'] = "Thêm yêu thích sản phẩm thành công";
                header("Location:".BASE_URL."/product/sanphamyeuthich/?msg=".urlencode(serialize($message)));
                
            }else {
                $message['msg'] = "Thêm yêu thích sản phẩm thất bại";
                header("Location:".BASE_URL."/product/sanphamyeuthich/?msg=".urlencode(serialize($message)));
            }
            }
            
        }

        public function sanphamyeuthich()
        {
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $table_yeuthich = "tbl_yeuthich";
            $data['category'] = $categorymodel->category_home($table_category_product);
            
            Session::init();
            $customer_id = Session::get("customer_id");
            $cond = "$table_yeuthich.id_product = $table_product.id_product AND $table_yeuthich.id_customer= '$customer_id' 
            ORDER BY $table_yeuthich.id_yeuthich DESC";
            $data['list_yeuthich'] = $productmodel->list_yeuthich($table_yeuthich, $table_product, $cond);
            $this->load->view("header",$data);
            $this->load->view("spyeuthich", $data);
            $this->load->view("footer");
        }

        public function delete_yeuthich($id_yeuthich)
        {
            $productmodel = $this->load->model("productmodel");
            $table_yeuthich = "tbl_yeuthich";
            $cond = "id_yeuthich = '$id_yeuthich'";
            $result = $productmodel->delete_yeuthich($table_yeuthich, $cond);
            if($result == 1 ){
                $message['msg'] = "Xóa yêu thích sản phẩm thành công";
                header("Location:".BASE_URL."/product/sanphamyeuthich/?msg=".urlencode(serialize($message)));
                
            }else {
                $message['msg'] = "Xóa yêu thích sản phẩm thất bại";
                header("Location:".BASE_URL."/product/sanphamyeuthich/?msg=".urlencode(serialize($message)));
            }
        }
    }
    
?>