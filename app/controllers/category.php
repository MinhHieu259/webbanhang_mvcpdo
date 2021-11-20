<?php 
    class category extends DController
    {
        function __construct()
        {
            $data = array();
            $message = array();
           parent::__construct();
        }
      
        public function list_category()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $table = "tbl_category_product";
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category($table);
            $this->load->view('admin/category/list_category', $data);
            $this->load->view('admin/footer');
        }
        public function delete_category($id)
        {
            $table = "tbl_category_product";
            $cond = "id_category_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->deletecategory($table, $cond);
            if($result == 1 ){
                $message['msg'] = "Xóa danh mục sản phẩm thành công";
                header("Location:".BASE_URL."/category/list_category?msg=".urlencode(serialize($message)));
            }else {
                $message['msg'] = "Xóa danh mục sản phẩm thất bại";
                header("Location:".BASE_URL."/category/list_category?msg=".urlencode(serialize($message)));
            }
        }

       public function catebyid()
       {
           $this->load->view('header');
           $categorymodel = $this->load->model('categorymodel');
           $id = 1;
           $tbl_category_product = 'tbl_category_product';
           $data['categorybyid'] = $categorymodel->categorybyid($tbl_category_product, $id);
           $this->load->view('categorybyid', $data);
           $this->load->view('footer');
       }

       public function index()
        {
            $this->add_category();
        }

        public function add_category()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/category/add_category');
            $this->load->view('admin/footer');
        }

        public function insert_category()
        {
            $title = $_POST['title_category_product'];
            $desc = $_POST['desc_category_product'];
            $table = "tbl_category_product";
            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc
            );
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->insertcategory($table, $data);
            if($result == 1 ){
                $message['msg'] = "Thêm danh mục sản phẩm thành công";
                header("Location:".BASE_URL."/category/list_category?msg=".urlencode(serialize($message)));
            }else {
                $message['msg'] = "Thêm danh mục sản phẩm thất bại";
                header("Location:".BASE_URL."/category/list_category?msg=".urlencode(serialize($message)));
            }
        }

        public function edit_category($id)
        {
            $table = "tbl_category_product";
            $cond = "id_category_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
            $data['categorybyid'] = $categorymodel->categorybyid($table, $cond);
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/category/edit_category', $data);
            $this->load->view('admin/footer');
        }
        public function update_category($id)
        {
            $table = "tbl_category_product";
            $cond = "id_category_product='$id'";
            $title = $_POST['title_category_product'];
            $desc = $_POST['desc_category_product'];
            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc
            );
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->updatecategory($table, $data, $cond);

            if($result == 1 ){
                $message['msg'] = "Cập nhật danh mục sản phẩm thành công";
                header("Location:".BASE_URL."/category/list_category?msg=".urlencode(serialize($message)));
            }else {
                $message['msg'] = "Cập nhật danh mục sản phẩm thất bại";
                header("Location:".BASE_URL."/category/list_category?msg=".urlencode(serialize($message)));
            }
        }
        
    }
    
?>