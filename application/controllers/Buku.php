<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_m', 'mbuku');
        if($this->session->user_id == null) redierect('/');
    }

    public function index()
    {
        $data['konten'] = "buku/daftarbuku";
        $data['judul'] = "Daftar Buku";

        $data['daftar_buku'] = $this->mbuku->daftar_buku();
        $data['test'] = "test";
        $this->load->view('layout/master', $data);
    }

    public function Lihat($kode_buku)
    {

        $data['konten'] = "buku/lihat";
        $data['buku'] = $this->mbuku->lihat($kode_buku);
        $this->load->view('layout/master', $data);
    }


    public function Tambah()
    {
        $data['konten'] = "buku/tambah"; //ini akan ada di view
        $data['judul'] = "Tambah Buku";

        $this->load->view('layout/master', $data);
    }

    public function Simpan()
    {
        $kode_buku = $this->input->post('kode_buku');
        $judul = $this->input->post('judul_buku');
        $kategori = $this->input->post('kategori');
        $sampul = $this->input->post('sampul');

        //array untuk menampung data yang akan disimpan
        $data = array(
            'kode_buku' => $kode_buku,
            'judul_buku' => $judul,
            'kategori_buku' => $kategori,
            'cover_buku' => $sampul
        );
        $simpan = $this->db->insert('tbuku', $data);
        if ($simpan) {
            $this->session->set_flashdata('success', 'Tersimpan');
            redirect(base_url('buku'));
        } else {
            $this->session->set_flashdata('failed', 'Gagal Tersimpan');
            redirect(base_url('buku'));
        };
    }

    public function Edit($kode)
    {
        $data['konten'] = "buku/edit";  //Ini akan ditampilkan di halaman
        $judul['judul'] = "Edit Daftar Buku";

        //Pengambilan data dari db
        $this->db->select('*');
        $this->db->from('tbuku');
        $this->db->where('kode_buku', $kode);
        $buku = $this->db->get()->row();
        $data['buku'] = $buku;
        $this->load->view('layout/master', $data);
    }

    public function Simpan_edit()
    {
        $kode_buku = $this->input->post('kode_buku');
        $judul     = $this->input->post('judul_buku');
        $kategori = $this->input->post('kategori');
        //proses upload
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('sampul')){
            var_dump($this->upload->display_errors());
            $this->session->set_flashdata('simpan', 'gagal '.$upload['error']);
            // redirect('buku');
        }    
        
        // array menampung data yang akan disimpan
        $sampul= $this->upload->data();
        // var_dump($sampul);die;
        $data = array(
            'kode_buku' => $kode_buku,
            'judul_buku' => $judul,
            'kategori_buku' => $kategori,
            'cover_buku' => $sampul['file_name']

        );
        $this->db->where('kode_buku', $kode_buku);
        $update = $this->db->update('tbuku', $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Terupdate');
            redirect(base_url('buku'));
        } else {
            $this->session->set_flashdata('failed', 'Gagal Terupdate');
            redirect(base_url('buku'));
        };
    }

    public function Hapus($kode_buku)
    {
        $hapus = $this->db->delete('tbuku', array('kode_buku' => $kode_buku));

        if ($hapus) {
            $this->session->set_flashdata('success', 'Terhapus');
            redirect(base_url('buku'));
        } else {
            $this->session->set_flashdata('failed', 'Gagal Terhapus');
            redirect(base_url('buku'));
        };
    }
    public function do_upload(){
        
    }
}
