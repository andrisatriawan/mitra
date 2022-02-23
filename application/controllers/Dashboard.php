<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function index()
    {
        if (isset($this->session->userdata('id'))) {
            $username = $this->session->userdata('username');
            echo "Anda berhasil login dengan username $username";
        } else {
            echo 'Anda belum login';
        }
    }
}
