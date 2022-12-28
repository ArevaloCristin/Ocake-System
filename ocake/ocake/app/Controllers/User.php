<?php

namespace App\Controllers;
use App\Models\Product_model;
use App\Models\Cart_m;

class User extends BaseController
{
    public function index()
    {
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/index')
            . view('include/footer', $data);
    }
    public function checkout()
    {
        $model = new Cart_m();

        // $count_data['count_data']= $model->count_data();
        $data['cartData'] = $model->getCartData();
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
    public function about()
    {
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/about')
            . view('include/footer');
    }

    public function contact()
    {
        $model_product = new Product_model();
        $model = new Cart_m();
        $data['productData'] = $model_product->fetchProduct();
        $data['cartData'] = $model->getCartData();
        return view('include/header', $data)
            . view('user/contact')
            . view('include/footer');
    }


    public function popular()
    {
        $model = new Product_model();
        $occasion = "Birthday";
        // $data['cartData']= $model->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        // return view('include/header', $data)
        echo view('user/popular', $data)
            . view('include/footer');
    }
    //     public function register()
//     {

    //         return view('include/header')
//             . view('user/register')
//             . view('include/footer');

    //     }
//     public function login()
//     {
//     return view('include/header')
//         . view('user/login')
//         . view('include/footer');
// }
    public function userforgotpassword()
    {
        return view('auth/userforgotpassword');
    }
    public function cart()
    {
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
    public function orderdetails()
    {
        return view('user/order_details');

    }


    // public function viewcart()
// {
//     $model_product = new Product_model();
//     $model = new Cart_m();
//     $data['productData']= $model_product->fetchProduct();
//     $data['cartData']= $model->getCartData();
//     $total = $model->getCartData();
//     $totalprice = 0;
//     foreach($total as $price){
//         $totalprice = $totalprice + $price->price;

    //     }

    //     $data['subtotal'] = $totalprice;

    //     return view('include/header', $data)
//         . view('user/cart')
//         . view('include/footer');
// }

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
    public function customization()
    {
        $model = new Product_model();
        $model_cart = new Cart_m();
        $occasion = "customization";
        $data['cartData'] = $model_cart->getCartData();
        $data['product'] = $model->getBDay($occasion); /*connect to model function */
        $data['occasion'] = $occasion;
        return view('include/header', $data)
            . view('user/customization')
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
}