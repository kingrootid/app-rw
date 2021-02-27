<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Achievement
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

class Achievement extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_loggin();
        $this->load->model('Form_model', 'form');
    }

    public function redeem()
    {
        $data = array(
            'title' => $this->config->item('title'),
            'file' => 'redeem',
            'page' => 'Redeem Hadiah',
            'user' => userdetail($this->session->userdata('id')),
            'poin' => $this->db->where('users_id', $this->session->userdata('id'))->get('poin')
        );

        $this->load->view('template', $data);
    }
    public function doredeem()
    {
        if ($this->input->is_ajax_request()) {
            $post = $this->input->post();
            $data = array(
                'id' => $post['id'],
                'user' => $post['user']
            );
            $aksi = $this->form->redeem($data);
            header('Content-Type: application/json');
            echo json_encode($aksi);
        }
    }
}


/* End of file Achievement.php */
/* Location: ./application/controllers/Achievement.php */