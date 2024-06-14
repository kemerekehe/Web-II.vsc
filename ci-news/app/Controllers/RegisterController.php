<?php namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        helper(['form', 'url', 'session']); 
    }
    public function index(): string
        {
            $data = [
                'title' => 'Beranda'
            ];

            return view('home', $data);
        }

    public function Register(): string
    {
        $data = [
            'title' => 'Register'
        ];

        return view('register', $data);
    }

    public function store(){
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'password_confirm' => $this->request->getPost('password_confirm')
        ];

        if ($this->model->insert($data) === false) {
            return redirect()->back()->with('error', $this->model->errors())->withInput();
        }

        session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->to('/register');
}


}
