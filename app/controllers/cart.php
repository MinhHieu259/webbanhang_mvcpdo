<?php
class cart extends DController{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->order();
    }
    public function order()
    {
        $this->load->view('admin/header');
       $this->load->view('admin/menu');
       $this->load->view('admin/order/order');
       $this->load->view('admin/footer');
    }
public function add_order()
{
       $this->load->view('admin/header');
       $this->load->view('admin/menu');
       $this->load->view('admin/order/add_order');
       $this->load->view('admin/footer');
}
}