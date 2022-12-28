<?php

namespace App\Controllers;
use App\Models\Product_model;
class Product extends BaseController
{    
    public function __construct(){
        $session = \Config\Services::session();
    }
    //------------- INSERT PRODUCT DATA ------------//              //November 27, 2022
    
    public function add_product(){                              
        helper(['form', 'url']);
    
        /*this will validate inputs */
        $val = $this->validate([
            'occasion' => 'required',
            'flavor' => 'required',
            'price' => 'required',
            'status' => 'required',
            // 'image' => ['required',
            //     // 'uploaded[file]',
            //     // 'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
            //     //'max_size[file, 4096]',
            // ],               
        ]);
    
        $model = new Product_model();
    
        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('admin/product', $data);
        }else{
    
            /*this will read the file from input */
            $imageFile = $this->request->getFile('image');
    
            if($imageFile == ""){
                $model->insert([
                    'occasion' => $this->request->getVar('occasion'),
                    'status' => $this->request->getVar('status'),
                    'flavor' => $this->request->getVar('flavor'),
                    'price' => $this->request->getVar('price'),
                    // 'image' =>  $imageFile->getClientName(),
                ]);
            }else{
                /*this will upload file to folder */
                $imageFile->move('uploads/');

                /*this will insert data to db */
                $model->insert([
                    'occasion' => $this->request->getVar('occasion'),
                    'status' => $this->request->getVar('status'),
                    'flavor' => $this->request->getVar('flavor'),
                    'price' => $this->request->getVar('price'),
                    'image' =>  $imageFile->getClientName(), /*this will get the name of file input */
                ]);             
            }           
            echo view('admin/product');
        }
    }
    
    //------------- FETCH PRODUCT DATA ------------//

    public function getBDay(){                             //November 27, 2022
        $model = new Product_model();
        $occasion = "Birthday";
        $data['product']= $model->getBDay($occasion);    /*connect to model function */ 
        $data['occasion'] = $occasion;
        echo view('category', $data);

        // $file = $this->request->getFile('image');
        // if($file->isValid() && ! $file->hasMoved())
        // {
        //     $imageName = $file->getRandomName();
        //     $file->move('uploads/')
        // }
    }

    public function getChristening(){
        $model = new Product_model();
        $occasion = "Christening";
        $data['product']= $model->getChristening($occasion); 
        $data['occasion'] = $occasion;
        echo view('category', $data);
    }

    public function getWedding(){
        $model = new Product_model();
        $occasion = "Wedding";
        $data['product']= $model->getWedding($occasion); 
        $data['occasion'] = $occasion;
        echo view('category', $data);
    }

    public function getGrad(){
        session();
        $model = new Product_model();
        $occasion = "Graduation";
        $data['product']= $model->getGrad($occasion); 
        $data['occasion'] = $occasion;
        echo view('category', $data);
    }

    public function getValentine(){
        $model = new Product_model();
        $occasion = "Valentine";
        $data['product']= $model->getValentine($occasion); 
        $data['occasion'] = $occasion;
        echo view('category', $data);
    }

    public function getHalloween(){
        $model = new Product_model();
        $occasion = "Halloween";
        $data['product']= $model->getHalloween($occasion); 
        $data['occasion'] = $occasion;
        echo view('category', $data);
    }

    public function getChristmas(){
        $model = new Product_model();
        $occasion = "Christmas";
        $data['product']= $model->getChristmas($occasion); 
        $data['occasion'] = $occasion;
        echo view('category', $data);
    }

    public function getNewYear(){
        $model = new Product_model();
        $occasion = "New Year";
        $data['product']= $model->getNewYear($occasion); 
        $data['occasion'] = $occasion;
        echo view('category', $data);
    }

    //------------- DELETE PRODUCT DATA ------------//           // November 28,2022

    public function prod_delete($occasion, $id){
        $session = \Config\Services::session();
        $model = new Product_model();
        $model->prod_delete($id);

        $session->setFlashdata('msg', 'Deleted Successfully!');
        return redirect()->to(base_url('admin/category/'.strtolower($occasion)));
    }

    //------------- UPDATE PRODUCT DATA ------------//          // November 29,2022

    public function prod_update($occasion, $id){
         /*this will validate inputs */
         $val = $this->validate([
        'status' => 'required',
        'flavor' => 'required',
        'price' => 'required',            
         ]);

        $model = new Product_model();

        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('admin/product', $data);
        }else{

            /*this will read the file from input */
            $imageFile = $this->request->getFile('image');

            if($imageFile == ""){
                $data = array(
                    'status' => $this->request->getVar('status'),
                    'flavor' => $this->request->getVar('flavor'),
                    'price' => $this->request->getVar('price'),
                    // 'image' => $this->request->getVar('image'),
                );
            }else{
                /*this will upload file to folder */
                $imageFile->move('uploads/');

                /*this will insert data to db */
                $data = array(
                    'status' => $this->request->getVar('status'),
                    'flavor' => $this->request->getVar('flavor'),
                    'price' => $this->request->getVar('price'),
                    'image' =>  $imageFile->getClientName(), /*this will get the name of file input */
                );             
            }
            $model->prod_update($data,$id);
            return redirect()->to(base_url('admin/category/'.strtolower($occasion)));   
        }
       
    }
   
}