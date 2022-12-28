<?php
namespace App\Models;
use CodeIgniter\Model;
class Personal_m extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password'];
}