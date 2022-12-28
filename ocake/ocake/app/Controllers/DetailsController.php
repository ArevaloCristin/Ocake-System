<?php

namespace App\Controllers;
use App\Models\Checkout_model;
use App\Models\Details_model;
class DetailsController extends BaseController
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
    
        $cart_model = new Checkout_model();
        $model = new Details_model();
        $counter =0;
                foreach($this->request->getVar('order_id') as $order_id){
                //    $cart_id = $cart_id;

                    // $fname =  $this->request->getVar('fname')[$counter];
                    $occasion = $this->request->getVar('occasion')[$counter];
                    $flavor =  $this->request->getVar('flavor')[$counter];
                    $price =  $this->request->getVar('price')[$counter];
                    $quantity =  $this->request->getVar('quantity')[$counter];
                    $pid =  $this->request->getVar('product_id')[$counter];

                }
                $counter++;

                $fname =  $this->request->getVar('fname')[$counter];
                $lname =  $this->request->getVar('lname')[$counter];
                $phone_number =  $this->request->getVar('phone_number')[$counter];
                $email_add =  $this->request->getVar('email_add')[$counter];
                $mailing_add =  $this->request->getVar('mailing_add')[$counter];
                $receive_date =  $this->request->getVar('receive_date')[$counter];
                 $city =  $this->request->getVar('city')[$counter];
                 $barangay =  $this->request->getVar('barangay')[$counter];
                $street =  $this->request->getVar('street')[$counter];
                $delivery_method =  $this->request->getVar('delivery_method')[$counter];
                $payment_method =  $this->request->getVar('payment_method')[$counter];
                

              //  $cart_model->cart_delete($cart_id);
                   
                  /*this will insert data to db */

                $model->insert([
                    // 'uid' => $this->request->getVar('uid'),
                    'fname' => $fname,
                    'lname' => $lname,
                    'phone_number' => $phone_number,
                    'email_add' => $email_add,
                    'mailing_add' => $mailing_add,
                    'receive_date' => $receive_date,
                    'city' => $city,
                    'barangay' => $barangay,
                    'street' => $street,
                    'delivery_method' => $delivery_method,
                    'payment_method' => $payment_method,
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