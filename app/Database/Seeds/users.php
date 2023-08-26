<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            'first_name' => 'Alison',
            'last_name' => 'Golden',
            'email' => 'alisong@email.com',
            'password' => 'password',
            'location' => 'Florida',
            'is_admin' => '1',
        ];

        // Simple Queries
        $this->db->query('INSERT INTO users (first_name, last_name, email, password, location, is_admin) VALUES(:first_name:, :last_name:, :email:, :password:, :location:, :is_admin:)', $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
