<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'role']; // Ensure these fields exist in your table

    // Method to get a user by their email
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // Method to get the roles for a specific user
    public function getUserRoles($userId)
    {
        $builder = $this->db->table('user_roles');
        $builder->join('roles', 'user_roles.role_id = roles.id');
        $builder->where('user_roles.user_id', $userId);
        return $builder->get()->getResultArray();
    }

    // Method to get all doctors
    public function getDoctors()
    {
        // Select 'id' and 'email', alias 'email' as 'name' for use in forms
        return $this->select('id, email AS name')
            ->where('role', 'dokter')
            ->findAll();
    }
}
