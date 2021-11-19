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
                );
                move_uploaded_file($tmp_image, $path_upload);
            }else{
                $data = array(
                    'title_product' => $title,
                    'price_product' => $price,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'id_category_product' => $category,
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
        
    }
    
?>