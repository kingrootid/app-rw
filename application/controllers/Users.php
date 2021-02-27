<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Users
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_model', 'form');
    }

    public function keys()
    {
        $data = array(
            'title' => $this->config->item('title'),
            'file' => 'keys',
            'page' => 'Pengaturan API Keys',
            'user' => userdetail($this->session->userdata('id')),
            'api_key' => $this->db->get_where('keys', ['user_id' => $this->session->userdata('id')])
        );

        $this->load->view('template', $data);
    }
    public function generate()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array(
                'id' => $post['id']
            );
            $aksi = $this->form->generate_keys($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        }
    }
}


/* End of file Users.php */
/* Location: ./application/controllers/Users.php */