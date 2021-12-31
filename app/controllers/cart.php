<?php
class cart extends DController{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->cart();
    }
    public function cart()
    {
        Session::init();
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
        $this->load->view('header', $data);
        $this->load->view('cart', $data);
        $this->load->view('footer');
    }
    public function addCart()
    {
        Session::init();
        $cartmodel = $this->load->model("cartmodel");
        $table_detail = "tbl_cart_deltails";
        $customer_id = Session::get("customer_id");
        $id_cart = Session::get('cart_id');
        $id_product = $_POST['product_id'];
        $product_quantity = $_POST['product_quantity'];
        $check_cart = $cartmodel->checkCart($table_detail, $id_cart, $id_product);
        if($customer_id == null){
            $message['error'] = "Bạn chưa đăng nhập";
            header("Location:".BASE_URL."/index?error=".urlencode(serialize($message)));
    
        }else if($customer_id != null && $check_cart == 1){
            $info_item = $cartmodel->getItemCartById($table_detail, $id_cart, $id_product);
            $cond = "id_cart='$id_cart' AND id_product = $id_product";
            $data_quan = array(
                'quantity_product_cart' => $info_item[0]['quantity_product_cart'] + 1
            );
            $result_up_quan = $cartmodel->update_quantity($table_detail, $data_quan, $cond);
            if($result_up_quan == 1){
            $message['msg'] = "Thêm giỏ hàng sản phẩm thành công";
            header("Location:".BASE_URL."/cart?msg=".urlencode(serialize($message)));
            }
        } else{
        
        $data = array(
            'id_cart' => $id_cart,
            'id_product' => $id_product,
            'quantity_product_cart' => $product_quantity
        );
        
        $result = $cartmodel->insertcart($table_detail, $data);
        if($result == 1 ){
            $message['msg'] = "Thêm giỏ hàng sản phẩm thành công";
            header("Location:".BASE_URL."/cart?msg=".urlencode(serialize($message)));
            
        }else {
            $message['error'] = "Thêm giỏ hàng sản phẩm thất bại";
            header("Location:".BASE_URL."/cart?error=".urlencode(serialize($message)));
        }
        }
    }

    public function delete($id_detail)
    {
        $cartmodel = $this->load->model("cartmodel");
        $table_detail = "tbl_cart_deltails";
        $cond = "id_cart_detail = $id_detail";
        $result = $cartmodel->delete($table_detail, $cond);
        if($result == 1 ){
            $message['msg'] = "Xóa danh mục sản phẩm thành công";
            header("Location:".BASE_URL."/cart?msg=".urlencode(serialize($message)));
        }else {
            $message['error'] = "Xóa danh mục sản phẩm thất bại";
            header("Location:".BASE_URL."/cart?error=".urlencode(serialize($message)));
        }
    }

    public function update()
    {
        Session::init();
        $cartmodel = $this->load->model("cartmodel");
        $table = "tbl_cart_deltails";
        $cart_id = Session::get('cart_id');
        
        for($i = 0 ; $i<count($_POST['id_product']) ; $i++){
            $product_id = $_POST['id_product'][$i];
            $quantity = $_POST['quantity'][$i];
            $data = array(
                'quantity_product_cart' => $quantity
            );
            $cond = "id_product = '$product_id' AND id_cart = '$cart_id'";
            if($quantity <= 0){
                $result_update = $cartmodel->update_so_am($table, $cond);
            }else{
                $result_update = $cartmodel->update_cart($table, $data, $cond);
            }
           
            if($result_update == 1 ){
                $message['msg'] = "Cập nhật giỏ hàng sản phẩm thành công";
                header("Location:".BASE_URL."/cart?msg=".urlencode(serialize($message)));
            }else {
                $message['error'] = "Cập nhật giỏ hàng sản phẩm thất bại";
                header("Location:".BASE_URL."/error?msg=".urlencode(serialize($message)));
            }
        }
       
        
        
    }
}

