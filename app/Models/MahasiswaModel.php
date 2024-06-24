<?php namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = "mahasiswa";

    protected $primaryKey = 'nim'; // Menggunakan 'nim' sebagai primary key

    protected $allowedFields = [
        'nim',
        'nama',
        'kelas',
        'angkatan'
    ];


    public function all_data() {
        return $this->db->table('mahasiswa')->get()->getResultArray();
    }
}