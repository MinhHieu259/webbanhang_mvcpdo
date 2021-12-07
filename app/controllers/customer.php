<?php 
    class customer extends DController
    {
        function __construct()
        {
            $data = array();
           parent::__construct();
        }
        public function index(){
          $this->dangnhap_dangky();
        }
    
       public function dangnhap_dangky()
       {
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $data['category'] = $categorymodel->category_home($table_category_product);
            $data['list_product_feature'] = $productmodel->list_product_feature($table_product);
            $data['list_product'] = $productmodel->list_product_home($table_product);
           $this->load->view('header', $data);
           $this->load->view('dangnhap_dangky');
           $this->load->view('footer');
       }
       public function dangnhap()
       {
           
       }
       public function dangky()
       {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];

        $table = "tbl_customer";
        $data = array(
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_email' => $email,
            'customer_password' => $password,
            'customer_address' => $address,
           
        );
        $customermodel = $this->load->model('customermodel');
        $result = $customermodel->dangky($table, $data);
        if($result == 1 ){
           
            $message['msg'] = "Đăng ký thành công";
            header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
        }else {
            $message['msg'] = "Đăng ký thất bại";
            header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
        }
       }
       public function notfound()
       {
        $this->load->view('404');
       }
      
    }
    
?>