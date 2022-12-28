<?php
namespace App\Models;
use CodeIgniter\Model;
class Administration_m extends Model{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password'];
}