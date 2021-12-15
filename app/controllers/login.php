<?php 
class login extends DController
{
    function __construct()
    {
        $message = array();
        $data = array();
        parent::__construct();
    }
    public function index(){
      $this->login();
    }

   public function login()
   {
       
       Session::init();
       if(Session::get('login')){
        header("Location:".BASE_URL."/login/dashboard");
       }
       $this->load->view('admin/login');
       
   }
   public function dashboard()
   {
        Session::checkSession();
       $this->load->view('admin/header');
       $this->load->view('admin/menu');
       $this->load->view('admin/Dashboard');
       $this->load->view('admin/footer');
   }
    public function authentication_login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $table_admin = "tbl_admin";
        $loginmodel = $this->load->model("loginmodel");
        $count = $loginmodel->login($table_admin, $username, $password);

        if($count == 0){
            $message['msg'] = "User or password not valid";
            header("Location:".BASE_URL."/login");
        }else {
           $result = $loginmodel->getLogin($table_admin, $username, $password);
           Session::init();
           Session::set('login', true);
           Session::set('username', $result[0]['username']);
           Session::set('userid', $result[0]['admin_id']);
           header("Location:".BASE_URL."/login/dashboard");
        }
    }
    public function logout(){
        Session::init();
        Session::unset("login");
        header("Location:".BASE_URL."/login");
    }
}

?>