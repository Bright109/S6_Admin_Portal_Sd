<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            "username" => "Yanto",
            "password" => password_hash('201510025', PASSWORD_DEFAULT)
        ];


        $this->db->table('user')->insert($data);
    }
}
