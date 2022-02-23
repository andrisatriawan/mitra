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
        $ip_address = $this->input->post('ip_address');
        $user_agent = $this->input->post('user_agent');
        $token = $this->input->post('token');
        $key = $this->input->post('key');

        if ($key === 'punyabalaik3') {
            $data = [
                'id_user' => $id,
                'nama' => $nama,
                'username' => $username,
                'member_nama' => $member_nama,
                'level_user' => $level_user,
                'ip_address' => $ip_address,
                'user_agent' => $user_agent,
                'token' => $token,
            ];

            $this->db->insert('session', $data);

            // $this->session->set_userdata($data);

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

    public function logout()
    {
        $key = $this->input->post('key');
        $token = $this->input->post('token');

        if ($key === 'punyabalaik3') {
            // $this->session->unset_userdata('id');
            // $this->session->unset_userdata('nama');
            // $this->session->unset_userdata('username');
            // $this->session->unset_userdata('member_nama');
            // $this->session->unset_userdata('level_user');
            $this->db->delete('session', ['token' => $token]);

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
