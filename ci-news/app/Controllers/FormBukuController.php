<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Controllers\BaseController;

class FormBukuController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new BookModel();
        helper(['form', 'url', 'session']);
    }
    public function index($id_buku = null)
    {
        $model = new BookModel();
        $data = [
            'title' => 'Formulir Buku',
            'buku'  => null
        ];

        if ($id_buku) {
            $buku = $model->find($id_buku);

            if ($buku === null) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Book with ID ' . $id_buku . ' not found');
            }

            $data = [
                'title' => 'Edit Buku dengan ID ' . $id_buku,
                'buku' => $buku
            ];
        }

        return view('FormBuku', $data);
    }
    public function store() {
        $id = $this->request->getPost('id_buku');
        $buku = [
            'judul_buku' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun')
        ];

        if ($id) {
            // Check if the book with the given ID exists
            $existingBook = $this->model->find($id);
            if ($existingBook) {
                $this->model->update($id, $buku);
            } else {
                session()->setFlashdata('error', 'Buku tidak ditemukan untuk ID: ' . $id);
                return redirect()->back()->withInput();
            }
        } else {
            $this->model->insert($buku);
        }

        session()->setFlashdata('success', 'Buku Telah Berhasil Disimpan');
        return redirect()->to('/dashboard');
    }
}
