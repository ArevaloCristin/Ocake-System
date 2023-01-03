<?php

namespace App\Controllers;
use App\Models\Cart_m;
class CartController extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
    }
    //------------- INSERT CART DATA ------------//              //November 27, 2022
    public function add_cart(){     
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            helper(['form', 'url']);
            $val = $this->validate([
                            
            ]);
        
            $model = new Cart_m();
            $qty ='1';
            // var_dump($_SESSION['user_id']);
            $model->insert([
                'user_id' => $_SESSION['user_id'],
                'occasion' => $this->request->getVar('occasion'),
                'flavor' => $this->request->getVar('flavor'),
                'total_price' => $this->request->getVar('price'), 
                'price' => $this->request->getVar('price'),
                'quantity' => $qty,
                'product_id' => $this->request->getVar('pid'),
            ]);         
            return redirect('cart');
        }else{
            return $this->response->redirect(site_url('signin'));
        }                        
            
    }
            
    //------------- DELETE CART DATA ------------//              //November 27, 2022
    public function CartData_delete($id){
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){
            $session = session();
            $model = new Cart_m();
            $model->cart_delete($id);

            $session->setFlashdata('msg', 'Deleted Successfully!');
            return redirect('cart');
        }else{
            return $this->response->redirect(site_url('signin'));
        } 
    }


            
            
}
    
?>
