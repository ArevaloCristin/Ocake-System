<?php

namespace App\Controllers;
use App\Models\Personal_m;
class Personal extends BaseController
{
    public function index()
    {
    return view('login');
    }
    public function signup()
    {
    return view('signup');
    }
    public function save()
    {
        $personal_m = new personal_m();
        $_POST ['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $personal_m->insert($_POST);
        return $this->response->redirect(site_url('signin'));
    }
    public function login()
    {
 if($this->exists($_POST['email'], $_POST['password'])!=NULL) {
    $session=session();
    $session->set('email', $_POST['email']);    
    return $this->response->redirect(site_url('home'));
 }else{
    $data['msg']='invalid';
    return view('auth/signlog', $data);
    
 }
    }
        private function exists($email, $password)
        {
            $personal_m = new Personal_m();
            $personal = $personal_m->where('email', $email)->first();
            if ($personal !=NULL)
            {
if (password_verify($password, $personal['password'])) {
    return $personal;
}
            }
        }
        public function dashboard()
        {
            return view('dashboard');
        }
        public function logout()
        {
        $session = session();
        $session->remove('email');
       
        return $this->response->redirect(site_url('signin'));
}
public function signin()
{
    return view('auth/signlog');
}
        }