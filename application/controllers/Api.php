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


            $respons = [
                'status' => 200,
                'message' => 'success',
                'data' => [
                    'id' => $this->session->userdata('id'),
                    'nama' => $this->session->userdata('nama'),
                    'username' => $this->session->userdata('username'),
                    'member_nama' => $this->session->userdata('member_nama'),
                    'level_user' => $this->session->userdata('level_user')
                ]
            ];
        } else {
            $respons = [
                'status' => 400,
                'message' => 'gagal, anda tidak dapat mengakses api ini'
            ];
        }

        echo json_encode($respons);
    }

    public function logout()
    {
        $key = $this->input->post('key');

        if ($key === 'punyabalaik3') {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('member_nama');
            $this->session->unset_userdata('level_user');
            $respons = [
                'status' => 200,
                'message' => 'success'
            ];
        } else {
            $respons = [
                'status' => 400,
                'message' => 'gagal, anda tidak dapat mengakses api ini'
            ];
        }

        echo json_encode($respons);
    }
}
