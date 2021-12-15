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
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        $data['category'] = $categorymodel->category_home($table_category_product);
        Session::init();
        $this->load->view('header', $data);
        $this->load->view('cart');
        $this->load->view('footer');
    }
    public function addCart()
    {
        # code...
    }

}