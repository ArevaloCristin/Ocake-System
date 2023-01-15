<?php
namespace App\Models;
use CodeIgniter\Model;
class Personal_m extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'mobile', 'email', 'password'];

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
}
