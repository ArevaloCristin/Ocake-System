<?php

namespace App\Controllers;
use App\Models\Administration_m;
class Administration extends BaseController
{
    public function index()
    {
    return view('login');
    }
    public function signup()
    {
        // echo 'im admin';
    return view('admin/register');
    }
    public function save()
    {
        $administration_m = new administration_m();
        $_POST ['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $administration_m->insert($_POST);
        return $this->response->redirect(site_url('admin-signin'));
    }
    public function login()
    {
 if($this->exists($_POST['email'], $_POST['password'])!=NULL) {
    $session=session();
    $session->set('email', $_POST['email']);
    return $this->response->redirect(site_url('dashboard'));
 }else
 {
    $data['msg']='invalid';
    return view('admin/login', $data);
    
 }
    }
        private function exists($email, $password)
        {
            $administration_m = new Administration_m();
            $administration = $administration_m->where('email', $email)->first();
            if ($administration !=NULL)
            {
if (password_verify($password, $administration['password'])) {
    return $administration_m;
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
    return view('admin/login');
}

}
