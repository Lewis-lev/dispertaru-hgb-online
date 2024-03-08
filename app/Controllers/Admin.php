<?php

namespace App\Controllers;

use App\Models\Modeladmin;

class Admin extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    public function validLogin()
    {
        $adminModel = new Modeladmin();

        $data = $this->request->getPost();
        $admin = $adminModel->where('username', $data['username'])->first();

        if ($admin) {

            if ($admin['password'] != md5($data['password'])) {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to('login');
            } else {
                $sessLogin = [
                    'isLoggedIn'    => true,
                    'adminid'       => $admin['adminid'],
                    'username'      => $admin['username']
                ];
                session()->set($sessLogin);
                return redirect()->to('administrator');
            }
        } else {
            session()->setFlashdata('error', 'Username tidak terdaftar');
            return redirect()->to('login');
        }
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $status = $this->request->getGet('status') ?? 'all';
        $builder = $db->table('form_p3');
        $builder->select('*');
        $builder->select('form_p3.id as p3_id');
        if ($status != 'all') {
            $builder->where('status', $status);
        }
        $builder->join('pemohon', 'pemohon.id = form_p3.pemohon_id');
        $data = $builder->get();

        return view('admin/index', ['data' => $data, 'status' => $status]);
    }

    public function p3Detail($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('form_p3');
        $builder->select('*');
        $builder->where('form_p3.id', $id);
        $builder->join('pemohon', 'pemohon.id = form_p3.pemohon_id');
        $data = $builder->get();
        $data = $data->getResult();
        $data = $data[0];
        return view('admin/p3Detail', ['data' => $data, 'id' => $id]);
    }

    public function p3Edit($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('form_p3');
        $builder->select('pemohon.*, form_p3.id as form_p3_id, form_p3.pemohon_id, form_p3.foto_ktp, form_p3.file_permohonan');
        $builder->where('form_p3.id', $id);
        $builder->join('pemohon', 'pemohon.id = form_p3.pemohon_id');
        $data = $builder->get();
        $data = $data->getResult();
        $data = $data[0];
        return view('admin/edit_p3', ['data' => $data, 'id' => $id]);
    }

    public function p3Delete($id)
    {
        $db = \Config\Database::connect();

        // Check if the record with the given ID exists in the 'form_p3' table
        $builder = $db->table('form_p3');
        $builder->select('*');
        $builder->where('form_p3.id', $id);
        $record = $builder->get()->getRow();

        if ($record) {

            $imgFile = 'berkas/ktp/' . $record->foto_ktp;
            $pdfFile = 'berkas/permohonan/' . $record->file_permohonan;

            if (file_exists($imgFile)) {
                unlink($imgFile);
            }

            if (file_exists($pdfFile)) {
                unlink($pdfFile);
            }

            // First, delete associated records in the 'verifikasi' table
            $verifikasiBuilder = $db->table('verifikasi');
            $verifikasiBuilder->where('pemohon_id', $record->pemohon_id);
            $verifikasiBuilder->delete();

            // Then, delete the record in the 'form_p3' table
            $db->table('form_p3')->where('id', $id)->delete();

            $pemohonID = $record->pemohon_id;
            $db->table('pemohon')->where('id', $pemohonID)->delete();

            return redirect()->to(base_url('/administrator'));
        } else {
            // Handle the case where the record doesn't exist
            return redirect()->to(base_url('/'));
        }
    }

    public function p3Update()
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

        $pemohon_id = $this->request->getPost('pemohon_id');
        $form = array();
        $form['pemohon_id'] = $pemohon_id;

        $builder = $db->table('pemohon');
        $builder->where('id', $pemohon_id);
        $builder->update($pemohon);

        if (!is_null($this->request->getPost('ktp'))) {
            $ktp = $this->request->getFile('ktp');
            $fileName1 = $ktp->getRandomName();
            $ktp->move('berkas/ktp1/', $fileName1);
            $form['ktp'] = $fileName1;
        }
        if (!is_null($this->request->getPost('file_permohonan'))) {
            $file_permohonan = $this->request->getFile('file_permohonan');
            $fileName2 = $file_permohonan->getRandomName();
            $ktp->move('berkas/permohonan/', $fileName2);
            $form['file_permohonan'] = $fileName1;
        }

        $form_p3_id = $this->request->getPost('form_p3_id');
        $builder = $db->table('form_p3');
        $builder->where('id', $form_p3_id);
        $builder->update($form);

        $pesan_sukses = [
            'sukses' => '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Berhasil</h5>
            Data berhasil dirubah
          </div>'
        ];

        session()->setFlashdata($pesan_sukses);
        return redirect()->to(base_url('/administrator'));
    }

    public function updateStatusP3()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('form_p3');
        $builder->set('status', $this->request->getPost('status'));
        $builder->where('id', $this->request->getPost('id'));
        $builder->update();
        // var_dump($this->request->getPost());
        session()->setFlashdata('success', 'Berkas Berhasil diupload');
        return redirect()->to(base_url('p3/' . $this->request->getPost('id')));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
