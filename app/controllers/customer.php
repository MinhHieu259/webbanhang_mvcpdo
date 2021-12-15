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
            Session::init();
           $this->load->view('header', $data);
           $this->load->view('dangnhap_dangky');
           $this->load->view('footer');
       }
       public function dangnhap()
       {
        $username = $_POST['txtEmailLogin'];
        $password = $_POST['txtPassLogin'];
        $table_customer = "tbl_customer";
        $table_cart = "tbl_cart";
        $customermodel = $this->load->model('customermodel');
        $count = $customermodel->dangnhap($table_customer, $username, $password);

        if($count == 0){
            $message['msg'] = "Tài khoản hoặc mật khẩu không đúng";
            header("Location:".BASE_URL."/customer/dangnhap_dangky?msg=".urlencode(serialize($message)));
        }else {
           $result = $customermodel->getLogin($table_customer, $table_cart, $username, $password);
           Session::init();
           Session::set('customer_login', true);
           Session::set('customer_name', $result[0]['customer_name']);
           Session::set('customer_id', $result[0]['customer_id']);
           Session::set('cart_id', $result[0]['id_cart']);
           $message['msg'] = "Đăng nhập thành công";
           header("Location:".BASE_URL."/customer/dangnhap_dangky?msg=".urlencode(serialize($message)));
        }
        
       }
       public function dangky()
       {
        $customermodel = $this->load->model('customermodel');
        // function generate_string($input, $strength = 16) {
        //     $input_length = strlen($input);
        //     $random_string = '';
        //     for($i = 0; $i < $strength; $i++) {
        //         $random_character = $input[mt_rand(0, $input_length - 1)];
        //         $random_string .= $random_character;
        //     }
         
        //     return $random_string;
        // }
        // $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $cartcode=generate_string($permitted_chars, 20);
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];

        $table_customer = "tbl_customer";
        $table_cart = "tbl_cart";
        
        $data = array(
            'customer_name' => $name,
            'customer_phone' => $phone,
            'customer_email' => $email,
            'customer_password' => $password,
            'customer_address' => $address,
            
        );
        $result = $customermodel->dangky($table_customer, $data);
        $result_all_user = $customermodel->getAllUser($table_customer);
        $user_id = $result_all_user[0]['customer_id'];
        
        $data_cart = array(
            'user_id' => $user_id
        );
        $result_cart = $customermodel->insert_cart($table_cart, $data_cart);
        if($result == 1 && $result_cart == 1 ){
            $message['msg'] = "Đăng ký thành công";
            header("Location:".BASE_URL."/customer/dangnhap_dangky?msg=".urlencode(serialize($message)));
        }else {
            $message['msg'] = "Đăng ký thất bại";
            header("Location:".BASE_URL."/customer/dangnhap_dangky?msg=".urlencode(serialize($message)));
        }
       }
       
       public function dangxuat()
       {
                Session::init();
                Session::unset("customer_login");
                Session::unset("customer_name");
                Session::unset("customer_id");
                Session::unset("cart_id");
                $message['msg'] = "Đăng xuất thành công";
                header("Location:".BASE_URL."/customer/dangnhap_dangky?msg=".urlencode(serialize($message)));
       }
       }
    
?>