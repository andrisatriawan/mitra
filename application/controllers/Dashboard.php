<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data = $this->cek_session();

        echo json_encode($data);
    }

    function cek_session()
    {
        $ip_address = $this->input->ip_address();
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $q_session = $this->db->get_where('session', ['ip_address' => $ip_address]);
        $row = $q_session->result_array();
        $data['nama'] = '';
        if ($q_session->num_rows() != 0) {
            if ($row['user_agent'] == $user_agent) {
                $data = [
                    'nama' => $row['nama']
                ];
            }
        }

        return $data;
    }
}
