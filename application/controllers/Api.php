<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function login()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $member_nama = $this->input->post('member_nama');
        $level_user = $this->input->post('level_user');
        $key = $this->input->post('key');

        if ($key === 'punyabalaik3') {
            $data = [
                'id' => $id,
                'nama' => $nama,
                'username' => $username,
                'member_nama' => $member_nama,
                'level_user' => $level_user
            ];

            $this->session->set_userdata($data);

            echo $this->session->userdata('nama') . "<br>";
            echo $this->session->userdata('id') . "<br>";
            echo $this->session->userdata('username') . "<br>";
            echo $this->session->userdata('member_nama') . "<br>";
            echo $this->session->userdata('level_user') . "<br>";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('member_nama');
        $this->session->unset_userdata('level_user');
    }
}
