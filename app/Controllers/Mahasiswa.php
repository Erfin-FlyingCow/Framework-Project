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

    public function edit($nim)
    {
        //model initialize
        $mahasiswaModel = new MahasiswaModel();

        $data = array(
            'mahasiswa' => $mahasiswaModel->find($nim)
        );

        return view('mahasiswa-edit', $data);
    }

    /**
     * update function
     */
    public function update($nim)
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

            //model initialize
            $mahasiswaModel = new MahasiswaModel();

            //render view with error validation message
            return view('mahasiswa-edit', [
                'mahasiswa' => $mahasiswaModel->find($nim),
                'validation' => $this->validator
            ]);

        } else {

            //model initialize
            $mahasiswaModel = new MahasiswaModel();
            
            //insert data into database
            $mahasiswaModel->update($nim, [
                'nama' => $this->request->getPost('nama'),
                'kelas' => $this->request->getPost('kelas'),
                'angkatan' => $this->request->getPost('angkatan'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Mahasiswa Berhasil Diupdate');

            return redirect()->to(base_url('mahasiswa'));
        }

    }

    /**
     * delete function
     */
    public function delete($nim)
    {
        //model initialize
        $mahasiswaModel = new MahasiswaModel();
    
        $mahasiswa = $mahasiswaModel->find($nim);
    
        if($mahasiswa) {
            $mahasiswaModel->delete($nim);
    
            //flash message
            session()->setFlashdata('message', 'Mahasiswa Berhasil Dihapus');
    
            return redirect()->to(base_url('mahasiswa'));
        }
    }
}