<?php

namespace App\Controllers;
use App\Models\Administration_m;
class Administration extends BaseController
{
    

    public function index(){
        return view('login');
    }

    public function signup(){
        // echo 'im admin';
        return view('admin/register');
    }

    // set or restore default admin
    public function restore_default_admin(){
        $administration_m = new administration_m();
        $default_email = "admin@gmail.com";
        $default_pass = "admin123"; 
        $default_Fname = "admin";
        $default_Lname = "admin";
        $_POST['email'] = $default_email;
        $_POST['firstname'] = $default_Fname;
        $_POST['lastname'] = $default_Lname;
        $_POST['password'] = password_hash($default_pass, PASSWORD_BCRYPT);
        $administration_m->insert($_POST);
        return $this->response->redirect(site_url('admin-signin'));
    }

    public function login(){
        $data = $this->exists($_POST['email'], $_POST['password']);
        if( $data != NULL) {
            $session=session();
            $admin_session = [
                'admin_id'    => $data->id,
                'adminF_name' => $data->firstname,
                'adminL_name' => $data->lastname,
                'admin_email' => $data->email,
                'logged_in'  => true,
                'type'       => "admin",
            ]; 
            $session->set($admin_session);
            /*
            $session->admin_id;            // way to get the declared session
            */
            $session->set('email', $_POST['email']);
            return $this->response->redirect(site_url('admin-dashboard'));
        }else
        {
            $data['msg']='invalid';
            return view('admin/login', $data);
            
        }
    }
    
    // check if admin email && password exists
    private function exists($email, $password){
        $administration_m = new Administration_m();
        $administration = $administration_m->where('email', $email)->first();
        
        if ($administration !=NULL) {
            if (password_verify($password, $administration['password'])) {
                return $administration_m;
            }
        }
    }
    
    // not used !!!
    /*
    public function dashboard(){
        $session = session();
        if($session->logged_in == true)
            return view('dashboard');
        else
            return view('login');     
    }
    */

    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to(base_url('/admin-signin'));
    }

    public function signin(){
        return view('admin/login');
    }

}
