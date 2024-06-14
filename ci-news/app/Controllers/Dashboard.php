<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        $model = new BookModel();

        $data = [
            'title' => 'Dashboard',
            'buku' => $model->findAll()
        ];

        return view('dashboard', $data);
    }

    private function isLoggedIn() : bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $model = new BookModel();
        $buku = $model->find($id);

        if ($buku === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Book with ID ' . $id . ' not found');
        }

        $model->delete($id);
        return redirect()->to('/dashboard');
    }
}
