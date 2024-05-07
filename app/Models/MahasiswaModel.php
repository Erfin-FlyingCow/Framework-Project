<?php namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    /**
     * table name
     */
    protected $table = "mahasiswa";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'nim',
        'nama',
        'kelas',
        'angkatan'
    ];
}