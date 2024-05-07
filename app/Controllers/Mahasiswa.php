<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MahasiswaModel;

class Mahasiswa extends Controller
{
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $mahasiswaModel = new MahasiswaModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'mahasiswa' => $mahasiswaModel->paginate(2, 'mahasiswa'),
            'pager' => $mahasiswaModel->pager
        );

        return view('mahasiswa-index', $data);
    }

    /**
     * create function
     */
    public function create()
    {
        return view('mahasiswa-create');
    }

    /**
     * store function
     */
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);
         
        //define validation
        $validation = $this->validate([
            'nim' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan nim.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nama.'
                ]
                
            ],
            'kelas'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Kelas.'
                ]
                
            ],
            'angkatan'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Angkatan.'
                ]
                
            ],
        ]);

        if(!$validation) {

            //render view with error validation message
            return view('mahasiswa-create', [
                'validation' => $this->validator
            ]);

        } else {

            //model initialize
            $mahasiswaModel = new MahasiswaModel();
            
            //insert data into database
            $mahasiswaModel->insert([
                'nim'   => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'kelas' => $this->request->getPost('kelas'),
                'angkatan' => $this->request->getPost('angkatan'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Mahasiswa Berhasil Disimpan');

            return redirect()->to(base_url('mahasiswa'));
        }

    }
}