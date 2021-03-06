<?php 
    class product extends DController
    {
        function __construct()
        {
           parent::__construct();
        }
        public function index()
        {
            $this->add_product();
          
        }
        // ADMIN
        public function add_product()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $table = "tbl_category_product";
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category($table);
            $this->load->view('admin/product/add_product', $data);
            $this->load->view('admin/footer');
        }
        public function insert_product()
        {
            $title = $_POST['title_product'];
            $price = $_POST['price_product'];
            $desc = $_POST['desc_product'];
            $quantity = $_POST['quantity_product'];
            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_upload = "public/uploads/product/".$unique_image;
            $category = $_POST['category_product'];

            $table = "tbl_product";
            $table_img = "tbl_image_desc";
            $data = array(
                'title_product' => $title,
                'price_product' => $price,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'image_product' => $unique_image,
                'id_category_product' => $category,
            );
            $productmodel = $this->load->model('productmodel');
            $result = $productmodel->insertproduct($table, $data);
            $result_all_product = $productmodel->getAllProduct($table);
            $product_id = $result_all_product[0]['id_product'];

            for($i = 0 ; $i<count($_FILES['image_product_desc'])+1 ; $i++){

            $image_desc = $_FILES['image_product_desc']['name'][$i];
            $tmp_image_desc = $_FILES['image_product_desc']['tmp_name'][$i];
            $div_desc = explode('.', $image_desc);
            $file_ext_desc = strtolower(end($div_desc));
            $unique_image_desc = $div_desc[0].time().'.'.$file_ext_desc;
            $path_upload_desc = "public/uploads/product/".$unique_image_desc;
            
            $data_image = array(
                'id_sanpham' => $product_id,
                'image' => $unique_image_desc
            );
            $result_insert_image = $productmodel->insert_image_desc($table_img, $data_image);
            if($result_insert_image == 1 ){
                move_uploaded_file($tmp_image_desc, $path_upload_desc);
            
        }
            if($result == 1 ){
                move_uploaded_file($tmp_image, $path_upload);
                $message['msg'] = "Th??m s???n ph???m th??nh c??ng";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else {
                $message['error'] = "Th??m s???n ph???m th???t b???i";
                header("Location:".BASE_URL."/product/list_product?error=".urlencode(serialize($message)));
            }
        }
    }
      
        public function list_product()
        {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $table_product = "tbl_product";
            $table_category = "tbl_category_product";
            $productmodel = $this->load->model('productmodel');
            $data['product'] = $productmodel->product($table_product, $table_category);
            $this->load->view('admin/product/list_product', $data);
            $this->load->view('admin/footer');
        }

        public function delete_product($id)
        {
            $table = "tbl_product";
            $cond = "id_product='$id'";
            $productmodel = $this->load->model('productmodel');
            $result = $productmodel->deletecategory($table, $cond);
            if($result == 1 ){
                $message['msg'] = "X??a s???n ph???m th??nh c??ng";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else {
                $message['error'] = "X??a s???n ph???m th???t b???i";
                header("Location:".BASE_URL."/product/list_product?error=".urlencode(serialize($message)));
            }
        }
        public function edit_product($id)
        {
            $table_product = "tbl_product";
            $table_category = "tbl_category_product";
            $cond = "id_product='$id'";
            $productmodel = $this->load->model('productmodel');
            $categorymodel = $this->load->model('categorymodel');
            $data['productbyid'] = $productmodel->productbyid($table_product, $cond);
            $data['category'] = $categorymodel->category($table_category);
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/product/edit_product', $data);
            $this->load->view('admin/footer');
        }
        public function update_product($id)
        {
            $productmodel = $this->load->model('productmodel');
            $cond = "id_product='$id'";
            $table = "tbl_product";
            $title = $_POST['title_product'];
            $price = $_POST['price_product'];
            $desc = $_POST['desc_product'];
            $quantity = $_POST['quantity_product'];
            $noibat = $_POST['noibat'];

            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_upload = "public/uploads/product/".$unique_image;
            $category = $_POST['category_product'];

            if($image){
                $data['productbyid'] = $productmodel->productbyid($table, $cond);
                foreach ($data['productbyid'] as $item => $value) {
                    if($value['image_product']){
                        unlink("public/uploads/product/".$value['image_product']);
                    }
                }
                
                $data = array( 
                    'title_product' => $title,
                    'price_product' => $price,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'image_product' => $unique_image,
                    'id_category_product' => $category,
                    'noibat' => $noibat
                );
                move_uploaded_file($tmp_image, $path_upload);
            }else{
                $data = array(
                    'title_product' => $title,
                    'price_product' => $price,
                    'desc_product' => $desc,
                    'quantity_product' => $quantity,
                    'id_category_product' => $category,
                    'noibat' => $noibat
                );
            }
         
            $result = $productmodel->updateproduct($table, $data, $cond);
            if($result == 1 ){
                $message['msg'] = "C???p nh???t s???n ph???m th??nh c??ng";
                header("Location:".BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else {
                $message['error'] = "C???p nh???t s???n ph???m th???t b???i";
                header("Location:".BASE_URL."/product/list_product?error=".urlencode(serialize($message)));
            }
        }

        // USER
        public function product_category($id)
        {
            $categorymodel = $this->load->model("categorymodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $data['category'] = $categorymodel->category_home($table_category_product);
            $data['category_name_id'] = $categorymodel->get_name_category_byid($table_category_product, $table_product, $id);
            $data['category_by_id'] = $categorymodel->category_by_id_home($table_category_product, $table_product, $id);
            Session::init();
            $this->load->view("header", $data);
            $this->load->view("categoryproduct", $data);
            $this->load->view("footer");
        }
        public function tatcasanpham()
        {
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $data['category'] = $categorymodel->category_home($table_category_product);
            $data['list_product'] = $productmodel->list_product_home($table_product);
            Session::init();
            $this->load->view("header", $data);
            $this->load->view("list_product", $data);
            $this->load->view("footer");
        }
        public function chitietsanpham($id)
        {
            Session::init();
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $table_comment = "tbl_comment";
            $table_customer = "tbl_customer";
            $table_image = "tbl_image_desc";
            $cond = "$table_product.id_category_product = $table_category_product.id_category_product  AND $table_product.id_product = '$id'";
        
            $data['category'] = $categorymodel->category_home($table_category_product);
            $data['detail_product'] = $productmodel->detail_product_home($table_product,$table_category_product, $cond);
            foreach ($data['detail_product'] as $item => $cate) {
                $id_cate = $cate['id_category_product'];
            }
            $cond_relate = "$table_product.id_category_product = $table_category_product.id_category_product AND $table_category_product.id_category_product = '$id_cate' 
            AND $table_product.id_product NOT IN('$id')  ORDER BY $table_product.id_product DESC LIMIT 3";
            $data['relate_product'] = $productmodel->relate_product_home($table_product,$table_category_product, $cond_relate);
            $customer_id = Session::get("customer_id");
            $cond_comment = "$table_comment.id_customer = $table_customer.customer_id AND $table_comment.id_product = $id";
            $data['comment'] = $productmodel->show_comment($table_customer, $table_comment, $cond_comment );
            
            $cond_image = "$table_image.id_sanpham = $table_product.id_product AND $table_image.id_sanpham = $id";
            $data['image_desc'] = $productmodel->get_desc_image($table_product, $table_image, $cond_image);
            $this->load->view("header",$data);
            $this->load->view("detailproduct", $data);
            $this->load->view("footer", $data);
        }
       
        public function add_yeuthich($id_sanpham)
        {
            Session::init();
            $productmodel = $this->load->model("productmodel");
            $table_yeuthich = "tbl_yeuthich";
            $customer_id = Session::get("customer_id");
            $check_yeuthich = $productmodel->checkYeuthich($table_yeuthich, $customer_id, $id_sanpham);
            if($customer_id == null){
                $message['error'] = "B???n ch??a ????ng nh???p";
                header("Location:".BASE_URL."/index?error=".urlencode(serialize($message)));
        
            }else if($customer_id != null && $check_yeuthich == 1){
               
                
                $message['warning'] = "S???n ph???m ???? c?? trong y??u th??ch r???i";
                header("Location:".BASE_URL."?warning=".urlencode(serialize($message)));
                
            } else{
            $data = array(
                'id_customer' => $customer_id,
                'id_product' => $id_sanpham,
            );
            
            $result = $productmodel->add_yeuthich($table_yeuthich, $data);
            if($result == 1 ){
                $message['msg'] = "Th??m y??u th??ch s???n ph???m th??nh c??ng";
                header("Location:".BASE_URL."/product/sanphamyeuthich/?msg=".urlencode(serialize($message)));
                
            }else {
                $message['error'] = "Th??m y??u th??ch s???n ph???m th???t b???i";
                header("Location:".BASE_URL."/product/sanphamyeuthich/?error=".urlencode(serialize($message)));
            }
            }
            
        }

        public function sanphamyeuthich()
        {
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_category_product = "tbl_category_product";
            $table_product = "tbl_product";
            $table_yeuthich = "tbl_yeuthich";
            $data['category'] = $categorymodel->category_home($table_category_product);
            
            Session::init();
            $customer_id = Session::get("customer_id");
            $cond = "$table_yeuthich.id_product = $table_product.id_product AND $table_yeuthich.id_customer= '$customer_id' 
            ORDER BY $table_yeuthich.id_yeuthich DESC";
            $data['list_yeuthich'] = $productmodel->list_yeuthich($table_yeuthich, $table_product, $cond);
            $this->load->view("header",$data);
            $this->load->view("spyeuthich", $data);
            $this->load->view("footer");
        }

        public function delete_yeuthich($id_yeuthich)
        {
            $productmodel = $this->load->model("productmodel");
            $table_yeuthich = "tbl_yeuthich";
            $cond = "id_yeuthich = '$id_yeuthich'";
            $result = $productmodel->delete_yeuthich($table_yeuthich, $cond);
            if($result == 1 ){
                $message['msg'] = "X??a y??u th??ch s???n ph???m th??nh c??ng";
                header("Location:".BASE_URL."/product/sanphamyeuthich/?msg=".urlencode(serialize($message)));
                
            }else {
                $message['error'] = "X??a y??u th??ch s???n ph???m th???t b???i";
                header("Location:".BASE_URL."/product/sanphamyeuthich/?error=".urlencode(serialize($message)));
            }
        }

        public function binhluan($id_product)
        {
            Session::init();
            $productmodel = $this->load->model("productmodel");
            $customer_id = Session::get("customer_id");
            $table_comment = "tbl_comment";
            $check_comment = $productmodel->checkComment($table_comment, $customer_id, $id_product);
             if($customer_id != null && $check_comment == 1){
               
                
                //$message['error'] = "B???n ch??? ???????c b??nh lu???n 1 l???n";
                //header("Location:".BASE_URL."/product/chitietsanpham/$id_product?error=".urlencode(serialize($message)));
                echo "B???n ch??? ???????c b??nh lu???n 1 l???n";
            } else{
            $data = array(
                'id_customer' => $customer_id,
                'id_product' => $id_product,
                'content' => $_POST['user_review'],
                'rating' => $_POST['rating_data']
            );
            
            $result = $productmodel->add_comment($table_comment, $data);
            if($result == 1 ){
                //$message['msg'] = "B??nh lu???n th??nh c??ng";
                //header("Location:".BASE_URL."/product/chitietsanpham/$id_product?msg=".urlencode(serialize($message)));
                echo "????nh gi?? th??nh c??ng";
            }else {
                //$message['error'] = "B??nh lu???n th???t b???i";
                //header("Location:".BASE_URL."/product/chitietsanpham/$id_product?error=".urlencode(serialize($message)));
                echo "B??nh lu???n th???t b???i";
            }
            }

        }

        public function search_product()
        {
            $productmodel = $this->load->model("productmodel");
            $table_product = "tbl_product";
            if(isset($_POST['action'])){
                $search_name = $_POST['search_name'];
                $cond = "title_product LIKE '%$search_name%'";
                $result = $productmodel->search_product($table_product, $cond );
                $output ="";
                $url = BASE_URL;
                foreach ($result as $rows) {
                    $output .= '
                   <a href="'.$url.'/product/chitietsanpham/'.$rows['id_product'].'"> <li  class="list-group-item"><img width="20" src="'.$url.'/public/uploads/product/'.$rows['image_product'].'" alt="anh"> '.$rows['title_product'].'</li></a>
                    '; 
                }
                echo $output;
            }
        }

        public function timkiem()
        {
            Session::init();
            $categorymodel = $this->load->model("categorymodel");
            $productmodel = $this->load->model("productmodel");
            $table_product = "tbl_product";
            $table_category_product = "tbl_category_product";
            $data['category'] = $categorymodel->category_home($table_category_product);

            $txt_search = $_POST['txt_Search'];
            $tukhoa[] = $_POST['txt_Search']
            ;
            $data['tukhoa'] = $tukhoa;
            $cond = "title_product like '%$txt_search%' ORDER BY id_product DESC";
            $data['timkiem'] = $productmodel->search_product($table_product, $cond);
            $this->load->view("header",$data);
            $this->load->view("timkiem", $data);
            $this->load->view("footer");
        }
        
        public function loadSoSao($id)
        {
            $table_comment = "tbl_comment";
            $table_customer = "tbl_customer";
            $productmodel = $this->load->model("productmodel");
            if(isset($_POST['action'])){
                $average_rating = 0;
                $total_review = 0;
                $five_star_review = 0;
                $four_star_review = 0;
                $three_star_review = 0;
                $two_star_review = 0;
                $one_star_review = 0;
                $total_user_rating = 0;
                $review_content = array();
                $cond = "$table_comment.id_customer = $table_customer.customer_id AND $table_comment.id_product = $id";
                $result = $productmodel->show_comment($table_customer, $table_comment, $cond );
                foreach ($result as $row) {
                    $review_content[] = array(
                        'name_customer' => $row['customer_name'],
                        'id_product' => $row['id_product'],
                        'content' => $row['content'],
                        'rating' => $row['rating']
                    );
                    if($row['rating'] == '5'){
                        $five_star_review++;
                    }
                    if($row['rating'] == '4'){
                        $four_star_review++;
                    }
                    if($row['rating'] == '3'){
                        $three_star_review++;
                    }
                    if($row['rating'] == '2'){
                        $two_star_review++;
                    }
                    if($row['rating'] == '1'){
                        $one_star_review++;
                    }
                    $total_review++;
                    $total_user_rating = $total_user_rating + $row['rating'];
                }
                $average_rating = $total_user_rating / $total_review;
                $output = array(
                    'average_rating' => number_format($average_rating, 1),
                    'total_review' => $total_review,
                    'five_star_review' => $five_star_review,
                    'four_star_review' => $four_star_review,
                    'three_star_review' => $three_star_review,
                    'two_star_review' => $two_star_review,
                    'one_star_review' => $one_star_review,
                    'review_data' => $review_content
                );
                echo json_encode($output);
            }
        }
    }
    
?>