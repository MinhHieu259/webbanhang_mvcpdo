<?php 
    class order extends DController
    {
        function __construct()
        {
            $data = array();
           parent::__construct();
        }
        public function index(){
          $this->order();
        }
    
       public function order()
       {
        Session::init();
        $customermodel = $this->load->model("customermodel");
        $cartmodel = $this->load->model("cartmodel");
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        $data['category'] = $categorymodel->category_home($table_category_product);
        $table_detail = "tbl_cart_deltails";
        $table_product = "tbl_product";
        $id_cart = Session::get('cart_id');
        if($id_cart != NULL){
            $data['cart'] = $cartmodel->getItemCart($table_detail, $table_product, $id_cart);
        }else{
            $data['cart'] = NULL;
        }
        $cus_id = Session::get("customer_id");
        $sql = "SELECT * FROM tbl_customer WHERE customer_id = '$cus_id'";
        $data['user_infor'] = $customermodel->getInforUser($sql);
        $this->load->view('header', $data);
        $this->load->view('order', $data);
        $this->load->view('footer');
       }
       public function listorder()
       {
        Session::init();
        $customermodel = $this->load->model("customermodel");
        $categorymodel = $this->load->model("categorymodel");
        $ordermodel = $this->load->model("ordermodel");
        $table_category_product = "tbl_category_product";
        $data['category'] = $categorymodel->category_home($table_category_product);
        $table_detail = "tbl_cart_deltails";
        $table_product = "tbl_product";
        $table_order = "tbl_order";
        $id_cart = Session::get('cart_id');
        $user_id = Session::get("customer_id");
        $cus_id = Session::get("customer_id");
        $sql = "SELECT * FROM tbl_customer WHERE customer_id = '$cus_id'";
        $data['user_infor'] = $customermodel->getInforUser($sql);
        $sql_choxn = "SELECT * FROM $table_order WHERE user_id = '$user_id' AND order_status = 0";
        $sql_danggiao = "SELECT * FROM $table_order WHERE user_id = '$user_id' AND order_status = 1";
        $sql_damua = "SELECT * FROM $table_order WHERE user_id = '$user_id' AND order_status = 2";
        $data['order_choxn'] = $ordermodel->getOrderCho($sql_choxn);
        $data['order_danggiao'] = $ordermodel->getOrderDanggiao($sql_danggiao);
        $data['order_damua'] = $ordermodel->getOrderDamua($sql_damua);
        $this->load->view('header', $data);
        $this->load->view('donhang', $data);
        $this->load->view('footer');
       }
      
       public function ordersuccess()
       {
        Session::init();
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        $data['category'] = $categorymodel->category_home($table_category_product);
        $this->load->view('header', $data);
        $this->load->view('ordersuccess');
        //$this->load->view('footer');
       }

       public function dathang()
       {
           Session::init();
           $order_model = $this->load->model("ordermodel");
           $table_order = "tbl_order";
           $table_order_address = "tbl_order_address";
           $table_order_detail = "tbl_order_detail";
           $table_cart_detail = "tbl_cart_deltails";
           $hoten = $_POST['hoten'];
           $sodt = $_POST['sodt'];
           $diachi = $_POST['diachi'];
           $user_id = Session::get("customer_id");
           $cart_id = Session::get("cart_id");

           date_default_timezone_set('asia/ho_chi_minh');
           $date = date("d/m/Y");
           $hour = date("h:i:sa");
           $order_date = $date.' '.$hour;

           $data_order = array(
               'user_id' => $user_id,
               'order_date' => $order_date,
               'order_status' => 0
           );
           $result_order = $order_model->insert_order($table_order, $data_order);
           $sql_get_cart = "SELECT * FROM tbl_cart_deltails WHERE id_cart = '$cart_id'";
           $cart = $order_model->getCartDetail($sql_get_cart);
           $sql_get_order_id = "SELECT * FROM $table_order WHERE user_id = '$user_id' ORDER BY order_id DESC";
           $order_id = $order_model->getOrderId($sql_get_order_id);
           foreach ($cart as $item => $value_cart) {
               $data_order_detail = array(
                    'order_id' => $order_id[0]['order_id'],
                    'product_id' => $value_cart['id_product'],
                    'product_quantity' => $value_cart['quantity_product_cart']
               );
               $result_order_detail = $order_model->insert_order_detail($table_order_detail, $data_order_detail);
           }

           $data_address_order = array(
                'order_id' => $order_id[0]['order_id'],
                'customer_name' => $hoten,
                'customer_phone' => $sodt,
                'customer_address' => $diachi
           );
           $result_insert_address = $order_model->insert_order_address($table_order_address, $data_address_order);
           $cond_delete = "id_cart = '$cart_id'";
           $result_delete_cart = $order_model->deleteCartAfterOrder($table_cart_detail, $cond_delete);

           if($result_order == 1 ){
            $message['msg'] = "Đặt hàng thành công";
            header("Location:".BASE_URL."/order/ordersuccess?msg=".urlencode(serialize($message)));
        }else {
            $message['error'] = "Đặt hàng thất bại";
            header("Location:".BASE_URL."/order/ordersuccess?error=".urlencode(serialize($message)));
        }
       }

       public function chitietorder($order_id)
       {
        $ordermodel = $this->load->model('ordermodel');
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        $table_order = "tbl_order";
        $table_order_detail = "tbl_order_detail";
        $table_product = "tbl_product";
        $sql = "SELECT * FROM $table_order, $table_order_detail, $table_product WHERE
           $table_order.order_id = $table_order_detail.order_id AND $table_order_detail.product_id = 
           $table_product.id_product  AND $table_order.order_id = $order_id";
           
        $data['category'] = $categorymodel->category_home($table_category_product);
        $data['order_details'] = $ordermodel->chitietorder($sql);
        $this->load->view('header', $data);
        $this->load->view('chitietdonhang', $data);
        $this->load->view('footer');
       }
       public function huydon($order_id)
       {
        $ordermodel = $this->load->model('ordermodel');
        $table_order = "tbl_order";
        $table_order_detail = "tbl_order_detail";
        $table_order_address = "tbl_order_address";
        $cond_xoa_don = "order_id = '$order_id'";
        $cond_xoa_ct = "order_id = '$order_id'";
        $cond_xoa_diachi = "order_id = '$order_id'";
        $result_xoa = $ordermodel->huydon($table_order, $cond_xoa_don);
        $result_xoa_ct = $ordermodel->xoachitietdon($table_order_detail, $cond_xoa_ct);
        $result_xoa_diachi = $ordermodel->xoadiachidon($table_order_address, $cond_xoa_diachi);
        if($result_xoa == 1 ){
            $message['msg'] = "Hủy đơn hàng thành công";
            header("Location:".BASE_URL."/order/listorder?msg=".urlencode(serialize($message)));
        }else {
            $message['error'] = "Hủy đơn hàng thất bại";
            header("Location:".BASE_URL."/order/listorder?error=".urlencode(serialize($message)));
        }
       }

       // ADMIN
       public function orderAdmin()
       {
        $table_order = "tbl_order";
        $table_order_detail = "tbl_order_detail";
        $ordermodel = $this->load->model('ordermodel');
        $data['order_chuaduyet'] = $ordermodel->listorder_admin_chuaduyet($table_order);
        $data['order_daduyet'] = $ordermodel->listorder_admin_daduyet($table_order);
        $data['order_hoantat'] = $ordermodel->listorder_admin_hoantat($table_order);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/order/order', $data);
        $this->load->view('admin/footer');
       }
       public function duyetdon($order_id)
       {
        $ordermodel = $this->load->model('ordermodel');
        $table_order = "tbl_order";
        $cond = "order_id = '$order_id'";
        $data = array(
            'order_status' => 1
        );
        $result = $ordermodel->duyetdon($table_order, $data, $cond);
        if($result == 1){
            $message['msg'] = "Duyệt đơn thành công";
            header("Location:".BASE_URL."/order/orderAdmin?msg=".urlencode(serialize($message)));
        }else{
            $message['error'] = "Duyệt đơn thất bại";
            header("Location:".BASE_URL."/order/orderAdmin?error=".urlencode(serialize($message)));
        }
       }

       public function hoantat($order_id)
       {
        $ordermodel = $this->load->model('ordermodel');
        $table_order = "tbl_order";
        $cond = "order_id = '$order_id'";
        $data = array(
            'order_status' => 2
        );
        $result = $ordermodel->hoantat($table_order, $data, $cond);
        if($result == 1){
            $message['msg'] = "Hoàn tất đơn thành công";
            header("Location:".BASE_URL."/order/orderAdmin?msg=".urlencode(serialize($message)));
        }else{
            $message['error'] = "Hoàn tất đơn thất bại";
            header("Location:".BASE_URL."/order/orderAdmin?error=".urlencode(serialize($message)));
        }
       }
       public function chitietdonhang($order_id)
       {
           $ordermodel = $this->load->model('ordermodel');
           $table_order = "tbl_order";
           $table_order_detail = "tbl_order_detail";
           $table_order_address = "tbl_order_address";
           $table_product = "tbl_product";
           $sql = "SELECT * FROM $table_order, $table_order_address, $table_order_detail, $table_product WHERE
           $table_order.order_id = $table_order_detail.order_id AND $table_order_detail.product_id = 
           $table_product.id_product AND $table_order.order_id = $table_order_address.order_id AND $table_order.order_id = $order_id";
           $data['detail_order'] = $ordermodel->order_detail($sql);
           $this->load->view('admin/header');
           $this->load->view('admin/menu');
           $this->load->view('admin/order/orderDetail', $data);
           $this->load->view('admin/footer');
       }
}
    
?>