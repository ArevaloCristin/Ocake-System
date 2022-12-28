<?php

namespace App\Controllers;
use App\Models\Checkout_model;
use App\Models\Cart_m;
class CheckoutController extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
    }


    public function placeorder(){ 
                                   
        helper(['form', 'url']);
    
        /*this will validate inputs */
        $val = $this->validate([
                          
        ]);
    
        $cart_model = new Cart_m();
        $model = new Checkout_model();
        $counter =0; 
                foreach($this->request->getVar('cart_id') as $cart_id){
                //$cart_id = $cart_id;

                    $occasion = $this->request->getVar('occasion')[$counter];
                    $flavor =  $this->request->getVar('flavor')[$counter];
                    $price =  $this->request->getVar('price')[$counter];
                    $quantity =  $this->request->getVar('quantity')[$counter];
                    $pid =  $this->request->getVar('product_id')[$counter];

                }
        
                $counter++;

                # DELETE DATA FROM CART #
                $cart_model->cart_delete($cart_id);
                   
                  /*this will insert data to db */

                $model->insert([
                    // 'uid' => $this->request->getVar('uid'),
                    
                    'occasion' => $occasion,
                    'flavor' => $flavor,
                    'price' => $price,
                    'quantity'=>$quantity,
                    'product_id' => $pid
                   
                    
                    // 'image' => $this->request->getVar('img'),/*this will get the name of file input */
                ]);    
                
               
                return redirect('cart');    
            }    
}
?>