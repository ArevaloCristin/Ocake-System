<?php

namespace App\Controllers;
// use CodeIgniter\Controller;
use App\Models\Cart_m;
use App\Models\Personal_m;
use App\Models\Checkout_model;
use App\Models\Product_model;
use App\Models\AddOns_model;

class Admin extends BaseController
{

    // working admin dashboard January 14, 2023
    public function dashboard(){
        $session= session();
        if($session->logged_in == true && $session->type = "admin"){
            
            #count users#
            $model = new Personal_m();
            $users = $model->count_users();
            foreach($users as $u){
                $data['users_count']= $u->count;
            }

             #count earnings#
             $checkout_model = new Checkout_model();
             $earnings = $checkout_model->count_earnings();
             foreach($earnings as $e){
                 $data['earnings_count']= $e->sum;
             }

            #count products#
            $product_model = new Product_model();
            $products = $product_model->count_products();
            foreach($products as $pd){
                $data['product_count']= $pd->count;
            }

            #count addons#
            $addons_model = new AddOns_model();
            $addons = $addons_model->count_addons();
            foreach($addons as $a){
                $data['addons_count']= $a->count;
            }

            #count pending orders#
            $checkout_model = new Checkout_model();
            $pending = $checkout_model->count_pending();
            foreach($pending as $p){
                $data['pending_count']= $p->count;
            }

            #count shipped orders#
            $checkout_model = new Checkout_model();
            $shipped = $checkout_model->count_shipped();
            foreach($shipped as $s){
                $data['shipped_count']= $s->count;
            }
            #count cancelled orders#
            $checkout_model = new Checkout_model();
            $cancelled = $checkout_model->count_cancelled();
            foreach($cancelled as $cc){
                $data['cancelled_count']= $cc->count;
            }

            #count completed orders#
            $checkout_model = new Checkout_model();
            $completed = $checkout_model->count_completed();
            foreach($completed as $c){
                $data['completed_count']= $c->count;
            }


            return view('admin/dashboard', $data);
        }
        else
            // found in administration Controller 
            return redirect()->to(base_url('/admin-signin'));
        
    }
    
    public function login(){
        return view('admin/login');
    }

    public function register(){
        return view('admin/register');
    }

    public function forgotpassword(){
        return view('admin/forgotpassword');
    }

    public function product(){
        $session= session();
        if($session->logged_in == true && $session->type == "admin")
            return view('admin/product');
        else
            // found in administration Controller 
            return redirect()->to(base_url('/admin-signin'));
       
    }

    public function category(){
        $session= session();
        if($session->logged_in == true && $session->type == "admin")
            return view('category');
        else
            // found in administration Controller 
            return redirect()->to(base_url('/admin-signin'));
        
    }

     //------------- FETCH ORDER DATA ------------//            December 10,2022 --> January 03,2023
     public function orders() {
        $session= session();
        if($session->logged_in == true && $session->type == "admin"){
            $id = $_SESSION['admin_id'];
            $model = new Checkout_model();
            $model_cart = new Cart_m();
            $data['order']= $model->getCheckoutData();
            $data['details']= $model->getDetails();
            
             #count cart items#
            $cart = $model_cart->count_data($id);
            foreach($cart as $c){
                $data['cart_count']= $c->count;
            }
            return view('admin/orders',$data);
        }  
        else{
            // found in administration Controller 
            return redirect()->to(base_url('/admin-signin'));
        }  
    }

    //------------- UPDATE ORDER DATA ------------//            December 11,2022 --> January 03,2023
    public function order_update($id){
        /*this will validate inputs */
        $val = $this->validate([
       'stat' => 'required',         
        ]);

       $model = new Checkout_model();

       if (!$val) {
           $data['validation']  = $this->validator;
           echo view('admin/orders', $data);
       }else{
            $data = array(
                'stat' => $this->request->getVar('stat'),
            );              
        $model->checkout_update($data,$id);
        return redirect()->to(base_url('admin/orders/'));   
       }  
    }

    //------------- DELETE ORDER DATA ------------//            January 03,2023
    public function checkout_delete($id){
        $session = \Config\Services::session();
        $model = new Checkout_model();
        $model->checkout_delete($id);

        $session->setFlashdata('msg', 'Deleted Successfully!');
        return redirect()->to(base_url('admin/orders/'));
    }

    //------------- DELETE ORDER DATA ------------//            January 03,2023
    public function statistics(){
        $session= session();
        if($session->logged_in == true && $session->type == "admin"){
        #count pending orders#
        $checkout_model = new Checkout_model();
        $pending = $checkout_model->count_pending();
        foreach($pending as $p){
            $data['pending_count']= $p->count;
        }
        #count confirmed orders#
        $checkout_model = new Checkout_model();
        $confirmed = $checkout_model->count_confirmed();
        foreach($confirmed as $cf){
            $data['confirmed_count']= $cf->count;
        }
        #count shipped orders#
        $checkout_model = new Checkout_model();
        $shipped = $checkout_model->count_shipped();
        foreach($shipped as $s){
            $data['shipped_count']= $s->count;
        }
         #count delivered orders#
         $checkout_model = new Checkout_model();
         $delivered = $checkout_model->count_delivered();
         foreach($delivered as $d){
             $data['delivered_count']= $d->count;
         }
        #count cancelled orders#
        $checkout_model = new Checkout_model();
        $cancelled = $checkout_model->count_cancelled();
        foreach($cancelled as $cc){
            $data['cancelled_count']= $cc->count;
        }

        #count completed orders#
        $checkout_model = new Checkout_model();
        $completed = $checkout_model->count_completed();
        foreach($completed as $c){
            $data['completed_count']= $c->count;
        }
            return view('admin/statistics', $data);
        }else{
                // found in administration Controller 
                return redirect()->to(base_url('/admin/statistics'));
        }
    }
    
}
