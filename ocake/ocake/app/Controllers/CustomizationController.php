<?php

namespace App\Controllers;
// use CodeIgniter\Controller;
use App\Models\AddOns_model;
use App\Models\Flavor_model;

class CustomizationController extends BaseController
{
    //------------- INSERT ADDONS DATA ------------//           // December 18,2022
    public function add_addons(){                              
        helper(['form', 'url']);

        /*this will validate inputs */
        $val = $this->validate([
            'quantity' => 'required',
            'description' => 'required',
            'price' => 'required',
            'addons_status' => 'required',
        ]);

        $model = new AddOns_model();

        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('admin/customization/add_ons', $data);
        }else{

            /*this will read the file from input */
            $imageFile = $this->request->getFile('image');

            if($imageFile == ""){
                $model->insert([
                    'quantity' => $this->request->getVar('quantity'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'addons_status' => $this->request->getVar('addons_status'),
                ]);
            }else{
                /*this will upload file to folder */
                $imageFile->move('uploads/');

                /*this will insert data to db */
                $model->insert([
                    'quantity' => $this->request->getVar('quantity'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'addons_status' => $this->request->getVar('addons_status'),
                    'image' =>  $imageFile->getClientName(), /*this will get the name of file input */
                ]);             
            }           
            return redirect()->to(base_url('admin/customization/add_ons')); 
        }
    }

    //------------- FETCH ADDONS DATA ------------//            // December 18,2022
    public function add_ons(){
        $model = new AddOns_model();
        $data['addons']= $model->fetchAddOns();
        return view('admin/addons', $data);
    }

    //------------- UPDATE ADDONS DATA ------------//           // December 18,2022
    public function addons_update($id){
        /*this will validate inputs */
        $val = $this->validate([
            // 'quantity' => 'required',
            'description' => 'required',
            'price' => 'required',
            'addons_status' => 'required',           
        ]);

       $model = new AddOns_model();

       if (!$val) {
           $data['validation']  = $this->validator;
           echo view('admin/customization/add_ons', $data);
       }else{

           /*this will read the file from input */
           $imageFile = $this->request->getFile('image');

           if($imageFile == ""){
               $data = array(
                    // 'quantity' => $this->request->getVar('quantity'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'addons_status' => $this->request->getVar('addons_status'),
               );
           }else{
               /*this will upload file to folder */
               $imageFile->move('uploads/');

               /*this will insert data to db */
               $data = array(
                    // 'quantity' => $this->request->getVar('quantity'),
                    'description' => $this->request->getVar('description'),
                    'price' => $this->request->getVar('price'),
                    'addons_status' => $this->request->getVar('addons_status'),
                    'image' =>  $imageFile->getClientName(), /*this will get the name of file input */
               );             
           }
           $model->addons_update($data,$id);
           return redirect()->to(base_url('admin/customization/add_ons'));   
       }
      
   }

    //------------- DELETE ADDONS DATA ------------//           // December 18,2022
    public function addons_delete($id){
        $session = \Config\Services::session();
        $model = new AddOns_model();
        $model->addons_delete($id);

        $session->setFlashdata('msg', 'Deleted Successfully!');
        return redirect('admin/customization/add_ons');
    }
    
    //*********************************************************************************************************//
     
    //------------- INSERT FLAVOR DATA ------------//           // December 19,2022
    public function add_flavor(){                              
        helper(['form', 'url']);

        /*this will validate inputs */
        $val = $this->validate([
            'flavor' => 'required',
            'flavor_status' => 'required',
        ]);

        $model = new Flavor_model();

        if (!$val) {
            $data['validation']  = $this->validator;
            echo view('admin/customization/flavor', $data);
        }else{

            $model->insert([
                'flavor' => $this->request->getVar('flavor'),
                'flavor_status' => $this->request->getVar('flavor_status'),
            ]); 
            return redirect()->to(base_url('admin/customization/flavor'));
        }
    }

    //------------- FETCH FLAVOR DATA ------------//            // December 19,2022
    public function flavor(){
        $model = new Flavor_model();
        $data['flavor']= $model->fetchFlavor();
        return view('admin/flavor', $data);
    }
 
    //------------- UPDATE FLAVOR DATA ------------//           // December 19,2022
    public function flavor_update($id){
        $val = $this->validate([
                'flavor' => 'required',
                'flavor_status' => 'required',
            ]);
        
            $model = new Flavor_model();
        
            if (!$val) {
                $data['validation']  = $this->validator;
                //echo view('admin/customization/flavor', $data);
                return redirect()->to(base_url('admin/customization/flavor'));
            }else{
                $data = array(
                    'flavor' => $this->request->getVar('flavor'),
                    'flavor_status' => $this->request->getVar('flavor_status'),
                 );              
            $model->flavor_update($data,$id);
            return redirect()->to(base_url('admin/customization/flavor'));
            }  
    }

    //------------- DELETE FLAVOR DATA ------------//            // December 19,2022
    public function flavor_delete($id){
        $session = \Config\Services::session();
        $model = new Flavor_model();
        $model->flavor_delete($id);

        $session->setFlashdata('msg', 'Deleted Successfully!');
        return redirect('admin/customization/flavor');
    }
}
