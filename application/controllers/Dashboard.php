<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('id') != null) {
            $username = $this->session->userdata('username');
            echo "Anda berhasil login dengan username $username";
        } else {
            echo 'Anda belum login';
        }
    }
}
