<?php

namespace App\Controllers;
use App\Models\Modelverifikasi;

class Home extends BaseController
{
    public function index()
    {
        return view('user/index');
    }

    public function form()
    {
        return view('user/form');
    }
    
    public function cekStatusDokumen() {
        
        $db = \Config\Database::connect();
        $status = $this->request->getGet('status') ?? 'all';
        $builder = $db->table('verifikasi');
        $builder->select('*');
        $builder->select('verifikasi.id as id_verifikasi');
        if($status!='all'){
            $builder->where('status', $status);
        }
        $builder->join('form_p3', 'verifikasi.pemohon_id = form_p3.pemohon_id');
        $builder->join('pemohon', 'verifikasi.pemohon_id = pemohon.id');
        $builder->join('admin', 'verifikasi.adminid = admin.adminid');
        $data = $builder->get()->getResultArray();
        
        return view('user/dokumen', ['data' => $data, 'status' => $status]);
    }    

    public function verifikasi()
    {
        $status = $this->request->getGet('status') ?? 2;
       
        $verifikasi = new Modelverifikasi;
        $data['verifikasi'] = $verifikasi->findAll();
        
        return view('user/dokumen',[$data,'status'=> $status]);
    }

    public function simpanForm()
    {
        $db = \Config\Database::connect();
        $pemohon = [
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'email' => $this->request->getPost('email'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
        ];
        
        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'nama' =>[
                'rules' => 'required',
                'label' => 'Nama',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada...'
                ]
            ],
            'nik' => [
                'rules' => 'required',
                'label' => 'NIK',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => 'Barang dengan nama {value} sudah ada...'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'label' => 'Email',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'label' => 'Tempat Lahir',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'label' => 'Tanggal Lahir',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric',
                'label' => 'No HP',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} nya yang bener bang',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'label' => 'Alamat',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'label' => 'Pekerjaan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'ktp' => [
                'rules' => 'uploaded[ktp]|mime_in[ktp,image/png,image/jpeg,image/jpg,image/jfif]|ext_in[ktp,png,jpg,jpeg,jfif]',
                'label' => 'KTP',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong',
                    'mime_in' => 'Upload {field} dalam bentuk gambar',
                ]
            ],
            'file_permohonan' => [
                'rules' => 'uploaded[file_permohonan]|ext_in[file_permohonan,pdf]',
                'label' => 'File Permohonan',
                'errors' => [
                    'uploaded' => '{field} tidak boleh kosong',
                    'ext_in' => 'File harus bentuk PDF',
                ]
            ]
        ]);

        if(!$valid){
            $sess_Pesan = [
                'error' => '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                '.$validation->listErrors().'
              </div>'
            ];

            session()->setFlashdata($sess_Pesan);
            return redirect()->to('/form');
        } else {
        $db->table('pemohon')->insert($pemohon);
        
        $kdpermohonan = $this->request->getPost('kdpermohonan');
        $ktp = $this->request->getFile('ktp');
        $file = $this->request->getFile('file_permohonan');
		$fileName1 = $ktp->getRandomName();
		$fileName2 = $file->getRandomName();
        
        $pemohon_id = $db->insertID();
        $form = [
            'pemohon_id' => $pemohon_id,
            'kdpermohonan' => $kdpermohonan,
            'foto_ktp' => $fileName1,
            'file_permohonan' => $fileName2,
        ];
        $db->table('form_p3')->insert($form);


        $ids = [
            'pemohon_id' => $pemohon_id,
        ];
        $db->table('verifikasi')->insert($ids);

		$ktp->move('berkas/ktp/', $fileName1);
		$file->move('berkas/permohonan/', $fileName2);

        $pesan_sukses = [
                'sukses' => '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Berhasil</h5>
                Data berhasil ditambah
              </div>'
            ];

        session()->setFlashdata($pesan_sukses);
		return redirect()->to(base_url('/'));   
        }
    }

}
