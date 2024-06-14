<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['username', 'email', 'password'];

    protected $validationRules = [
        'username' => 'required',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[8]',
        'password_confirm' => 'required|matches[password]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Maaf, Email tersebut telah terdaftar. Tolong gunakan email lainnya.'
        ],
        'password' => [
            'min_length' => 'Password harus memiliki panjang minimal 8 karakter.'
        ],
        'password_confirm' => [
            'matches' => 'Password tidak sesuai'
        ]
    ];

    protected $skipValidation = false;
    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    public function checkLogin($email, $password)
    {
        $user = $this->where('email', $email)->first();

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }
        return $user;
    }

}
