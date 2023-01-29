<?php

namespace App\Controllers;
use App\Models\Personal_m;
class Personal extends BaseController{

    public function index(){
         return view('login');
    }

    public function signup(){
        return view('signup');
    }

    public function signin(){
       return view('auth/signlog');
    }
    public function verification(){
        return view('auth/verification');
     }

    // public function save(){
    //     $personal_m = new personal_m();
    //     $_POST ['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //     $personal_m->insert($_POST);
    //     return $this->response->redirect(site_url('signin'));
    // }

    public function register(){ 
        $id = $_SESSION['user_id'];                 
        helper(['form', 'url']);
        
        $val = $this->validate([ ]);
            
         #generate random code
        $code = mt_rand(100000, 999999);
   
        $user_model = new Personal_m();       

        $data = array(       
            'firstname'       => $this->request->getVar('firstname'),
            'lastname'        => $this->request->getVar('lastname'),
            'email'           => $this->request->getVar('email'),
            'mobile'          => $this->request->getVar('mobile'),
            'verification_code' => $code,
        ); 
        $insert = $user_model->save_user($data);
        return $this->response->redirect(site_url('verify'));
                    
                     #insert checkout data 
                    // $checkout_model = new Checkout_model();
                    // $datum = array(
                    //         'user_id'         => $id, 
                    //         'biller_id'       => $insert_biller,
                    //         'total_price'     => $this->request->getVar('total_price'),
                    //         'items'           => $this->request->getVar('count'),
                    //         'order_code'      => $random,
                    // );
                    // $insert_checkout= $checkout_model->save_checkout($datum);
                    // return redirect('verification');  
    }

    public function login(){
        $data = $this->exists($_POST['email'], $_POST['password']);
        if($data != NULL) {
            $session=session();
            $user_session = [
                'user_id'    => $data['id'],
                'userF_name' => $data['firstname'],
                'userL_name' => $data['lastname'],
                'user_email' => $data['email'],
                'logged_in'  => true,
                'type'       => "user",
            ]; 
            $session->set($user_session);
            /*
            $session->user_id;            // way to get the declared session
            */
           return $this->response->redirect(site_url('home'));
        }else{
            $data['msg']='invalid';
            return view('auth/signlog', $data);    
        }
    }

    // check if user email && password exists
    private function exists($email, $password){
        $personal_m = new Personal_m();
        $personal = $personal_m->where('email', $email)->first();
            if ($personal !=NULL){
                if (password_verify($password, $personal['password'])) {
                    return $personal;
                }
            }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        $session=session();
        $session->destroy();
        return $this->response->redirect(site_url('signin'));
    }
    

   
}
