<?php

namespace App\Controllers;
use App\Models\Cart_m;
class CartController extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
    }
    //------------- INSERT PRODUCT DATA ------------//              //November 27, 2022

            

            
            // echo view('admin/product');

            public function CartData_delete($id){
                $session = \Config\Services::session();
                $model = new Cart_m();
                $model->cart_delete($id);

                // var_dump($a);
        
                $session->setFlashdata('msg', 'Deleted Successfully!');
                
               return redirect('cart');
            }


            public function add_cart(){                              
                helper(['form', 'url']);
            
                /*this will validate inputs */
                $val = $this->validate([
                                
                ]);
            
                $model = new Cart_m();
            
                           $qty ='1';
                          
                        $model->insert([
                            // 'uid' => $this->request->getVar('uid'),
                            'occasion' => $this->request->getVar('occasion'),
                            'flavor' => $this->request->getVar('flavor'),
                            'price' => $this->request->getVar('price'),
                            'quantity' => $qty,
                            'product_id' => $this->request->getVar('pid'),
                            // 'image' => $this->request->getVar('img'),/*this will get the name of file input */
                        ]);         
                        return redirect('cart');    
            }
            
        }
    
?>