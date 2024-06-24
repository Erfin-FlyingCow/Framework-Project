<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MahasiswaModel;
use App\Libraries\MY_TCPDF AS TCPDF;

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

    public function cetak()
    {



        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Sobatcoding.com');
        $pdf->SetTitle('PDF Sobatcoding.com');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, sobatcoding.com');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);



        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        //model initialize
        $mahasiswaModel = new MahasiswaModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'mahasiswa' => $mahasiswaModel->paginate(2, 'mahasiswa'),
            'pager' => $mahasiswaModel->pager
        );

       //view mengarah ke invoice.php
        $html = view('invoice',$data);

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('invoice-pos-sobatcoding.pdf', 'I');

    }
}