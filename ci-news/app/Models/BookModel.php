<?php

namespace App\Models;

use CodeIgniter\Database\Migration;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'buku';
    protected $primaryKey       = 'id_buku';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul_buku', 'penulis', 'penerbit', 'tahun_terbit'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    
    protected $validationRules = [
        'judul_buku' => 'required|string',
        'penulis' => 'required|string',
        'penerbit' => 'required|string',
        'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]'
    ];

    protected $validationMessages = [
        'judul_buku' => [
            'required' => 'Judul buku harus diisi.',
            'string' => 'Judul buku harus berupa string.'
        ],
        'penulis' => [
            'required' => 'Penulis harus diisi.',
            'string' => 'Penulis harus berupa string.'
        ],
        'penerbit' => [
            'required' => 'Penerbit harus diisi.',
            'string' => 'Penerbit harus berupa string.'
        ],
        'tahun_terbit' => [
            'required' => 'Tahun terbit harus diisi.',
            'numeric' => 'Tahun terbit harus berupa angka.',
            'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
            'less_than' => 'Tahun terbit harus kurang dari 2024.'
        ]
    ];
}
