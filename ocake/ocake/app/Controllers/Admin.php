<?php

namespace App\Controllers;
// use CodeIgniter\Controller;
use App\Models\Orders_model;

class Admin extends BaseController
{

    public function dashboard()
    {
        return view('admin/dashboard');
    }
    public function login()
    {
        return view('admin/login');
    }
    public function register()
    {
        return view('admin/register');
    }
    public function forgotpassword()
    {
        return view('admin/forgotpassword');
    }
    public function product()
    {
        return view('admin/product');
    }
    public function category()
    {
        return view('category');
    }

    //------------- FETCH ORDER DATA ------------//          // December 10,2022
    public function orders()
    {
        $model = new Orders_model();
        $data['order']= $model->fetchProduct();
        return view('admin/orders',$data);
    
    }

    //------------- UPDATE ORDER DATA ------------//          // December 11,2022

    public function order_update($id){
        /*this will validate inputs */
        $val = $this->validate([
       'stat' => 'required',         
        ]);

       $model = new Orders_model();

       if (!$val) {
           $data['validation']  = $this->validator;
           echo view('admin/orders', $data);
       }else{
            $data = array(
                'stat' => $this->request->getVar('stat'),
            );              
        $model->order_update($data,$id);
        return redirect()->to(base_url('admin/orders/'));   
       }
      
   }
    
}