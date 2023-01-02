<?php
namespace App\Models;
use CodeIgniter\Model;
class Personal_m extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'municipality', 'barangay', 'email', 'password'];

    //---------- FETCH PERSONAL DATA ----------//  December 27,2022 -->Edited on December 31,2022
    public function fetchPersonal($id) {
        return $this->select('*')
					->where('id', $id)
                    ->get()->getResult();
    }

    // public function user_login($uname, $pass){
	// 	$this->db->where('user_uname', $uname);
	// 	$query = $this->db->get('user');
	// 	if($query->num_rows()>0){
	// 		foreach($query->result() as $row){
	// 			if($row->user_status ==2){
	// 				$store_pass = $this->encrypt->decode($row->user_pwd);
	// 				if($pass == $store_pass){
	// 					$user_session = array(
	// 						'id' => $row->user_id,
	// 						'username' => $row->user_uname,
	// 						'type' => 'user'
	// 					);
	// 					$data= $this->session->set_userdata($user_session);
	// 					return 'ok';
	// 				}else{
	// 					return 'Wrong Password';
	// 				}
	// 			}else if($row->user_status ==1){
	// 				$store_pass = $this->encrypt->decode($row->user_pwd);
	// 				if($pass == $store_pass){
	// 					$user_session = array(
	// 						'id' => $row->user_id,
	// 						'username' => $row->user_uname,
	// 						'type' => 'user'
	// 					);
	// 					$data= $this->session->set_userdata($user_session);
	// 					return 'ok';
	// 				}else{
	// 					return 'Wrong Password';
	// 				}
	// 			}else if($row->user_status ==0){
	// 				return 'Not Verified';
	// 			}else{
	// 				return false;
	// 			}
	// 		}
	// 	}else{
	// 		return 'Wrong Username';
	// 	}
	// }
}
