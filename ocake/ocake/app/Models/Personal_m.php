<?php
namespace App\Models;
use CodeIgniter\Model;
class Personal_m extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'mobile', 'email', 'password', 'verification_code', 'is_verified'];

    //---------- FETCH PERSONAL DATA ----------//  December 27,2022 -->Edited on December 31,2022
    public function fetchPersonal($id) {
        return $this->select('*')
					->where('id', $id)
                    ->get()->getResult();
    }

    //------------- COUNT USERS --------------//   January 14,2023
	public function count_users(){
		return $this->db->table('users')
					->select('Count(id) as count')
					->get()->getResult();
	}

    public function save_user($data){                        
        $insert = $this->insert($data);
       
        //this will get last id then insert in checkout table as biller's id 
        // if ($insert){
        //     return $this->insertID();
        // }
        // else{
        //     return false;
        // }
    }

    public function create_accounts($fname, $lname, $email, $mobile, $pass, $code) {
        $bind = [
            'firstname' => $fname,
            'lastname' => $lname,
            'mobile' => $mobile,
            'email' => $email,
            'password' => $this->passwordhash($pass),
            'verification_code' => $code,
            'user_verification' => 'no',
        ];

        if ($bind > 0) {
            return $this->db->table('users')->insert($bind);
        } else {
            echo 'already exist';
        }
    }
}
