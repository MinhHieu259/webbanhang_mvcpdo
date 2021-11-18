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
        $this->load->view('header');
       $this->load->view('cart');
       $this->load->view('footer');
    }

}