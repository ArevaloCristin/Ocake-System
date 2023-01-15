<?php

namespace App\Controllers;
use App\Models\Product_model;
use App\Models\Cart_m;
use App\Models\Personal_m;
use App\Models\Biller_model;
use App\Models\Address_model;
use App\Models\Checkout_model;
use App\Models\AddOns_model;
use App\Models\Layer_model;
use App\Models\Shape_model;
use App\Models\Color_model;
use App\Models\Flavor_model;

class User extends BaseController
{
    public function index(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        
        return view('include/header', $data)
            . view('user/index')
            . view('include/footer', $data);
        }else{
            return $this->response->redirect(site_url('/signin'));
        }
    }

     //---------------- CHECKOUT PRODUCT -----------------//                  December 27,2022
    public function checkout(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Cart_m();
        $user_model = new Personal_m();
        $add_model = new Address_model();
        // $count_data['count_data']= $model->count_data();
        $data['cartData'] = $model->getCartData($id);
        $data['userData'] = $user_model->fetchPersonal($id);
        $data['address'] = $add_model->fetchAddress();
        $subtotal = $model->getCartData($id);
        $totalprice = 0;
        foreach ($subtotal as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['Total'] = $totalprice;

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

       // $name = $_GET['cart_product'];

        //foreach($name as $data){
           // echo $data."<br />";
           //$model = new Cart_m();
       //    $this->$model->fetchCart($data);
       // };

        return view('include/header', $data)
            . view('user/checkout', $data)
            . view('include/footer');

        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function about(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct($id);
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/about')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function contact(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        
        return view('include/header', $data)
            . view('user/contact')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
    
    public function popular(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_cart = new Cart_m();
        $model = new Product_model();
        $occasion = "Birthday";
        // $data['cartData']= $model->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        // return view('include/header', $data)
        echo view('user/popular', $data)
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
   
    public function userforgotpassword() {
        return view('auth/userforgotpassword');
    }
    //------------------ FETCH CART DATA ----------------//                 December 13,2022 
    public function cart(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
       
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        
        return view('include/header', $data)
            . view('user/cart')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
    //------------- FETCH ORDER DETAILS DATA ------------//                 December 20,2022 --> January 03,2023
    public function orderdetails(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        $model_order = new Checkout_model();
        $order_code = $this->request->getVar('details');
        $data['order']= $model_order->fetchCheckoutData($id,$order_code);
        $data['status']= $model_order->getCheckout($id, $order_code);
        $data['stat']= $model_order->get($id, $order_code);
        
        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        
        return view('include/header', $data)
            . view('user/order_details')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    //--------------- UPDATE RECEIVED ORDER -------------//                 December 21,2022 --> January 03,2023
    public function order_received($id){
        $val = $this->validate([
            'received_status' => 'required',         
            ]);
        
        $model = new Checkout_model();
        
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('orderdetails', $data);
        }else{
            $data = array(
                'stat' => $this->request->getVar('received_status'),
            );              
        $model->checkout_update($data,$id);
            return redirect()->to(base_url('orderdetails'));   
        }  
    }
    
    //---------------- UPDATE CANCEL ORDER --------------//                 December 21,2022 --> January 03,2023
    public function cancel_order($id){
        $val = $this->validate([
        'cancel_status' => 'required',         
        ]);
    
        $model = new Checkout_model();
    
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('orderdetails', $data);
        }else{
            $data = array(
                'stat' => $this->request->getVar('cancel_status'),
             );              
        $model->checkout_update($data,$id);
        return redirect()->to(base_url('orderdetails'));   
        }  
    }

     //------------- FETCH ORDER DETAILS DATA ------------//                 January 04,2023
     public function userOrders(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);
        $total = $model->getCartData($id);
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        $model_order = new Checkout_model();
        $data['status']= $model_order->getData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
        
        return view('include/header', $data)
            . view('user/user_orders')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function productlist(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/productlist')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function faq(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/faq')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function productgrid(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/productgrid')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }
    public function modal(){
        return view('admin/modal');
    }
    public function getBDay(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Birthday";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function getChristening(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Christening";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function getChristmas(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Christmas";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function getGrad(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Graduation";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function getHalloween(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Halloween";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function getNewYear(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "New Year";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function getValentine(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Valentine";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function getWedding(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Wedding";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }

    public function productdetails(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model_product = new Product_model();
        $model = new Cart_m();
        
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData($id);

        $prod_id = $this->request->getVar('prod_id');
        $data['product'] = $model_product->getDetails($prod_id);

        #count cart items#
        $cart = $model->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }
            return view('include/header', $data)
                 . view('user/productdetails')
                 . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    
    }

      //---------------- FETCH CUSTOMIZATION DATA --------------//                // December 25,2022
    public function customization(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $model_addons = new AddOns_model();
        $model_flavor = new Flavor_model();
        $occasion = "customization";
        $data['cartData'] = $model_cart->getCartData($id);
        $datum['custom_addons']= $model_addons->fetchAddOns();
        $datum['custom_flavor']= $model_flavor->fetchFlavor();
        $datum['user_id'] = $id;
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/customization', $datum)
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
      
    }

    //----------------- SAVE CUSTOMIZATION DATA ----------------//                // January 6,2023
    public function saveFinalDesign(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            $id = $_SESSION['user_id'];
            $designModel = new Product_model();
            $data = $designModel->insertDesign(
                $this->request->getVar('user_id'),
                $this->request->getVar('canvas'),
                $this->request->getVar('message'),
                $this->request->getVar('flavor'),
                $this->request->getVar('price'),
                $this->request->getVar('status'),
            );
            $msg = array();
            if($data != null){
                $msg = ['response' => 1, 'prod_id' => $data];
            }else{
                $msg = ['response' => 0];
            }

            echo json_encode($msg);
        }
    }

    //---------------- FETCH CUSTOMIZED CAKE DATA --------------//                // January 6,2023
    public function getCustomDesign(){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
        $id = $_SESSION['user_id'];
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Customized";
        $data['cartData'] = $model_cart->getCartData($id);
        $data['product'] = $model->getCustomized($occasion,$id); /*connect to model function */
        $data['occasion'] = $occasion;

        #count cart items#
        $cart = $model_cart->count_data($id);
        foreach($cart as $c){
            $data['cart_count']= $c->count;
        }

        return view('include/header', $data)
            . view('user/customized_cake')
            . view('include/footer');
        }else{
            return $this->response->redirect(site_url('signin'));
        }
    }



}
