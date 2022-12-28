<?php

namespace App\Controllers;
use App\Models\Product_model;
use App\Models\Cart_m;
use App\Models\Personal_m;
use App\Models\Biller_model;
use App\Models\Address_model;
use App\Models\Custom_model;
use App\Models\Orders_model;
use App\Models\AddOns_model;
use App\Models\Design_model;

class User extends BaseController
{
    public function index(){
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/index')
            . view('include/footer', $data);
    }
    
     //---------------- CHECKOUT PRODUCT -----------------//                  December 27,2022
    public function checkout(){
        $model = new Cart_m();
        $user_model = new Personal_m();
        $add_model = new Address_model();
        // $count_data['count_data']= $model->count_data();
        $data['cartData'] = $model->getCartData();
        $data['userData'] = $user_model->fetchPersonal();
        $data['address'] = $add_model->fetchAddress();
        $subtotal = $model->getCartData();
        $totalprice = 0;
        foreach ($subtotal as $price) {
            $totalprice = $totalprice + $price->price;

        }

        $data['Total'] = $totalprice;

        return view('include/header', $data)
            . view('user/checkout', $data)
            . view('include/footer');
    }

    //----------------- UPDATE BILLER DATA --------------//                  December 27,2022
    public function biller_update($id){
        $val = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'mobile' => 'required',  
            'municipality' => 'required',
            'barangay' => 'required',
            'street' => 'required',
            'delivery_method' => 'required',
            'date' => 'required',
            'payment_method' => 'required',
            'total_price' => 'required',       
            ]);
        
        $model = new Biller_model();
        
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('cart', $data);
        }else{
            $data = array(
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'municipality' => $this->request->getVar('municipality'),
                'barangay' => $this->request->getVar('barangay'),
                'street' => $this->request->getVar('street'),
                'delivery_method' => $this->request->getVar('delivery_method'),
                'date' => $this->request->getVar('date'),
                'payment_method' => $this->request->getVar('payment_method'),
                'total_price' => $this->request->getVar('total_price'),
            );              
        $model->order_update($data,$id);
            return redirect()->to(base_url('cart')); 
            //return redirect('cart');   
        }  
    }

    public function about(){
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/about')
            . view('include/footer');
    }

    public function contact(){
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/contact')
            . view('include/footer');
    }


    public function popular(){
        $model = new Product_model();
        $occasion = "Birthday";
        // $data['cartData']= $model->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        // return view('include/header', $data)
        echo view('user/popular', $data)
            . view('include/footer');
    }
    // public function register()
    // {

    //     return view('include/header')
    //     . view('user/register')
    //     . view('include/footer');

    // }
    // public function login()
    // {
    //     return view('include/header')
    //         . view('user/login')
    //         . view('include/footer');
    // }
    public function userforgotpassword()
    {
        return view('auth/userforgotpassword');
    }
    //------------------ FETCH CART DATA ----------------//                // December 13,2022
    public function cart(){
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        $total = $model->getCartData();
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;

        }

        $data['subtotal'] = $totalprice;

        return view('include/header', $data)
            . view('user/cart')
            . view('include/footer');
    }
    //------------- FETCH ORDER DETAILS DATA ------------//                 // December 20,2022
    public function orderdetails(){
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        $total = $model->getCartData();
        $totalprice = 0;
        foreach ($total as $price) {
            $totalprice = $totalprice + $price->price;
        }
        $data['subtotal'] = $totalprice;

        $model_order = new Orders_model();
        $data['order']= $model_order->fetchProduct();
        
        return view('include/header', $data)
            . view('user/order_details')
            . view('include/footer');
    }

    //--------------- UPDATE RECEIVED ORDER -------------//                // December 21,2022
    public function order_received($id){
        $val = $this->validate([
            'received_status' => 'required',         
            ]);
        
        $model = new Orders_model();
        
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('orderdetails', $data);
        }else{
            $data = array(
                'stat' => $this->request->getVar('received_status'),
            );              
        $model->order_update($data,$id);
            return redirect()->to(base_url('orderdetails'));   
        }  
    }
    
    //---------------- UPDATE CANCEL ORDER --------------//                // December 21,2022
    public function cancel_order($id){
        $val = $this->validate([
        'cancel_status' => 'required',         
        ]);
    
        $model = new Orders_model();
    
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('orderdetails', $data);
        }else{
            $data = array(
                'stat' => $this->request->getVar('cancel_status'),
             );              
        $model->order_update($data,$id);
        return redirect()->to(base_url('orderdetails'));   
        }  
    }

    public function productlist()
    {
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/productlist')
            . view('include/footer');
    }
    public function faq()
    {
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/faq')
            . view('include/footer');
    }
    public function productgrid()
    {
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/productgrid')
            . view('include/footer');
    }
    public function modal()
    {
        return view('admin/modal');
    }
    public function getBDay()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Birthday";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
    }
    public function getChristening()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Christening";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
    }
    public function getChristmas()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Christmas";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
    }
    public function getGrad()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Graduation";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
    }
    public function getHalloween()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Halloween";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
    }
    public function getNewYear()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "New Year";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
    }
    public function getValentine()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Valentine";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
    }
    public function getWedding()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "Wedding";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/birthday')
            . view('include/footer');
    }
    public function productdetails()
    {
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/productdetails')
            . view('include/footer');
    
    }

     //---------------- FETCH CUSTOMIZATION DATA --------------//                // December 25,2022
    public function customization()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $model_addons = new AddOns_model();
        $model_design = new Design_model();
        $occasion = "customization";
        $data['cartData'] = $model_cart->getCartData();
        $datum['custom_addons']= $model_addons->fetchAddOns();
        $datum['custom_design']= $model_design->fetchDesign();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/customization', $datum)
            . view('include/footer');
      
    }

    public function custom()
    {
        // $model = new Product_model();
        // $model_cart = new Cart_m();
        // $occasion = "customization";
        // $data['cartData'] = $model_cart->getCartData();
        // $data['product'] = $model->getBDay($occasion); /*connect to model function */
        // $data['occasion'] = $occasion;
        return //view ('include/header', $data)
             view('user/custom');
            //. view('include/footer');
      
    }
    public function clone()
    {
        // $model = new Product_model();
        // $model_cart = new Cart_m();
        // $occasion = "customization";
        // $data['cartData'] = $model_cart->getCartData();
        // $data['product'] = $model->getBDay($occasion); /*connect to model function */
        // $data['occasion'] = $occasion;
        return //view ('include/header', $data)
             view('user/clone');
            //. view('include/footer');
      
    }
    public function copy()
    {
        // $model = new Product_model();
        // $model_cart = new Cart_m();
        // $occasion = "customization";
        // $data['cartData'] = $model_cart->getCartData();
        // $data['product'] = $model->getBDay($occasion); /*connect to model function */
        // $data['occasion'] = $occasion;
        return //view ('include/header', $data)
             view('user/copy');
            //. view('include/footer');
    }
    public function paste()
    {
        // $model = new Product_model();
        // $model_cart = new Cart_m();
        // $occasion = "customization";
        // $data['cartData'] = $model_cart->getCartData();
        // $data['product'] = $model->getBDay($occasion); /*connect to model function */
        // $data['occasion'] = $occasion;
        return //view ('include/header', $data)
             view('user/paste');
            //. view('include/footer');
      
    }
    public function cust()
    {
        // $model = new Product_model();
        // $model_cart = new Cart_m();
        // $occasion = "customization";
        // $data['cartData'] = $model_cart->getCartData();
        // $data['product'] = $model->getBDay($occasion); /*connect to model function */
        // $data['occasion'] = $occasion;
        return //view ('include/header', $data)
             view('user/cust');
            //. view('include/footer');
    }
    public function cop()
    {
        $model = new Design_model();
        $data['design'] = $model->fetchDesign();
        // $model = new Product_model();
        // $model_cart = new Cart_m();
        // $occasion = "customization";
        // $data['cartData'] = $model_cart->getCartData();
        // $data['product'] = $model->getBDay($occasion); /*connect to model function */
        // $data['occasion'] = $occasion;
        return //view ('include/header', $data)
             view('user/cop');
            //. view('include/footer');
    }

    public function add_custom(){                              
        helper(['form', 'url']);
    
        $val = $this->validate([
        ]);
    
        $model = new Custom_model();
                  
                $model->insert([
                    // 'uid' => $this->request->getVar('uid'),
                    'myid' => $this->request->getVar('custom_id'),
                    //'flavor' => $this->request->getVar('flavor'),
                    //'price' => $this->request->getVar('price'),
                    //'quantity' => $qty,
                    //'product_id' => $this->request->getVar('pid'),
                    // 'image' => $this->request->getVar('img'),/*this will get the name of file input */
                ]);         
                return redirect('copy');    
    }
}
