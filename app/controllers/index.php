<?php 
    class index extends DController
    {
        function __construct()
        {
            $data = array();
           parent::__construct();
        }
        public function index(){
          $this->homepage();
        }
    
       public function homepage()
       {
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $data['category'] = $categorymodel->category_home($table_category_product);
            $data['list_product_feature'] = $productmodel->list_product_feature($table_product);
           $this->load->view('header', $data);
           $this->load->view('slider');
           $this->load->view('home', $data);
           $this->load->view('footer');
       }
       public function notfound()
       {
        $this->load->view('404');
       }
       public function danhmuc()
       {
        $this->load->view('header');
        $this->load->view('categoryproduct');
        $this->load->view('footer');
       }
       public function chitietsanpham()
       {
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        $data['category'] = $categorymodel->category_home($table_category_product);
        $this->load->view('header', $data);
        $this->load->view('detailproduct');
        $this->load->view('footer');
       }

       public function lienhe()
       {
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        $data['category'] = $categorymodel->category_home($table_category_product);
        $this->load->view('header', $data);
        $this->load->view('contact');
        $this->load->view('footer');
       }
    }
    
?>