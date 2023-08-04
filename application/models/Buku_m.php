<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Buku_m extends CI_Model
{

    public function daftar_buku()
    {
        $databuku = $this->db->get('tbuku');
        return $databuku->result();
    }

    public function Lihat($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        return $this->db->get('tbuku')->row();
    }
}